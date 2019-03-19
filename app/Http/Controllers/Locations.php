<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
class Locations extends Controller
{
    private $bodyData = [];
    public function Index(){
        $this->bodyData['locations'] = Location::orderBy('id','DESC')->paginate(5);
        return view("locations",$this->bodyData);
    }
    public function Create(Request $request){
        $request->validate(
            [
                'name' => "required"
            ]
        );

        $location = new Location();
        $location->name = $request->input("name");
        $location->save();
        return redirect()->route('admin.locations')->with(['message' => "Location Crated"]);
    }
    public function Delete($id){
        Location::find($id)->delete();
        return redirect()->route('admin.locations')->with(['message' => "Location Deleted"]);
    }
}
