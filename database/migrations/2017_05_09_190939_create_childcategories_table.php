<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subcategory_id')->unsigned();
            $table->string('childcategoryName',60);
            $table->string('slug',80);
            $table->timestamps();
        });

        Schema::table('childcategories', function($table){
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('childcategories');
    }
}
