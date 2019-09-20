<?php
 
namespace App\Console\Commands;
 
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;

class UserAdd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:add';
 
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adiciona um novo usuário ao sistema.';

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
        $name = $this->ask('Qual o nome completo?');
        $uid = $this->ask('Qual o idUFFS?');
        $email = $this->ask('Qual o e-mail?');
        $apiKey = $this->ask('Qual a api_key');
        $device = $this->ask('Qual o MAC do dispositivo?');

        DB::table('users')->insert([
            'name'         => $data->ap,
            'uid'         => $data->ip,
            'email'  => $data->loginTime,
            'api_key'       => $data->wlan,
            'device' => time(),
            'created_at' => 0,
            'created_at' => 0,
            'created_at' => time(),
            'updated_at' => time()
        ]);
       
        $this->info('Dados da API "whereis" buscados com sucesso!');
    }
}