<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('articles_organization', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('ao_title',99);
            $table->string('ao_title_seo', 99);
            $table->string('ao_description',100);
            $table->string('ao_description_seo', 50);
            $table->string('ao_content', 5000)->nullable();
            $table->string('ao_images',30)->nullable();
            $table->string('ao_organization_name', 100);

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
        Schema::dropIfExists('articles_organization');
    }
}
