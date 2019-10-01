<?php
 
namespace App\Console\Commands;
 
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;

class SyncRun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:run';
 
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia dados para o endpoint de sincronia.';


    /**
     * Valores de configuração para acesso ao endpoint sync.
     * 
     * @var array
     */
    protected $config = array();

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
 
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if(empty($this->config['url'])) {
            // Essa entidade está rodando como mestre
            // Não enviamos nada, só recebemos.
            return;
        }

        $currentId = $this->fetchCurrentId();
        dd($currentId);

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

    private function loadConfig() {
        $this->config = array(
            'url'     => env('APP_SYNC_URL', ''),
            'name'    => env('APP_SYNC_NAME', 'unknown'),
            'api_key' => env('APP_SYNC_API_KEY', '')
        );
    }

    private function sanitizeURL($url) {
        if($url[strlen($url) - 1] != '/') {
            $url .= '/';
        }
        return $url;
    }

    private function fetchCurrentId() {
        $url = $this->sanitizeURL($this->config['url']);
        $url .= 'current';

        $response = Curl::to($url)
            ->withData($this->config)
            ->withTimeout(10)
            ->returnResponseObject()
            ->asJsonResponse()
            ->get();

        if($response->status != 200) {
            $this->error('Erro fetchCurrentId: URL="'.$url.'", response=' . print_r($response, true));
            exit(1);
        }

        if(isset($response->content->error)) {
            $this->warn('Sync negou acesso: URL="'.$url.'", response="' . $response->content->message . '"');
            exit(2);
        }
    }
}