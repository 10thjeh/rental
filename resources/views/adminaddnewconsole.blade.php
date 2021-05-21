@extends('admintemplate')

@section('title','New console')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <form class="" action="{{url('/admin/submitnewconsole')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="NamaConsole" class="form-label">Nama Console</label>
          <input type="text" class="form-control" name="NamaConsole" id="NamaConsole">
        </div>
        <div class="mb-3">
          <label for="qty" class="form-label">Qty</label>
          <input type="number" step="1" min="0" class="form-control" name="qty" id="qty">
        </div>
        <div class="mb-3">
          <label for="manufacturer" class="form-label">Manufacturer</label>
          <select class="form-select" aria-label="Default select example" id="manufacturer" name="manufacturer">
            <option value="Sony">Sony</option>
            <option value="Microsoft">Microsoft</option>
            <option value="Nintendo">Nintendo</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="gamePrice" class="form-label">Harga</label>
          <input type="number" min="0" class="form-control" name="harga" id="gamePrice">
        </div>
        <div class="mb-3">
          <div class="form-floating">
            <textarea class="form-control" placeholder="" name="description" id="Description" style="height: 100px" value=""></textarea>
            <label for="Description">Description</label>
          </div>
        </div>
        <div class="mb-3">
          <label for="gambar" class="form-label">Poster</label><br>
          <input type="file" accept="image/*" name="gambar" id="gambar">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
    </div>
    <div class="col">

    </div>
  </div>
</div>
@endsection

@section('script')
@endsection
