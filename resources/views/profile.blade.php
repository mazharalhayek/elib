@extends('loggedinlayout')
@section('title', 'Profile')
@section('content')
<br>
<div class="card text-bg-light mb-3 ms-3" style="max-width: 50rem; min-height: 20rem">
    <h4 class="card-header">Your Profile</h4>
    <div class="card-body">
      <h5 class="card-title"> {{$user->name}}</h5>
      <p class="card-text">Created At: {{$user->created_at}}</p>
      <p class="card-text"> Updated At: {{$user->updated_at}} </p>
    </div>
  </div>
@endsection