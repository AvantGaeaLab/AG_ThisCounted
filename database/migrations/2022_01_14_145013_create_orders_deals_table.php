<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_deals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('deal_id')->unsigned();
            $table->foreign('deal_id')->references('id')->on('deals')
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
        Schema::dropIfExists('orders_deals');
    }
}
