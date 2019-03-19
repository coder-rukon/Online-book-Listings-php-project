@extends('layouts.front')
@section('content')
    
    <!--/process-->
    <section class="banner-bottom-wthree py-lg-5 py-md-5 py-3">
            <div class="container">
                <div class="inner-sec-w3ls all-books py-lg-5  py-3">
                <!---728x90--->
                    <h3 class="tittle text-center mb-lg-4 mb-3">
                        <span>{{ $title }}</span>{{ $subtitle }}
                    </h3>
                        <!---728x90--->
                    <div class="row choose-main mt-5 text-center">
                        @if ($books)
                            @foreach ($books as $book)
                                @include('modules.loopBook')
                            @endforeach
                        @endif
                        
                        
                    </div>
                    @if($books->count() <=0)
                        <div class="alert alert-danger" role="alert">
                          <h4 class="alert-heading text-center">{{ ( isset($errorMessage) ? $errorMessage: "No book found!" ) }}</h4>
                        </div>
                    @endif
                    {{ $books->links() }}
                </div>
            </div>
        </section>
        <!--//preocess-->
@endsection