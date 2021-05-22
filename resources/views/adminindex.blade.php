@extends('admintemplate')

@section('title','Crusty-crud rental admin page')

@section('content')
<div class="container">
  <h1>Hello admin!</h1>
  <hr>
  <div class="row">
    <div class="col">
      <h3>Want to add something?</h3>
      <h4>New game just released?</h4>
      <h5><a href="{{url('admin/addnewgame')}}">Add new game...</a></h5>
      <hr>
      <h4>New console just arrived?</h4>
      <h5><a href="{{url('admin/addnewconsole')}}">Add new console...</a></h5>
      <hr>
      <h4>New weird game created new genre?</h4>
      <h5><a href="{{url('admin/addnewgenre')}}">Add new genre</a></h5>
      <hr>
    </div>
    <div class="col">
      <h3>Want to change something?</h3>
      <h4>sign this petition:</h4>
      <h5><a href="#">epic petition</a></h5>
    </div>
  </div>
</div>
@endsection
