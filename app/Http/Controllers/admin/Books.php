<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Location;
use App\Book;
use App\CategoryRelation;
use Illuminate\Support\Facades\Storage;
class Books extends Controller
{
    public function Index(){
        $bodyData['books'] = Book::orderBy('id',"DESC")->paginate(15);
        return view('admin.booksList',$bodyData);
    }

    public function AddBook(){
        $bodyData['category'] = Category::orderBy('id','DESC')->get();
        $bodyData['locations'] = Location::orderBy('id','DESC')->get();
        return view('admin.createbook',$bodyData);
    }

    public function ReauesteDeleteBook($id){
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('admin.booklist')->with("message","Boook Deleted");

    }
    public function RequestNewBook(Request $request){
        $request->validate(
            [
                'name' => 'required',
                'thumbnail' => 'required',
                //'category' => 'category',
                'description' => 'required',
                'type' => 'required',
                'location' => 'required',
                'author' => 'required',
                'edition' => 'required',
                'thumbnail' => 'required',
            ]
        );

        $book = new Book();
        $book->name = $request->input("name");
        $book->author = $request->input("author");
        $book->description = $request->input("description");
        $book->type = $request->input("type");
        $book->status = $request->input("status");
        $book->edition = $request->input("edition");
        $book->contact_details = $request->input("contact_details");
        $book->location = $request->input("location");
        $book->uploaded_by = auth()->user()->id;
        if( $request->file('thumbnail')){
            $book->thumbnail = $request->file('thumbnail')->store("thumbnail",['disk' => 'public']);
        }
        if($request->file('book_file')){
            $book->file_url = $request->file('book_file')->store("book_file",['disk' => 'public']);
        }
        $book->save();
        $category = $request->input('category');
        if($category){
            foreach($category as $cat){
                $catRelateion = new CategoryRelation();
                $catRelateion->book_id = $book->id;
                $catRelateion->category_id = $cat;
                $catRelateion->save();
            }
            
        }
        return redirect()->route('admin.editBook',['id'=>$book->id])->with("message","Book Created.");
    }

    public function EditBook($id){
        
        $book  = Book::find(['id'=>$id])->first();
        $bodyData['category'] = Category::orderBy('id','DESC')->get();
        $bodyData['locations'] = Location::orderBy('id','DESC')->get();
        $bodyData['existCategory'] = [];
        $existCategory = CategoryRelation::where(['book_id' => $id])->get();

        foreach($existCategory as $cat){
            $bodyData['existCategory'][] = $cat->category_id;
        }
        $bodyData['book'] = $book;
        //$bodyData['thumbnail'] = Storage::url( $bodyData['book']->thumbnail );
        //dd($bodyData['thumbnail']);
        return view('admin.book.edit',$bodyData);
    }
    public function RequestEditBook(Request $request){
        $request->validate(
            [
                'name' => 'required',
                //'thumbnail' => 'required',
                //'category' => 'category',
                'description' => 'required',
                'type' => 'required',
                'location' => 'required',
                'author' => 'required',
                'edition' => 'required',
            ]
        );

        $book = Book::find(['id'=>$request->input('id')])->first();;
        $book->name = $request->input("name");
        $book->author = $request->input("author");
        $book->description = $request->input("description");
        $book->type = $request->input("type");
        $book->edition = $request->input("edition");
        $book->contact_details = $request->input("contact_details");
        $book->status = $request->input("status");
        $book->location = $request->input("location");

        if( $request->file('thumbnail')){
            $book->thumbnail = $request->file('thumbnail')->store("thumbnail",['disk' => 'public']);
        }
        if($request->file('book_file')){
            $book->file_url = $request->file('book_file')->store("book_file",['disk' => 'public']);
        }
        $book->update();

        $category = $request->input('category');
        $deleteOldCategory = CategoryRelation::where(['book_id' => $book->id]);
        $deleteOldCategory->delete();
        if($category){
            foreach($category as $cat){
                $catRelateion = new CategoryRelation();
                $catRelateion->book_id = $book->id;
                $catRelateion->category_id = $cat;
                $catRelateion->save();
            }
            
        }
        return redirect()->route('admin.editBook',['id'=>$book->id])->with("message","Book Updated");
    }

    public function Category(){
        $bodyData = [];
        $bodyData['category'] = Category::orderBy('id','DESC')->paginate(5);
        return view('admin.bookcategory',$bodyData);
    }

    public function CreateCategory(Request $request){
        $request->validate([
            "name" => "required"
        ]);
        $message = "Category Created";
        if($request->input('id')){
            $category = Category::find($request->input('id'));
            $message = "Category Updated";
        }else{
            $category = new Category();
        }
        $category->name = $request->input('name');
        $category->thumbnail = $request->input('thumbnail');
        $category->show_in_home = $request->input('show_in_home');
        $category->save();
        return redirect()->route('admin.bookcategory')->with(['message' => $message]);
    }

    public function EditCategory($id){
        $bodyData['categorySingle'] = Category::find($id);
        $bodyData['category'] = Category::orderBy('id','DESC')->paginate(5);
        return view('admin.bookcategory',$bodyData);
    }


    public function DeleteCategory($id){
        Category::find($id)->delete();
        return redirect(route('admin.bookcategory'))->with(['message' => "Category Deleted"]);
    }
}
