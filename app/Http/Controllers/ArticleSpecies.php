<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleSpeciesModel;
use http\Env\Response;
use Illuminate\Support\Facades\Validator;

class ArticleSpecies extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//       $ArticlesSpeciesList = ArticleSpeciesModel::paginate();
        return response()->json(ArticleSpeciesModel::get(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'as_name' => 'required',
            'as_category_id' => 'required|min:1',
            'as_spe_id' => 'required|min:1'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $articleSpecies = ArticleSpeciesModel::create($request->all());
        return response()->json($articleSpecies, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articleSpecies = ArticleSpeciesModel::find($id);
        if (is_null($articleSpecies)) {
            return response()->json(["message" => "Record not found!!"], 404);
        }
        return response()->json($articleSpecies, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articleSpecies = ArticleSpeciesModel::find($id);
        if(is_null($articleSpecies)){
            return Response()->json(["message"=>"Record not found!!"],404);
        }
        $articleSpecies->update($request->all());
        return response()->json($articleSpecies, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articleSpecies = ArticleSpeciesModel::find($id);
        if (is_null($articleSpecies)) {
            return Response()->json(["message" => "Record not found!!"], 404);
        }
        $articleSpecies->delete();
        return response()->json(null, 204);
    }
}
