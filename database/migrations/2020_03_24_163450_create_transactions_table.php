<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('transactions', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->integer('tr_user_id');
            $table->string('tr_organization_name', 99)->nullable();
            $table->string('tr_message', 400)->nullable();
            $table->string('tr_address', 200)->nullable();
            $table->integer('tr_phone')->nullable();
            $table->integer('tr_status')->nullable();

            $table->timestamps();

            $table->engine = 'InnoDB';
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
