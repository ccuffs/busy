<?php
 
namespace App\Console\Commands;
 
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;

class UserUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:update';
 
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Atualiza os dados de um usuário existente.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
 
    private function printUser($user, $message = 'Dados do usuário:') {
        $userInfoText = "";
        foreach($user as $field => $value) {
            $userInfoText .= ' - ' . $field . ": " . $value . "\n";
        }

        $this->comment($message);
        echo $userInfoText . "\n";
    }

    private function getUserByUid($uid) {
        if(empty($uid)) {
            return null;
        }

        $user = DB::table('users')
            ->where('uid', 'LIKE', "%{$uid}%")
            ->first();

        return $user;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $uid = $this->ask('Qual o idUFFS do usuário?');
        $user = $this->getUserByUid($uid);

        if($user == null) {
            $this->comment('Desculpe, usuário com idUFFS "'.$uid.'" não existe.');
            exit();
        }

        $update = array();
        $changes = array(
            'name'    => 'Qual o novo nome completo? [ENTER mantem "%s"]',
            'uid'     => 'Qual o novo idUFFS? [ENTER mantem "%s"]',
            'email'   => 'Qual o novo e-mail? [ENTER mantem "%s"]',
            'api_key' => 'Qual a nova api_key? [ENTER mantem "%s"]',
            'device'  => 'Qual o novo MAC do dispositivo? [ENTER mantem "%s"]'
        );

        $this->printUser($user);

        foreach($changes as $field => $template) {
            $question = sprintf($template, $user->$field);
            $value = $this->ask($question);

            if(!empty($value)) {
                $update[$field] = $value;
            }
        }
        
        if(count($update) > 0) {
            DB::table('users')
                ->where('id', $user->id)
                ->update($update);
        }

        $user = $this->getUserByUid($uid);
        $this->printUser($user, 'Novos dados do usuário:');

        $this->info('Usuário atualizado com sucesso!');
    }
}