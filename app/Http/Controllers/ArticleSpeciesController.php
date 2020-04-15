<?php

namespace App\Http\Controllers;

use App\Models\ArticleSpeciesModel;
use http\Env\Response;
use Illuminate\Http\Request;
use Validator;
use function GuzzleHttp\Promise\all;

class ArticleSpeciesController extends Controller
{
    public function ArticleSpecies()
    {
        return response()->json(ArticleSpeciesModel::get(), 200);
    }

    public function ArticleSpeciesByID($id)
    {
        $articleSpecies = ArticleSpeciesModel::find($id);
        if(is_null($articleSpecies)){
            return response()->json(["message"=>"Record not found!!"], 404);
        }
        return response()->json($articleSpecies, 200);
    }

    public function ArticleSpeciesSave(Request $request)
    {
        $rules=[
            'as_name' => 'required',
            'as_category_id'=>'required|min:1',
            'as_spe_id'=>'required|min:1'
        ];
        $validator = Validator::make($request -> all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $articleSpecies = ArticleSpeciesModel::create($request->all());
        return response()->json($articleSpecies, 201);
    }

    public function ArticleSpeciesUpdate(Request $request, $id)
    {
        $articleSpecies = ArticleSpeciesModel::find($id);
        if(is_null($articleSpecies)){
            return Response()->json(["message"=>"Record not found!!"],404);
        }
        $articleSpecies->update($request->all());
        return response()->json($articleSpecies, 200);
    }

    public function ArticleSpeciesDelete(Request $request,  $id)
    {
        $articleSpecies = ArticleSpeciesModel::find($id);
        if(is_null($articleSpecies)){
            return Response()->json(["message"=>"Record not found!!"],404);
        }
        $articleSpecies->delete();
        return response()->json(null,204);
    }
}
