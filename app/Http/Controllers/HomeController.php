<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\User;
use App\Location;
class HomeController extends Controller
{
    public $bodyData;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->bodyData = [];
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->bodyData['recentBooks'] = Book::where('status','=','publish')->orderBy('id',"DESC")->limit(12)->get();
        $this->bodyData['recent_users'] = User::orderBy("id","DESC")->limit(4)->get();
        $this->bodyData['counter']['category'] = Category::count();
        $this->bodyData['counter']['book'] = Book::count();
        $this->bodyData['counter']['location'] = Location::count();
        $this->bodyData['counter']['user'] = User::count();
        $this->bodyData['homeCategory'] = Category::where('show_in_home','=','yes')->orderBy('name',"ASC")->get();
        return view('welcome',$this->bodyData);
    }
}
