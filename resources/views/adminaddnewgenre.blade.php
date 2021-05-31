@extends('admintemplate')

@section('title','Add new genre')

@section('content')
<div class="container">
  @if(count($errors) > 0 )
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <ul class="p-0 m-0" style="list-style: none;">
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <form class="" action="{{url('/admin/submitnewgenre')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="genre" class="form-label">Genre</label>
      <input type="text" class="form-control" name="genre" id="genre">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>
  <h2>Delete genre</h2>
  <form class="" action="{{url('/admin/deletegenre')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="genre" class="form-label">Genre</label>
      <select class="form-select" name="genre" id="genre" aria-label="genre">
        @foreach($genres as $genre)
        <option value="{{$genre->genreId}}">{{$genre->genreName}}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-danger">Delete</button>
  </form>
</div>
@endsection

@section('script')
@endsection
