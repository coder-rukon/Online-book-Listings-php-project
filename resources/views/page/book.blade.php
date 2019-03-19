@extends('layouts.front') 
@section('content')
<!--/process-->
<section class="banner-bottom-wthree py-lg-5 py-md-5 py-3">
    <div class="container">
        <div class="inner-sec-w3ls py-lg-5  py-3">
            <!---728x90--->
            <h3 class="tittle text-center mb-lg-4 mb-3">
                <span>Book Info</span>Book Details
            </h3>
            <!---728x90--->
            <div class="row choose-main mt-5 text-center">
                <div class="col-xs-12 col-sm-8 col-md-8">
                    <div class="course_details_right">
                        <figure class="course_details_photo">
                            <img class="img-responsive" src="{{ asset('storage/'.$book->thumbnail) }}" alt="" />
                        </figure>
                        <h3>{{ $book->name }}</h3>
                        <div class="course_meta_element">
                            <div class="course_meta_element_item flex_item_center">
                                <i class="far fa-user-circle"></i>
                                <div class="course_meta_item_content">
                                    <p>Author</p>
                                    <h5>{{ $book->author }}</h5>
                                </div>
                            </div>
                            <div class="course_meta_element_item flex_item_center">
                                <i class="far fa-bookmark"></i>
                                <div class="course_meta_item_content">
                                    <p>Category</p>
                                    <h5>
                                        @php 
                                            $categories = "";
                                            if($category){
                                                foreach ($category as $keyCategory => $valueCategory) {
                                                    if($keyCategory >=1 )
                                                        $categories .= ', '.$valueCategory->name;
                                                    $categories .= $valueCategory->name;
                                                }
                                            }
                                        @endphp
                                        {{ $categories }}
                                    </h5>
                                </div>
                            </div>
                            <div class="course_meta_element_item flex_item_center mr-0">
                                <i class="far fa-money-bill-alt"></i>
                                <div class="course_meta_item_content">
                                    <p>Edition</p>
                                    <h5>{{ $book->edition }}</h5>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="book_download_area">
                            @if ($book->type =='hard_copy')
                                <div class="book_download_btn">
                                    <a href="#book_details_contact" class="btn btn-primary">Get the Book</a>
                                </div>
                                
                            @else
                                <div class="book_download_btn">
                                    <a href="{{ asset('storage/'.$book->file_url ) }}" class="btn btn-primary">Download Book</a>
                                </div>
                            @endif
                            
                            
                        </div>
                        <div class="course_descriptions text-left">
                            <h4>About Book</h4>
                            <p>
                                    {{ $book->description }}
                            </p>
                        </div>
                        @if ($book->type =='hard_copy')
                        <div id="book_details_contact" class="book_details_contact mt-5">
                            <h4>Contact: </h4>
                            <h3>{{ $book->contact_details }}</h3>
                        </div>
                        @endif
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <aside class="course_details_left pull-right">
                        <div class="popular_courses">
                            <h3><strong>Categories</strong></h3>
                            <ul class="popular_courses_content list-unstyled">
                                @foreach ($category_menu as $catRandom)
                                    <li><a href="{{ route('category',['id'=>$catRandom->id]) }}">{{$catRandom->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="related_books popular_courses">
                            <h3>Related <strong>Books</strong></h3>
                            <div class="related_book_items">
                                @foreach ($related_book as $relatedBook)
                                    <div class="related_single_book">
                                        <img src="{{ asset('storage/'.$relatedBook->thumbnail) }}" alt="">
                                        <div class="related_book_overlay">
                                            <h5>{{  $relatedBook->name }}</h5>
                                            <a href="{{ route('book',['id'=> $relatedBook->id]) }}" class="btn btn-primary">Details</a>
                                        </div>
                                    </div>  
                                @endforeach
                                


                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </aside>
                </div>
            </div>

        </div>
    </div>
</section>
<!--//process-->
@endsection