<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('register', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->integer('re_transaction_id');
            $table->integer('re_species_id');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        DB::connection('mysql')->table('register')->insert([
            [
                're_transaction_id'=>1,
                're_species_id' => 1 ,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register');
    }
}
