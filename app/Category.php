<?php

namespace App;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    use Translatable;
    public $translatedAttributes = ['name','answer','question'];
    protected $fillable = ['status'];

    public function faqs(){
        return $this->hasMany('App\Faq','category_id');
     }
}
