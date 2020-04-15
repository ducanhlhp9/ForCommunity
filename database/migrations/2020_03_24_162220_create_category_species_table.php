<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorySpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('category_species', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('cate_name',99);
            $table->string('cate_slug', 99)->nullable();
            $table->string('cate_icon', 20)->nullable();
            $table->string('cate_avatar', 30)->nullable();
            $table->string('cate_title_seo', 30)->nullable();
            $table->string('cate_description_seo',30)->nullable();
            $table->string('cate_description', 100)->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        DB::connection('mysql')->table('category_species')->insert([
            [
                'cate_name' =>'Nông sản',
            ],
            [
                'cate_name' =>'Động vật',
            ],
            [
                'cate_name' =>'Trẻ em',
            ],
            [
                'cate_name' =>'Người vô gia cư',
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
        Schema::dropIfExists('category_species');
    }
}
