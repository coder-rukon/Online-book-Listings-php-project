<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryRelation extends Model
{
    protected $table = 'category_relation';
    public $timestamps = false;
    protected $fillable = ['book_id','category_id'];
}
