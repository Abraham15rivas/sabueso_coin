<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 30)->unique();
            $table->string('description', 191)->nullable();
            $table->timestamps();
        });
        
        DB::table('roles')->insert(array('id'=>'1','name'=>'Root', 'description'=>'Administrador'));
        DB::table('roles')->insert(array('id'=>'2','name'=>'Client', 'description'=>'Usuario Común'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
