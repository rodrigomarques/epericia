<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertUrls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try{
            \DB::statement("INSERT INTO url VALUES(null, 'Tela Inicial do Sistema', 'admin.home', 'admin', 1)");

            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Adicionar Documento Exigido', 'admin.documento_exigido.index', 'documento_exigido', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Editar Documento Exigido', 'admin.documento_exigido.edit', 'documento_exigido', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Excluir Documento Exigido', 'admin.documento_exigido.delete', 'documento_exigido', 1)");

            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Adicionar Tipo de Documento', 'admin.tipo_documento.index', 'tipo_documento', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Editar Tipo de Documento', 'admin.tipo_documento.edit', 'tipo_documento', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Excluir Tipo de Documento', 'admin.tipo_documento.delete', 'tipo_documento', 1)");

            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Adicionar Tipo de Perícia', 'admin.tipo_pericia.index', 'tipo_pericia', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Editar Tipo de Perícia', 'admin.tipo_pericia.edit', 'tipo_pericia', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Excluir Tipo de Perícia', 'admin.tipo_pericia.delete', 'tipo_pericia', 1)");

            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Adicionar Objeto', 'admin.objeto.index', 'objeto', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Editar Objeto', 'admin.objeto.edit', 'objeto', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Excluir Objeto', 'admin.objeto.delete', 'objeto', 1)");

            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Adicionar Fases', 'admin.fases.index', 'fases', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Editar Fases', 'admin.fases.edit', 'fases', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Excluir Fases', 'admin.fases.delete', 'fases', 1)");

            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Adicionar Tag', 'admin.tag.index', 'tag', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Editar Tag', 'admin.tag.edit', 'tag', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Excluir Tag', 'admin.tag.delete', 'tag', 1)");

            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Adicionar Usuário', 'admin.usuario.index', 'usuario', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Editar Usuário', 'admin.usuario.edit', 'usuario', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Excluir Usuário', 'admin.usuario.delete', 'usuario', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Buscar Usuário', 'admin.usuario.buscar', 'usuario', 1)");

            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Adicionar Perfil', 'admin.usuario.perfil', 'perfil', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Editar Perfil', 'admin.usuario.perfil.edit', 'perfil', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Excluir Perfil', 'admin.usuario.perfil.delete', 'perfil', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela para Controlar Acesso', 'admin.usuario.perfil.access', 'perfil', 1)");

            /*
            \DB::statement("INSERT INTO url VALUES(null, 'Tela Adicionar Processos', 'admin.processo.index', 'processo', 1)");
            \DB::statement("INSERT INTO url VALUES(null, 'Tela Buscar Processos', 'admin.processo.buscar', 'processo', 1)");

            */
        }catch(\Exception $e){

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        try{
            \DB::statement("DELETE FROM url");
        }catch(\Exception $e){

        }
    }
}
