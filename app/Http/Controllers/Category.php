<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category as ModelCategory;
use App\CategoryRelation;
class Category extends Controller
{
    public $bodyData;
    public function __construct(){
        $this->bodyData['title'] = "Book Categories";
        $this->bodyData['subtitle'] = "All Categories";
    }
    public function Index(){
        $this->bodyData['books'] = Book::orderBy('id','DESC')->paginate(20);
    	return view('category',$this->bodyData);
    }
    public function BooksByCetegory($id){
        $category = ModelCategory::find($id);
        $this->bodyData['title'] = "Book Category";
        $this->bodyData['subtitle'] = $category->name;
        $booksIds = CategoryRelation::where('category_id','=',$id )->get(['book_id']);
        $this->bodyData['books'] = Book::whereIn('id',$booksIds)->orderBy('id','DESC')->paginate(20);
    	return view('category',$this->bodyData);
    }
}
