<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryTranslation;
use Illuminate\Http\Request;
use Config;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories = Category::paginate(10);   
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locales = Config::get('translatable.locales');
        return view('category.create',compact('locales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());

        $locales = Config::get('translatable.locales');


        foreach ($locales as $locale) {
            $name = "name-".$locale;
            $input['locale'] =$locale;
            $input['category_id'] =$category->id;
            $input['name'] =$request[$name];        

            CategoryTranslation::create($input);
        }
    
        //$article->save();

        return redirect('admin/categories')->with('status', 'Category has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.view',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locales = Config::get('translatable.locales');
        $categoryObj = Category::find($id);
        return view('category.edit', compact('categoryObj','locales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoryObj = Category::find($id);        
        $categoryObj->save();

        $locales = Config::get('translatable.locales');

        CategoryTranslation::where('category_id', $id)->delete(); 

        foreach ($locales as $locale) {
            $name = "name-".$locale;
            $input['locale'] =$locale;
            $input['category_id'] =$categoryObj->id;
            $input['name'] =$request[$name];        

            CategoryTranslation::create($input);
        }

        return redirect('admin/categories')->with('status', 'Category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryTranslation::where('category_id', $id)->delete(); 

        Category::findOrFail($id)->delete();

        return redirect('admin/categories')->with('status', 'Category deleted successfully!');

    }
}
