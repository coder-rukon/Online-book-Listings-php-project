 
    <!-- banner-inner -->
    <div class="page-content">
        <div class="dotts">
            <div class="header-top">
                <header>
                    <div class="top-head ml-lg-auto text-center">
                        <div class="row">
                            @if($user = Auth::user())
                            <div class="col-md-4">
                                <span>{{$user->name}}</span>
                            </div>
                            <div class="col-md-3 sign-btn">
                                @if($user->role == 'admin')
                                    <a href="{{ route('admin.dashboard') }}">
                                        <i class="fas fa-lock"></i>Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('userDashboard') }}">
                                        <i class="fas fa-lock"></i>Dashboard
                                    </a>
                                @endif
                                
                            </div>
                            <div class="col-md-3 sign-btn">
                                <a href="{{url('/logout')}}">
                                    <i class="far fa-user"></i> Logout
                                </a>
                            </div>
                            @else
                            <div class="col-md-4">
                                <span>Welcome</span>
                            </div>
                            <div class="col-md-3 sign-btn">
                                <a href="#" data-toggle="modal" data-target="#LoginModel">
                                    <i class="fas fa-lock"></i> Sign In</a>
                            </div>
                            <div class="col-md-3 sign-btn">
                                <a href="#" data-toggle="modal" data-target="#exampleModalCenter2">
                                    <i class="far fa-user"></i> Register</a>
                            </div>
                            @endif
                            <div class="search col-md-2">
                                <div class="mobile-nav-button">
                                    <button id="trigger-overlay" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                <!-- open/close -->
                                <div class="overlay overlay-door">
                                    <button type="button" class="overlay-close">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </button>
                                    {{ Form::open( ['route' => 'search' ,'class' => 'd-flex' , 'method' => 'get']) }}
                                        <input style="height: 48px" class="form-control" type="search" placeholder="Search here..." name="name" required="">
                                        <button type="submit" class="btn btn-primary submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    {{ Form::close() }}
                                </div>
                                <!-- open/close -->
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="logo">
                            <h1>
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    <i class="fas fa-book"></i> Online Library</a>
                            </h1>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i class="fas fa-bars"></i>
                            </span>

                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-lg-auto text-center">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">Home
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/books') }}">
                                        Books
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ route('categories') }}" id="navbarDropdown" role="button"  aria-haspopup="true" >
                                        Categories
                                        <i class="fas fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach (RsCategory() as $cats)
                                            <a class="dropdown-item" href="{{ route('category',['id'=>$cats->id]) }}">{{ $cats->name }}</a>                                            
                                        @endforeach
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about') }}">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                                </li>
                            </ul>

                        </div>
                    </nav>
                </header>
            </div>
            <div class="banner-info text-center">
                @yield('banner')
            </div>
        </div>
    </div>