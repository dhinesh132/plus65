<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryTranslation;
use App\Faq;
use App\FaqTranslation;
use Illuminate\Http\Request;
use Config;

class FrontEndController extends Controller
{
    
   

    public function listing($locale)
    {        
        $categories = Category::where('status',1)->get(); 
        return view('frontend.index',compact('categories','locale'));
    }

    

}
