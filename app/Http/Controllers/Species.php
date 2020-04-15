<?php

namespace App\Http\Controllers;

use App\Models\ArticleSpeciesModel;
use App\Models\SpeciesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class species extends Controller
{

    public function index()
    {
        return response()->json(SpeciesModel::get(), 200);
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $species = new SpeciesModel();
        $ArticlesSpecies = new ArticleSpecies();
        $this->insertOrUpdate($request);
        return response()->json($species, 201);
    }
    public function insertOrUpdate($request, $id = '')
    {
        $species = new SpeciesModel();
        if ($id) $species = SpeciesModel::find($id);
        $species->spe_name = $request->spe_name;
        $species->spe_slug = str_slug($request->spe_name);
        $species->spe_category_id = $request->spe_category_id;
        $species->spe_description = $request->spe_description;
        if($request->hasFile('spe_images1')){
            $file = upload_image('spe_images1');
            if(isset($file['name'])){
                $species->spe_images1= $file['name'];
            }
        }if($request->hasFile('spe_images2')){
            $file = upload_image('spe_images2');
            if(isset($file['name'])){
                $species->spe_images2= $file['name'];
            }
        }if($request->hasFile('spe_images3')){
            $file = upload_image('spe_images3');
            if(isset($file['name'])){
                $species->spe_images3= $file['name'];
            }
        }

        $species->save();
        $ArticlesSpecies = new ArticleSpeciesModel();
        $ArticlesSpecies->as_name = $request->spe_name;
        $ArticlesSpecies->as_slug = str_slug($request->spe_name);
        $ArticlesSpecies->as_category_id = $request->spe_category_id;
        $ArticlesSpecies->as_description = $request->spe_description;
        if($request->hasFile('spe_images1')){
            $file = upload_image('spe_images1');
            if(isset($file['name'])){
                $ArticlesSpecies->as_images1= $file['name'];
            }
        } if($request->hasFile('spe_images2')){
            $file = upload_image('spe_images2');
            if(isset($file['name'])){
                $ArticlesSpecies->as_images2= $file['name'];
            }
        } if($request->hasFile('spe_images3')){
            $file = upload_image('spe_images3');
            if(isset($file['name'])){
                $ArticlesSpecies->as_images3= $file['name'];
            }
        }
        $ArticlesSpecies->save();
    }


    public function show($id)
    {
        $species = SpeciesModel::find($id);
        if(is_null($species)){
            return response()->json(["message"=>"Record not found!!"], 404);
        }
        return response()->json($species, 200);
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $species = SpeciesModel::find($id);
        if(is_null($species)){
            return Response()->json(["message"=>"Record not found!!"],404);
        }
        $species->update($request->all());
        return response()->json($species, 200);
    }


    public function destroy($id)
    {
        $species = SpeciesModel::find($id);
        if(is_null($species)){
            return Response()->json(["message"=>"Record not found!!"],404);
        }
        $species->delete();
        return response()->json(null,204);
    }
    public function action( $action, $id){
        if($action)
        {
            $species = SpeciesModel::find($id);
            switch ($action){
                case 'active':
                    $species->spe_hot = $species->spe_hot ? 0: 1;
                    $species->save();
                    break;
            }
        }
        return redirect()->back();
    }
}
