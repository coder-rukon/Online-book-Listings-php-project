<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User as ModeUser;
use App\Category;
use App\Location;
use App\CategoryRelation;
use App\Book;
class User extends Controller
{
    
    public function getProfile(){
        $user = auth()->user();
        $user = ModeUser::find($user)->first();
        return response()->json($user);
    }
    public function updateUser(Request $request){
        $request->validate([
            'email'=>'required'
        ]);
        $user = auth()->user();
        $user = ModeUser::find($user)->first();
        if( $request->file('profilePicture')){
            $pictureUrl = asset('storage/'.$request->file('profilePicture')->store("profile-picture",['disk' => 'public']) );
            $user->picture = $pictureUrl;
        }
        $user->name = $request->input("name");
        if($request->input("email"))
            $user->email = $request->input("email");
        $user->phone = $request->input("phone");
        $user->facebook = $request->input("facebook");
        $user->twitter = $request->input("twitter");
        $user->google = $request->input("google");
        $user->address = $request->input("address");
        $password = $request->input("password");
        if($password && !empty($password)){
            $user->password = Hash::make($password);;
        }
        $user->update();
        return response()->json($user);
    }


    public function BookUpload(Request $request){
        $request->validate([
            'name' => 'required'
        ]);
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
        $book->status = "pending";
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
        $category = $request->input('book_category');
        if($category){
            foreach($category as $cat){
                $catRelateion = new CategoryRelation();
                $catRelateion->book_id = $book->id;
                $catRelateion->category_id = $cat;
                $catRelateion->save();
            }
        }

        return response()->json($book);
    }


    public function bookUpdate(Request $request){
        $request->validate(
            [
                'id' => 'required',
                'name' => 'required'
            ]
        );
        

        $book = Book::find( $request->input('id') );
        $book->name = $request->input("name");
        $book->author = $request->input("author");
        $book->description = $request->input("description");
        $book->type = $request->input("type");
        $book->status = "pending";
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
        
        $book->update();
        $oldCategory = CategoryRelation::where('book_id','=',$book->id);
        $oldCategory->delete();
        $category = $request->input('book_category');
        if($category){
            foreach($category as $cat){
                $catRelateion = new CategoryRelation();
                $catRelateion->book_id = $book->id;
                $catRelateion->category_id = $cat;
                $catRelateion->save();
            }
        }
        

        return response()->json($book);
    }



    public function Books(){
        $user = auth()->user();
        $books = Book::where('uploaded_by','=',$user->id)->orderBy('id',"DESC")->paginate(3);
        $outputDat = [];
        $outputDat['resource'] = asset('storage/');
        $outputDat['books'] = $books;
        return response()->json($outputDat);
    }

    public function DeleteBook(Request $request){
        $output['message'] = "Id Required";
        $request->validate([
            'id' => 'required'
        ]);
        $user = auth()->user();
        $book = Book::find($request->input("id"));
        if(!$book){
            $output['message'] = "Book Not found";
        }
        if($user->id == $book->uploaded_by){
            $book->delete();
            $output['message'] = "Book Deleted";
        }
        else{
            $output['message'] = "You Don't Have Access!";
        }
            

        return response()->json($output);
    }
}
