<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublishedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publisheds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('author_name');
            $table->string('author_email');
            $table->string('filename');
            $table->string('no_pages');
            $table->string('keywords');
            $table->string('vols');
            $table->integer('status');
            $table->string('journal_id');
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
        Schema::dropIfExists('publisheds');
    }
}
