@extends('admintemplate')

@section('title','New Game')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <form class="" action="{{url('/admin/submitnewgame')}}" method="post">
        @csrf
            <div class="mb-3">
              <label for="namaGame" class="form-label">Nama Game</label>
              <input type="text" class="form-control" name="namaGame" id="namaGame">
            </div>
            <div class="mb-3">
              <label for="platform" class="form-label">Platform</label>
              <select class="form-select" name="platform" id="platform" aria-label="Default select example">
                @foreach($platformList as $platform)
                <option value="{{$platform->ConsoleID}}">{{$platform->NamaConsole}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="qty" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="qty" id="qty" step="1" min="0">
            </div>
            <div class="mb-3">
              <h3>Genre</h3>
              @foreach($genreList as $genre)
              <input type="checkbox" id="{{$genre->genreName}}" name="{{$genre->genreName}}" value="{{$genre->genreId}}">
              <label for="{{$genre->genreName}}"> {{$genre->genreName}}</label><br>
              @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a role="button" href="#" class="btn btn-danger">Delete</a>
          </form>
        </div>
    <div class="col">

    </div>
  </div>
</div>
@endsection

@section('script')
@endsection
