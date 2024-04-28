@extends('layout')
@section('content')
<div class="container">
    <div class="row">
<table>
    <tbody>
        @if ($books->count() == 0)
        <div>
            <h1 class="empty_records" align="center">No Books found, Wait till we add some..</h1>
        </div>
        @endif
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
                <a href="{{ route('BuyABook', $book->id) }}"><button
                    class="buy-button"
                    onclick="showNotification('Success')">Buy
                    &#x1F6D2; </button></a>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
<script>
    var msg = '{{ Session::get('alert') }}';
    var exist = '{{ Session::has('alert') }}';
    if (exist) {
        alert(msg);
    }
</script>
@endsection
