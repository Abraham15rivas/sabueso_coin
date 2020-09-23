<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_company', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('company_id');

            $table->foreign('category_id')->references('id')->on('categories')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('company_id')->references('id')->on('companies')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_company');
    }
}
