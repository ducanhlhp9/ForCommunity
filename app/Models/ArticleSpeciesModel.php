<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleSpeciesModel extends Model
{
    protected $table = "article_species";
    protected $fillable = [
        'id',
        'as_name',
        'as_slug',
        'as_category_id',
        'as_spe_id',
        'as_active',
        'as_images1',
        'as_images2',
        'as_images3',
        'as_description',
        'as_message',
        'as_description_seo',
        'as_title',
        'as_title_seo',
        'as_status',
        'as_address',
        'as_content1',
        'as_content2',
        'as_content3',
        'created_at',
        'updated_at'
    ];
}
