<?php
 
namespace App\Console\Commands;
 
use Illuminate\Console\Command;
use Ixudra\Curl\Facades\Curl;
 
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
        $this->fetchFromEndpoint('fernando.bevilacqua');
        $this->info('Dados da API "whereis" buscados com sucesso.');
    }

    private function fetchFromEndpoint($id) {
        $endpoint_url = 'http://172.20.67.219:7000/';
        $response = Curl::to($endpoint_url)->get();
    }
}