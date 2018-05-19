<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PandapixStartCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pandapix:ativar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '
        Esse comando serve para iniciar um projeto novo do zero, criando a estrutura basica da base de dados
    ';

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
        printf("\nInicio da criação da estrutura da base de dados");

         Schema::create('usuario_sistema', function (Blueprint $table) {
            $table->increments('usu_id');
            $table->string('usu_nome',156);
            $table->string('usu_senha',45);
            $table->timestamp('usu_data_criacao')->useCurrent();
            $table->timestamp('usu_ultimo_acesso')->nullable();
        });

        printf("\nbase criada, iniciando a população do usuário padrão");

        DB::table('usuario_sistema')->insert([
            'usu_nome' => 'Gritzko',
            'usu_senha' => sha1('123456'),
            'usu_ultimo_acesso' => date('Y-m-d H:i:s')
        ]);
        printf("\nTudo pronto, Have a little fun!!!");
    }
}
