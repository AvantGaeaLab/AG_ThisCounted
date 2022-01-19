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
            $table->timestamps();
            $table->string('title')->unique();
            $table->string('main_pic');
            $table->string('pic2')->nullable();
            $table->string('pic3')->nullable();
            $table->datetime('start_at')->nullable();
            $table->datetime('end_at')->nullable();
            $table->string('retails_price')->nullable();
            $table->string('price')->nullable();
            $table->string('description')->nullable();
            $table->string('more_info')->nullable();
            $table->string('location')->nullable();
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
