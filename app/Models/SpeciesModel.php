<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpeciesModel extends Model
{
    protected $table = "species";
    protected $guarded  =   [''];
    protected $fillable = [
        'id',
        'spe_name',
        'spe_slug',
        'spe_category_id',
        'spe_user_id',
        'spe_images1',
        'spe_images2',
        'spe_images3',
        'spe_description',
        'spe_message',
        'created_at',
        'updated_at',
        'spe_hot'
    ];
}
