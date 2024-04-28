@extends('layout')
@section('content')
    <div>
        <a href="#newbook" data-toggle="modal" style="margin-left: 10rem" class="btn btn-success">New book</a>
        <table class="table table-success table-striped books" style="border-radius: 5px;width: 80%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Author</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->desc }}</td>
                        <td>{{ $book->price }}</td>
                        <td>{{ $book->author }}</td>
                        <td>
                            <a href="#editbook" data-toggle="modal" class="edit">✏️</a>
                            <form action="{{route('removeBook',$book->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" style="border:none;background:none">🗑️</button>
                            </form>
                        </td>
                    </tr>
                    <div id="editbook" class="modal fade">
                        <div class="modal-dialog custom-modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('editBook') }}" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit book</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="hidden" name="id" value="{{ $book->id }}">
                                            <input type="text" class="form-control" name="name" placeholder="Name"
                                                value="{{ $book->name }}" required="required">
                                            <input type="text" name="desc" placeholder="Description"
                                                value="{{ $book->desc }}" required>
                                             <input typ e="number" name="price" placeholder="price"
                                                value="{{ $book->price }}" required>
                                            <input type="text" name="author" placeholder="Author"
                                                value="{{ $book->author }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                        <input type="submit" class="btn btn-success"
                                            onclick="showNotification('book updated successfly')" value="Add">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- new book --}}
    <div id="newbook" class="modal fade">
        <div class="modal-dialog custom-modal-dialog">
            <div class="modal-content">
                <form action="{{ route('NewBook') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="modal-header">
                        <h4 class="modal-title">new book</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Name"
                               required="required">
                               <label>Description:</label>
                            <input type="text" name="desc" placeholder="Description"
                                required>
                                <label>price:</label>
                            <input type="number" name="price" placeholder="price"  required>
                            <label>author:</label>
                            <input type="text" name="author" placeholder="Author"  required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success"
                            onclick="showNotification('book updated successfly')" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
