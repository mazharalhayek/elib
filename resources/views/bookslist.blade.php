@extends('loggedinlayout')
@section('content')

<h4 class = "mt-3 ms-3"> Available Books </h4>
<hr>
<div class="container">
    <div class="row">
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
                <button class="buy-button" data-toggle="modal" data-target="#purchaseModal{{$book->id}}">
                    Buy &#x1F6D2;
                </button>
            </div>
        </div>
        <!-- Purchase Modal -->
        <div class="modal fade" id="purchaseModal{{$book->id}}" tabindex="-1" role="dialog"
            aria-labelledby="purchaseModalLabel{{$book->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="purchaseModalLabel{{$book->id}}">Confirm Purchase</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to purchase {{$book->name}}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form action="{{ route('Purchase', ['bookId' => $book->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Purchase</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script>
    var msg = '{{ Session::get('alert') }}';
    var exist = '{{ Session::has('alert') }}';
    if (exist) {
        alert(msg);
    }
</script>
@endsection
