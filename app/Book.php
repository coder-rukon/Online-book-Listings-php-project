<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $id_number;
    protected $table = "books";
    protected $fillable = [
                            'id',
                            'name',
                            'location',
                            'author',
                            'description',
                            'uploaded_by',
                            'thumbnail',
                            'contact_details',
                            'type',
                            'edition',
                            'file_url',
                            'language',
                            'status'
                        ];
}
