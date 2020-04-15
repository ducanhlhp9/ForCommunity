<?php

namespace App\Http\Controllers;

use App\Models\CategoryModels;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Category()
    {
        return response()->json(CategoryModels::get(), 200);
    }

    public function CategoryByID($id)
    {
        $category = CategoryModels::find($id);
        if(is_null($category)){
            return response()->json(["message"=>"Record not found!!"], 404);
        }
        return response()->json($category, 200);
    }

    public function CategorySave(Request $request)
    {
        $category = CategoryModels::create($request->all());
        return response()->json($category, 201);
    }

    public function CategoryUpdate(Request $request, $id)
    {
        $category = CategoryModels::find($id);
        if(is_null($category)){
            return Response()->json(["message"=>"Record not found!!"],404);
        }
        $category->update($request->all());
        return response()->json($category, 200);
    }

    public function CategoryDelete(Request $request,  $id)
    {
        $category = CategoryModels::find($id);
        if(is_null($category)){
            return Response()->json(["message"=>"Record not found!!"],404);
        }
        $category->delete();
        return response()->json(null,204);
    }
}
