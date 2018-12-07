<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('pro_year')->nullable();
            $table->integer('solds');
            $table->string('size');
            $table->string('pages');
            $table->string('language');
            $table->string('about');
            $table->string('img_path');
            $table->string('price');
            $table->string('discount')->nullable();
            $table->enum('cover',['paperback','hardback']);
            $table->date('published_at')->nullable();
            $table->boolean('best_seller')->default(false);
            $table->string('edition')->default('First edition');
            $table->string('weight')->nullable();
            $table->string('rating')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
