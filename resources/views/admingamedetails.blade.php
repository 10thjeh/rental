@extends('admintemplate')

@section('title','Game details')

@section('content')
@foreach($game as $g)
<div class="container" style="padding-top:16px">
  <div class="row">
    <div class="col">
      <form method="post" action="{{url('/admin/submitgamechanges')}}" enctype="multipart/form-data">
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
          <label for="gamePrice" class="form-label">Harga</label>
          <input type="number" min="0" class="form-control" name="harga" id="gamePrice" value="{{$g->harga}}">
        </div>
        <div class="mb-3">
          <div class="form-floating">
            <textarea class="form-control" placeholder="" name="description" id="Description" style="height: 100px" value="">{{$g->deskripsi}}</textarea>
            <label for="Description">Description</label>
          </div>
        </div>
        <div class="mb-3">
          <h3>Genre</h3>
          @foreach($genreList as $genre)
          <input type="checkbox" id="{{$genre->genreName}}" name="{{$genre->genreName}}" value="{{$genre->genreId}}" <?php if(in_array($genre->genreId, $gameGenre)) echo "checked" ?>>
          <label for="{{$genre->genreName}}"> {{$genre->genreName}}</label><br>
          @endforeach
        </div>
        <div class="mb-3">
          <label for="gambar" class="form-label">Poster</label><br>
          <input type="file" accept="image/*" name="gambar" id="gambar">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a role="button" href="{{url('admin/deletegame/'.$g->GameID)}}" class="btn btn-danger">Delete</a>
      </form>
    </div>
    <div class="col">
      <h2>Current Poster</h2>
      <img src="{{ url('img/game/'.$g->gambar) }}" alt="Poster">
    </div>
  </div>

</div>
@endforeach
@endsection

@section('script')
@endsection
