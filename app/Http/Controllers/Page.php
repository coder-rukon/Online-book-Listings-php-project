<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Location;
use App\Category;
use App\CategoryRelation;
class Page extends Controller
{
    public $ppp = 20;
    public function About(){
        return view('page.about');
    }
    public function Contact(){
        return view("page.contact");
    }
    public function Book($id){
        $book = Book::find($id);
        $pageData['book'] = $book;
        $pageData['category_menu'] = Category::inRandomOrder()->limit(10)->get();
        $pageData['category'] = Category::whereIn('id',CategoryRelation::where('book_id','=',$id)->get(['category_id'])  )->get();
        $pageData['related_book'] = Book::whereIn('id',CategoryRelation::whereIn('category_id',$pageData['category'])->get(['book_id']))->orderBy('id',"DESC")->limit(10)->get();
        return view("page.book",$pageData);
    }
    public function Books(){
        $data['books'] = Book::where('status' ,'=', 'publish')->orderBy("id",'DESC')->paginate($this->ppp);
        $data['title'] = "";
        $data['subtitle'] = "All Books";
        return view('category',$data);
    }
    public function Search(Request $request){
        if($request->input('name')){
            $name = $request->input('name');
            $data['title'] = "We are seraching by boook name";
            $data['subtitle'] = $name;
            $data['books'] = Book::where("name",'like',"%".$name."%")->paginate($this->ppp)->appends(['name'=>$name]);
        }
        else if($request->input('author')){
            $author = $request->input('author');
            $data['title'] = "We are searching by book author";
            $data['subtitle'] = $author;
            $data['books'] = Book::where("author",'like',"%".$author."%")->paginate($this->ppp)->appends(['author'=>$author]);
        }
        else if($request->input('location')){
            $location = $request->input('location');
            $name = $request->input('s');
            $locationObj = Location::find($location);
            $data['title'] = "We are searching books location at:";
            $data['subtitle'] = $locationObj->name;
            $data['books'] = Book::where([["location",'=',$location],["name",'like',"%".$name."%"]])->paginate($this->ppp)->appends(['location'=>$location,'s' => $name]);
        }else{
            return abort(404);
        }
        
        return view('category',$data);
    }
}
