@extends('admintemplate')

@section('title','Game : Ship Approval')

@section('content')
<div class="container">
  <table id="example" class="table table-striped display" style="width:100%">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Orderer Email</th>
        <th>Game ordered</th>
        <th>Price</th>
        <th>Start date</th>
        <th>Day(s)</th>
        <th>End date</th>
        <th>Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($ships as $ship)
        <tr>
          <td>{{$ship->gameOrderId}}</td>
          <td>{{$ship->email}}</td>
          <td>{{$ship->NamaGame}}</td>
          <td>{{$ship->harga}}</td>
          <td>{{$ship->startDate}}</td>
          <td>{{$ship->hari}}</td>
          <td>{{$ship->endDate}}</td>
          <td>{{$ship->status}}</td>
          <td><a href="{{url('/admin/orders/game/ship/approve/'.$ship->gameOrderId)}}">Confirm</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function() {
      $('#example').DataTable();
    } );
</script>
@endsection
