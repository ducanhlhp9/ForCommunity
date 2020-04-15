<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('ariticles_user', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('au_title',99);
            $table->string('au_title_seo', 99);
            $table->string('au_description',100);
            $table->string('au_description_seo', 50);
            $table->string('au_content', 5000)->nullable();
            $table->string('au_images',30)->nullable();
            $table->string('au_user_name', 100);

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
        Schema::dropIfExists('articles_user');
    }
}
