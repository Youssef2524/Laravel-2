<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
class CategoryController extends Controller
{
    public function index()
    {
        $Category=Category::all();

        return response()->json($Category,200);    }

    public function store(CategoryRequest $request)
    {
        $request->validate();
        $Category=new Categories();
        $Category->name=$request->name;
        $Category->save();

        return response()->json($Category,201);
    }

    public function show(Categories $Category,id $id)
    {
        return response()->json($Category);
    }


    public function update(CategoryRequest $request, Categories $Category,$id)
    {
        $Category=Category::find($id);
        $Category->update($request->validated());

        return response()->json($Category);
    }

    public function destroy(Categories $Category)
    {
        $Category->delete();

        return response()->json(null, 204);
    }
}

