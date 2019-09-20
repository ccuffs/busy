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
        $user = array();
        $fields = array(
            'name'     => 'Qual o nome completo?',
            'position' => 'Qual a posição? (ex. Professor Letras)?',
            'addrress' => 'Qual o endereço? (ex.: Chapecó/SC)',
            'uid'      => 'Qual o idUFFS?',
            'email'    => 'Qual o e-mail?',
            'api_key'  => 'Qual a api_key?',
            'device'   => 'Qual o MAC do dispositivo?'
        );

        foreach($fields as $field => $question) {
            do {
                $value = $this->ask($question);
            } while (empty($value));

            $user[$field] = $value;
        }

        $user['checked_at'] = 0;
        $user['next_check_at'] = 0;
        $user['created_at'] = time();
        $user['updated_at'] = time();

        DB::table('users')->insert($user);
       
        $this->comment('Usuário "'. $user['name'] .'" criado com sucesso!');
    }
}