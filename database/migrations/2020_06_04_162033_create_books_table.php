<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
           
            $table->bigIncrements('id');
            $table->unsignedInteger('family_id');
            $table->unsignedInteger('author_id');
            $table->string('title');
            $table->string('isbn');
            $table->string('price');
            $table->string('available');
            
            $table->longText('contents');
            $table->string('cover_page');
            
            $table->integer('status');

            $table->string('description');

            $table->string('year_pub');
            $table->integer('state');
            $table->bigInteger('download_count')->nullable()->default(0);
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
        Schema::dropIfExists('books');
    }
}
