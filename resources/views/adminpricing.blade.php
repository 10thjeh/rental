@extends('admintemplate')

@section('title','Game details')

@section('content')
@foreach($pricing as $price)
<div class="container">
  <form class="" action="{{url('/admin/submitpricingchanges')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="gamePrice" class="form-label">Price for game/day</label>
      <input type="number" min="0" class="form-control" name="gamePrice" id="gamePrice" value="{{$price->gamePrice}}">
    </div>
    <div class="mb-3">
      <label for="consolePrice" class="form-label">Price for console/day</label>
      <input type="number" min="0" class="form-control" name="consolePrice" id="consolePrice" value="{{$price->consolePrice}}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
@endforeach
@endsection

@section('script')
@endsection
