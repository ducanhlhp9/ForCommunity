<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('or_name', 99);
            $table->string('or_leader', 99);
            $table->string('or_email', 99);
            $table->string('or_phone', 13);
            $table->string('or_address', 99);
            $table->string('or_avatar',200)->nullable();

            $table->integer('or_user_id');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        DB::connection('mysql')->table('organizations')->insert([
            [
                'or_name' 	=> 'Flappy birthday',
                'or_leader' => 'HoangDucAnh',
                'or_email' 	=> 'cducanhllhp9@gmail.com',
                'or_phone' 	=>	'0942410953',
                'or_address'	=> 'Cát thành, Trực Ninh, Nam Định',
                'or_user_id' => 1


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
        Schema::dropIfExists('organizations');
    }
}
