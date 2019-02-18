<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqTranslation extends Model
{
    //
    protected $fillable = ['question','answer','faq_id','locale'];
}
