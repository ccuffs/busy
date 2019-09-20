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
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
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
            ->chunk(100, function ($users) {
                foreach ($users as $user) {
                    $this->fetchUser($user);
                }
            });
        
        $this->info('Dados da API "whereis" buscados com sucesso!');
    }

    private function generateTimestampNextFetch() {
        $minMinutes = 3;

        $intervalSeconds = $minMinutes * 60;
        $intervalRandSeconds = rand(0, (int)($intervalSeconds * 0.30));
        $intervalSeconds += $intervalRandSeconds;

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

        $endpointUrl = 'http://dev.local.com/busy/public/test-api.php?';
        $url = $endpointUrl . $user->device;
        
        $response = Curl::to($url)
            ->withHeader('x-api-key: ' . $user->api_key)
            ->withTimeout(10)
            ->returnResponseObject()
            ->asJsonResponse()
            ->get();

        if($response->status != 200) {
            $this->error('Problema no fetch do uid="'.$user->uid.'":' . $response->error);
            return null;
        }

        return $response->content;
    }
}