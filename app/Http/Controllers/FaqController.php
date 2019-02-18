<?php

namespace App\Http\Controllers;

use App\Category;
use App\FaqTranslation;
use App\Faq;
use Config;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faq = Faq::create($request->all());
        $cat_id = $request['category_id'];
        $locales = Config::get('translatable.locales');

        foreach ($locales as $locale) {
            $question = "question-".$locale;
            $answer = "answer-".$locale;
            
            $input['locale'] =$locale;
            $input['faq_id'] =$faq->id;
            $input['question'] =$request[$question]; 
            $input['answer'] =$request[$answer]; 
            FaqTranslation::create($input);
        }
    
        //$article->save();

        return redirect("admin/categories/faq/list/$cat_id")->with('status', 'FAQ has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $faqObj = Faq::find($id); 
        $cat_id = $faqObj->category_id;

        $locales = Config::get('translatable.locales');

        FaqTranslation::where('faq_id', $id)->delete(); 

        foreach ($locales as $locale) {
            $question = "question-".$locale;
            $answer = "answer-".$locale;
            
            $input['locale'] =$locale;
            $input['faq_id'] =$id;
            $input['question'] =$request[$question]; 
            $input['answer'] =$request[$answer]; 
            FaqTranslation::create($input);
        }

        return redirect("admin/categories/faq/list/$cat_id")->with('status', 'FAQ has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FaqTranslation::where('faq_id', $id)->delete(); 
        $faqObj = Faq::find($id);
        $cat_id = $faqObj->category_id;
        Faq::findOrFail($id)->delete();

        return redirect("admin/categories/faq/list/$cat_id")->with('status', 'FAQ deleted successfully!');
    }

    public function faqList($id)
    {
        //
         $categories = Category::find($id); 
         $cat_id =  $id; 
         $name = $categories->name;
         return view('faq.index', compact('categories','cat_id','name'));
    }

    public function createFaq($id)
    {   
        $catObj = Category::find($id);
        $locales = Config::get('translatable.locales');
        return view('faq.create', compact('catObj','locales'));
    }

    public function editFaq($id)
    {   
        $locales = Config::get('translatable.locales');
        $faqObj = Faq::find($id);
        return view('faq.edit', compact('faqObj','locales'));

    }
}
