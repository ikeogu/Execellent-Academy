<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('reference', 100);
            $table->string('card_type', 100);
            $table->string('bank', 100);
            $table->string('email', 100);
            $table->bigInteger('amount');
            $table->bigInteger('book_id');
            $table->string('paid_at', 100);
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
        Schema::dropIfExists('purchases');
    }
}
