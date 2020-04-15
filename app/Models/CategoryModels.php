<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModels extends Model
{
    protected $table = "category_species";
    protected $fillable = [
        'id',
        'cate_name',
        'cate_slug',
        'cate_icon',
        'cate_avatar',
        'cate_title',
        'cate_description',
        'cate_description_seo',
        'cate_status',
        'created_at',
        'updated_at'
    ];
}
