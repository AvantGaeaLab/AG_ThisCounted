<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('merchant_id');
            $table->timestamps();
            $table->string('title')->unique();
            $table->datetime('start_at')->nullable();
            $table->datetime('end_at')->nullable();
            $table->longText('date')->nullable();
            $table->longText('retails_price')->nullable();
            $table->double('price')->nullable();
            $table->longText('description')->nullable();
            $table->longText('more_info')->nullable();
            $table->longText('location')->nullable();
            $table->longText('map')->nullable();
            $table->string('status')->default('Valid');
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
        Schema::table('deals', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::dropIfExists('deals');
    }
}
