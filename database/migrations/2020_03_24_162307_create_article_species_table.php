<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('article_species', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('as_name',99);
            $table->string('as_slug', 99)->nullable();
            $table->integer('as_category_id');
            $table->integer('as_spe_id');
            $table->integer('as_active')->nullable();
            $table->string('as_images',30)->nullable();
            $table->string('as_description', 5000)->nullable();
            $table->string('as_message',1000)->nullable();
            $table->string('as_description_seo',50 )->nullable();
            $table->string('as_title', 20)->nullable();
            $table->string('as_title_seo', 30)->nullable();
            $table->string('as_status', 99)->nullable();
            $table->string('as_address',99)->nullable();
            $table->string('as_content',5000)->nullable();

            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        DB::connection('mysql')->table('article_species')->insert([
            [
                'as_name'=>'Dưa hấu',
                'as_category_id' => 1 ,
                'as_spe_id' => 1
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
        Schema::dropIfExists('article_species');
    }
}
