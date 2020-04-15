<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\CategoryModels;


class Category extends Controller
{

    public function index()
    {
//        $CategoryList = CategoryModels::paginate();
////        return response()->json($CategoryList, 200);
         return response()->json(CategoryModels::get(), 200);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $rules=[
            'cate_name' => 'required',
        ];
        $validator = Validator::make($request -> all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $category = CategoryModels::create($request->all());
        return response()->json($category, 201);
    }

    public function show($id)
    {
        $category = CategoryModels::find($id);
        if(is_null($category)){
            return response()->json(["message"=>"Record not found!!"], 404);
        }
        return response()->json($category, 200);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $category = CategoryModels::find($id);
        if(is_null($category)){
            return Response()->json(["message"=>"Record not found!!"],404);
        }
        $category->update($request->all());
        return response()->json($category, 200);
    }


    public function destroy($id)
    {
        $category = CategoryModels::find($id);
        if(is_null($category)){
            return Response()->json(["message"=>"Record not found!!"],404);
        }
        $category->delete();
        return response()->json(null,204);
    }
}
