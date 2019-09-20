<?php
 
namespace App\Console\Commands;
 
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;

class WhereIsFetch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'whereis:fetch';
 
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Busca dados da API "whereis" da SETI/UFFS.';

    /**
     * Configurações de acesso à API.
     *
     * @var array
     */
    protected $config;
 
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadConfig();
    }
 
    private function loadConfig() {
        $file_name = 'whereis.ini';
        $base_path = dirname(__FILE__) . '/../../../config/';

        if(app()->environment('local')) {
            $base_path .= 'local/';
        }

        $file_path = $base_path . $file_name;
        $config = parse_ini_file($file_path, true);

        if($config === FALSE) {
            throw new \Exception('Erro ao carregar arquivo de configuração whereis.ini (path="'.$file_path.'")');
        }

        $this->config = $config;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::table('users')
            ->where('next_check_at', '<=', time())
            ->orderBy('next_check_at')
            ->chunk($this->config['update_chunck_size'], function ($users) {
                foreach ($users as $user) {
                    $this->fetchUser($user);
                }
                sleep($this->config['chunk_wait_seconds']);
            });
        
        $this->info('Dados da API "whereis" buscados com sucesso!');
    }

    private function generateTimestampNextFetch() {
        $minMinutes = $this->config['update_interval_minutes'];

        $intervalSeconds = $minMinutes * 60;
        $randAdditionSeconds = rand(0, (int)($intervalSeconds * $this->config['update_interval_rand_percentage']));
        $intervalSeconds += $randAdditionSeconds;

        $timestamp = time() + $intervalSeconds;
        return $timestamp;
    }

    private function fetchUser($user) {
        if($user == null) {
            throw new \Exception('Usuario invalido para fetch.');
        }

        $data = $this->fetchDataFromEndpoint($user);

        if($data == null || $data === false) {
            return false;
        }

        DB::table('logs')->insert([
            'fk_user_id' => $user->id,
            'ap'         => $data->ap,
            'ip'         => $data->ip,
            'loginTime'  => $data->loginTime,
            'wlan'       => $data->wlan,
            'created_at' => time(),
            'updated_at' => time()
        ]);

        $nextCheck = $this->generateTimestampNextFetch();

        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'checked_at' => time(),
                'next_check_at' => $nextCheck
            ]);

        return true;
    }

    private function fetchDataFromEndpoint($user) {
        if($user == null) {
            throw new \Exception('Usuário invalido');
        }

        if(empty($user->device)) {
            throw new \Exception('MAC inválido para usuário "' . $user->name . '" (id=' . $user->id . ')');
        }

        if(empty($user->api_key)) {
            throw new \Exception('API key inválida para usuário "' . $user->name . '" (id=' . $user->id . ')');            
        }

        $endpointUrl = $this->config['endpoint_url'];
        $url = $endpointUrl . $user->device;
        
        $response = Curl::to($url)
            ->withHeader('x-api-key: ' . $user->api_key)
            ->withTimeout(10)
            ->returnResponseObject()
            ->asJsonResponse()
            ->get();

        if($response->status != 200) {
            $this->error('Problema no fetch do uid="'.$user->uid.'": ' . print_r($response, true));
            return null;
        }

        return $response->content;
    }
}