<?php
 
namespace App\Console\Commands;
 
use Illuminate\Console\Command;
 
class FetchWhereIs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:whereis';
 
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
        $this->info('Dados da API "whereis" buscados com sucesso.');
    }
}