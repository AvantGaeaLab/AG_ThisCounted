<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('deal_id')->unsigned();
                $table->foreign('deal_id')->references('id')->on('deals')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->double('total');
            $table->enum('status', ['Valid','Canceled','Refunded','Used','Expire'])->default('Valid');
            $table->unsignedInteger('quantity')->nullable()->default('1');
            $table->unsignedInteger('used')->nullable()->default('0');
            $table->string('error')->nullable();
            $table->softDeletes();
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
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
        Schema::dropIfExists('orders');
    }
}
