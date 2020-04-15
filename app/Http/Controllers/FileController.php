<?php

namespace App\Http\Controllers;

use App\Models\ArticleSpeciesModel;
use App\Models\SpeciesModel;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public  function articleSpeciesList(){
        return response()->download(public_path(''));
    }
    public function FileSave(Request $request){
        $species = new SpeciesModel();
        if($request->hasFile('spe_images1')){
            upload_image('spe_images1');
        }
        if($request->hasFile('spe_images2')){
            upload_image('spe_images2');
        }
        if($request->hasFile('spe_images3')){
            upload_image('spe_images3');
        }
    }
    public function FileSaveArticles(Request $request){
        $ArticlesSpecies = new ArticleSpeciesModel();
        if($request->hasFile('as_images1')){
            upload_image('as_images1');
        }
        if($request->hasFile('as_images2')){
            upload_image('as_images2');
        }
        if($request->hasFile('as_images3')){
            upload_image('as_images3');
        }
    }
}
