@extends('admintemplate')

@section('title','Game details')

@section('content')
@foreach($game as $g)
<div class="container" style="padding-top:16px">
  <div class="row">
    <div class="col">
      <form method="post" action="{{url('/admin/submitgamechanges')}}">
        @csrf
        <div class="mb-3">
          <label for="IdGame" class="form-label">ID Game</label>
          <input type="text" class="form-control" name="IdGame" id="IdGame" value="{{$g->GameID}}" readonly>
        </div>
        <div class="mb-3">
          <label for="namaGame" class="form-label">Nama Game</label>
          <input type="text" class="form-control" name="namaGame" id="namaGame" value="{{$g->NamaGame}}">
        </div>
        <div class="mb-3">
          <label for="platform" class="form-label">Platform</label>
          <input type="text" class="form-control" name="platform" id="platform" value="{{$g->platform}}" readonly>
        </div>
        <div class="mb-3">
          <label for="platform" class="form-label">Quantity</label>
          <input type="number" class="form-control" name="qty" id="qty" step="1" min="0" value="{{$g->qty}}">
        </div>
        <div class="mb-3">
          <h3>Genre</h3>
          @foreach($genreList as $genre)
          <input type="checkbox" id="{{$genre->genreName}}" name="{{$genre->genreName}}" value="{{$genre->genreId}}" <?php //if(in_array($genre->genreName, $gameGenre)) echo "checked" ?>>
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
@endforeach
@endsection

@section('script')
@endsection
