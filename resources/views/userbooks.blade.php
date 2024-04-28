@extends('loggedinlayout')
@section('title', 'My Books')
@section('content')
<h4 class = "mt-3 ms-3"> Purchased Books </h4>
<hr>
<div class="container">
    <div class="row">
        @if ($books->isEmpty())
        <div>
            <h1 class="empty_records" align="center">You haven't purchased any books!</h1>
        </div>
        @else
      
        @foreach ($books as $book)
        <div class="col-md-4">
            <div class="card book-card">
                <img src="path/to/book1.jpg" class="card-img-top" alt="Book Cover">
                <div class="card-body">
                    <h5 class="card-title">{{$book->name}}</h5>
                    <p class="card-text">{{$book->desc}}</p>
                    <p class="card-text">{{$book->price}}</p>
                </div>
                <div class="card-footer">
                    <span class="author">{{$book->author}}</span>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection
