<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('user_name', 99);
            $table->string('user_email', 99);
            $table->string('user_phone', 13);
            $table->string('user_address', 99);
            $table->string('user_avatar',200)->nullable();
            $table->string('password', 99);
            $table->rememberToken();
            $table->timestamps();
        });
        DB::connection('mysql')->table('users')->insert([
            [
                'user_name' 	=> 'Hoang Duc Anh',
                'user_email' 	=> 'ducanhllhp9@gmail.com',
                'user_phone' 	=>	'0942410953',
                'user_address'	=> 'Cát thành, Trực Ninh, Nam Định',
                'password' => 'hoangducanh'

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
        Schema::dropIfExists('users');
    }
}
