<?php
if(!function_exists("RsCategory")){
    function RsCategory(){
        $category = \App\Category::orderBy('name',"ASC")->get();
        return $category;
    }
}

if(!function_exists("RsGetBookCats")){
    function RsGetBookCats($bookId){
        $catsId = \App\CategoryRelation::where('book_id','=',$bookId)->get(['category_id']);
        $category = \App\Category::whereIn("id",$catsId)->orderBy("name","ASC")->get();
        return $category;
    }
}

if(!function_exists("RsGetLocation")){
    function RsGetLocation(){
        $locations = \App\Location::orderBy('name','ASC')->get();
        return $locations;
    }
}
?>