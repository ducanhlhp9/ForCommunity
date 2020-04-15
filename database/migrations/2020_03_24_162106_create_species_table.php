<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('species', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('spe_name', 99);
            $table->integer('spe_category_id');
            $table->string('spe_slug', 99)->nullable();
            $table->integer('spe_user_id');
            $table->string('spe_images', 200)->nullable();
            $table->string('spe_description', 5000)->nullable();
            $table->string('spe_message', 1000)->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        DB::connection('mysql')->table('species')->insert([
            [
                'spe_name'=>'Dưa hấu',
                'spe_category_id' => 1 ,
                'spe_user_id' => 1
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('species');
    }
}
