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
            $this->info('Sem URL para sync. Essa entidade não pode rodar "' . $this->signature . '".');
            return;
        }

        DB::table('logs')
            ->where('syncd', false)
            ->chunkById(100, function ($logs) {
                    $this->info('Iniciando novo batch');
                    foreach ($logs as $log) {
                        try {
                            $ok = $this->sendLog($log);
                            if($ok) {
                                DB::table('logs')->where('id', $log->id)->update(['syncd' => true]);
                            }
                            sleep(0.1);
                        } catch(\Exception $e) {
                            $this->warn($e->getMessage());
                        }
                    }
            });

        $this->info('Sync finalizado!');
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

    private function getSyncEndpoindURL() {
        return $this->sanitizeURL($this->config['url']) . 'put';
    }

    private function sendLog($log) {
        $logAsArray = json_decode(json_encode($log), true);
        $data = array_merge(
            $this->config,
            $logAsArray
        );

        $url = $this->getSyncEndpoindURL();
        $this->comment(' enviando: id=' . $log->id . ', fk_user_id=' . $log->id . ', loginTime=' . $log->loginTime);

        $response = Curl::to($url)
            ->withData($data)
            ->withTimeout(2)
            ->returnResponseObject()
            ->asJsonResponse()
            ->post();

        if($response->status != 200) {
            throw new \Exception('falha de acesso em URL="'.$url.'", response=' . print_r($response, true));
        }

        if(isset($response->content->error)) {
            throw new \Exception($response->content->message);
        }

        return true;
    }
}