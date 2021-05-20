@extends('admintemplate')

@section('title','Console details')

@section('content')
@foreach($console as $c)
<div class="container">
  <div class="row">
    <div class="col">
      <form action="{{url('/admin/submitconsolechanges')}}" method="post">
        @csrf
        <div class="mb-3">
          <label for="ConsoleID" class="form-label">ID Console</label>
          <input type="text" class="form-control" name="ConsoleID" id="ConsoleID" value="{{$c->ConsoleID}}" readonly>
        </div>
        <div class="mb-3">
          <label for="NamaConsole" class="form-label">Nama Console</label>
          <input type="text" class="form-control" name="NamaConsole" id="NamaConsole" value="{{$c->NamaConsole}}">
        </div>
        <div class="mb-3">
          <label for="qty" class="form-label">Qty</label>
          <input type="number" step="1" min="0" class="form-control" name="qty" id="qty" value="{{$c->qty}}"> <p>Ready : {{$c->qtyReady}}</p>
        </div>
        <div class="mb-3">
          <label for="manufacturer" class="form-label">Manufacturer</label>
          <select class="form-select" aria-label="Default select example" id="manufacturer" name="manufacturer">
            <option value="Sony" <?php if($c->manufacturer == "Sony") echo "selected"; ?>>Sony</option>
            <option value="Microsoft" <?php if($c->manufacturer == "Microsoft") echo "selected"; ?>>Microsoft</option>
            <option value="Nintendo" <?php if($c->manufacturer == "Nintendo") echo "selected"; ?>>Nintendo</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a role="button" href="{{url('admin/deleteconsole/'.$c->ConsoleID)}}" class="btn btn-danger">Delete</a>
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
