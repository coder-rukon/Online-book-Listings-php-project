@extends('layouts.front')
@section('banner')
    <!--/banner-info-->
        <h3>
            <span>Find Book</span> .
            <span>Right Now.</span>
        </h3>
        <p>Your Book search starts and ends with us.</p>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="name-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Name</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="author-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Author</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="location_search" data-toggle="tab" href="#serach_by_location" role="tab" aria-controls="serach_by_location" aria-selected="false">Location</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="name-tab">
                {{ Form::open( ['route' => 'search' ,'class' => 'ban-form row' , 'method' => 'get']) }}
                    <div class="col-md-9 banf">
                        <input class="form-control" type="text" name="name" placeholder="Search Books by Name" required="">
                    </div>
                    <div class="col-md-3 banf">
                        <button class="btn1" type="submit">FIND BOOK
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                {{ Form::close()}}
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="author-tab">
                {{ Form::open( ['route' => 'search' ,'class' => 'ban-form row' , 'method' => 'get']) }}
                    <div class="col-md-9 banf">
                        <input class="form-control" type="text" name="author" placeholder="Search Books by Author" required="">
                    </div>
                    <div class="col-md-3 banf">
                        <button class="btn1" type="submit">FIND BOOK
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                {{ Form::close()}}
            </div>
            <div class="tab-pane fade" id="serach_by_location" role="tabpanel" aria-labelledby="author-tab">
                {{ Form::open( ['route' => 'search' ,'class' => 'ban-form row' , 'method' => 'get']) }}
                    <div class="col-md-9 banf">
                        <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <select name="location" class="form-control">
                                    @foreach (RsGetLocation() as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-8 col-md-8">
                                <input class="form-control" type="text" name="s" placeholder="Book Name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 banf">
                        <button class="btn1" type="submit">FIND BOOK
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                {{ Form::close()}}
            </div>
        </div>
    <!--//banner-info-->
        
@endsection
@section('content')
    <!-- banner-bottom -->
    <section class="banner-bottom py-lg-5 py-md-5 py-3">
            <div class="container">
                <div class="inner-sec-w3ls py-lg-5  py-3">
                    <h3 class="tittle text-center mb-lg-4 mb-3">
                        <span>Our Mission</span>Book Categories
                    </h3>
                    <div class="row mt-3 justify-content-center">
                        @if($homeCategory)
                            @foreach ($homeCategory as $catKey => $Category)
                                <div class="col-md-4 category_grid">
                                    <div class="view view{{$catKey}} view-tenth">
                                        <div class="category_text_box">
                                            <i class="fas  {{ $Category->thumbnail }}"></i>
                                            <h3>{{ $Category->name }}</h3>
                                            <!-- <p>(4 open flow-positions)</p> -->
                                        </div>
                                        <div class="mask">
                                            <img src="images/categories/programming.jpg" class="img-fluid" alt="">
                                            <h3><a href="{{ route('category',['id'=>$Category->id]) }}">View Books </a></h3>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //banner-bottom -->
        <!--/process-->
        <section class="banner-bottom pb-lg-5 pb-md-4 pb-3">
            <div class="container">
                <div class="inner-sec-w3ls py-lg-5  py-3">
                    <div id="RecentBooks">

                    </div>
                <!---728x90--->
                    <h3 class="tittle text-center mb-lg-4 mb-3">
                        <span>Online Library</span>Latest Books
                    </h3>
                    
                    <div class="menu-grids mt-5">
                        <div class="row t-in">
                            <div class="row text-info-sec">
                                @foreach ($recentBooks as $book)
                                @php
                                    $bookCategory = RsGetBookCats($book->id);
                                @endphp
                                   <!--/Book1-->
                                   <div class="col-sm-6 col-lg-6">
                                        <div class="emply-resume-list row mb-3">
                                                <div class="col-md-9 emply-info">
                                                    <div class="emply-img">
                                                        <img src="{{ asset('storage/'.$book->thumbnail) }}" alt="{{ $book->author }}" class=""/>
                                                    </div>
                                                    <div class="emply-resume-info">
                                                        <h4><a href="#">{{ $book->name }}</a></h4>
                                                        <p><i class="fas fa-user"></i> Author Name: <span>{{ $book->author }}</span></p>
                                                        <ul class="links_bottom_emp mt-3">
                                                            <li style="color:#ccc;">
                                                                <i class="fas fa-cubes"></i> Category: <span class="icon_text"> 
                                                                @foreach ($bookCategory as $catKey => $cat)
                                                                    <a href="{{ route('category',['id'=> $cat->id]) }}">{{ ($catKey>= 1 ? ", ":"" ) }}{{$cat->name}}</a>
                                                                @endforeach    
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fas fa-edit"></i> Edition: <span class="icon_text">{{ $book->edition }}</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="col-md-3 emp_btn text-right">
                                                    <a href="{{ route('book',['id'=> $book->id] ) }}">Details </a>
                                                </div>
                                        </div>
                                   </div>
                                    
                                    <!--//Book1--> 
                                @endforeach
                                
                                
                                

                            </div>
                            <div class="view_all pt-3">
                                    <a href="{{ route('books') }}">View All Books</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--//preocess-->
    
        <!--/stats-->
        <section class="banner-bottom bg-dark dotts py-lg-5 py-3">
                <div class="container">
                    <div class="inner-sec-w3ls py-lg-5  py-3">
                        <h3 class="tittle cen text-center mb-lg-5 mb-3">
                            <span>Stats</span> Our Stats</h3>
                        <div class="stats row mt-5">
                            <div class="col-md-3 stats_left counter_grid text-center">
        
                                <p class="counter">{{ $counter['book'] }}</p>
                                <h4>Book Posted</h4>
                            </div>
                            <div class="col-md-3 stats_left counter_grid1 text-center">
        
                                <p class="counter">{{ $counter['category'] }}</p>
                                <h4>Category</h4>
                            </div>
                            <div class="col-md-3 stats_left counter_grid2 text-center">
        
                                <p class="counter">{{ $counter['user'] }}</p>
                                <h4>Memebers</h4>
                            </div>
                            <div class="col-md-3 stats_left counter_grid3 text-center">
        
                                <p class="counter">{{ $counter['location'] }}</p>
                                <h4>Locations</h4>
                            </div>
        
                        </div>
                    </div>
                </div>
            </section>
            <!--//stats-->
        <!--/recent members -->
        <section class="banner-bottom bg-light py-lg-5 py-3 text-center">
            <div class="container">
                <div class="inner-sec-w3ls py-lg-4 py-md-4 py-3">
                    <h3 class="tittle text-center mb-lg-5 mb-3">
                        <span>Recent Member</span>Recently Joined Members</h3>
                    <div class="row mt-5">
                        @if ($recent_users)
                            @foreach ($recent_users as $recent_user)
                                <div class="col-lg-3 member-main text-center">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="member-img">
                                                <div class="rs_profile_img" style="background-image:url('{{ ( !empty($recent_user->picture) ? asset($recent_user->picture) : asset('images/no-profile.png') ) }}')"></div>
                                            </div>
                                            <div class="member-info text-center py-lg-4 py-2">
                                                <h4>{{ $recent_user->name }}</h4>
                                                <div class="mt-3 team-social text-center">
                                                    <ul class="social-icons text-center">
                                                        <li>
                                                            <a href="{{ $recent_user->facebook }}">
                                                                <i class="fab fa-facebook-f"></i>
                                                            </a>
                                                        </li>
                                                        <li class="mx-3">
                                                            <a href="{{ $recent_user->twitter }}">
                                                                <i class="fab fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ $recent_user->google }}">
                                                                <i class="fab fa-google-plus-g"></i>
                                                            </a>
                                                        </li>
            
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        
                    </div>
                </div>
            </div>
        </section>
        <!--/recent members -->
        
        <!--join with us -->
        <section class="banner-bottom mid py-lg-5 py-3">
                <div class="container">
                    <div class="inner-sec-w3ls py-lg-5  py-3">
                        <div class="mid-info text-center pt-3">
                            <h3 class="tittle text-center cen mb-lg-5 mb-3">
                                <span>Join</span>Join with Us, Download Books & Enjoy</h3>
                            <p></p>
                            <div class="resume">
                                <a href="#" data-toggle="modal" data-target="#exampleModalCenter2">
                                    <i class="far fa-user"></i> Create Acccount</a>
                            </div>
                        </div>
        
                    </div>
                </div>
            </section>
            <!--//join with us -->
@endsection