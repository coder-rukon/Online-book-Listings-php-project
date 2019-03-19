<div class="col-md-3">
    <div class="card">
        <img class="card-img-top" src="{{ asset('storage/'.$book->thumbnail) }}" alt="{{ $book->name }}">
        <div class="card-body">
            <h5 class="card-title">{{ $book->name }}</h5>
            <p class="card-text">
                Author: {{ $book->author }}<br/>
                Edition: {{ $book->edition }}
            </p>
            <a href="{{ route('book',['id'=>$book->id])}}" class="btn btn-primary mt-2">More Details</a>
        </div>
    </div>
</div>