<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsMerchants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals_merchants', function (Blueprint $table) {
            $table->unsignedBigInteger('deal_id');
            $table->unsignedBigInteger('merchant_id');

            $table->foreign('deal_id')
                ->references('id')->on('deals')
                ->onDelete('cascade');

            $table->foreign('merchant_id')
                ->references('id')->on('merchants')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deals_merchants');
    }
}
