@extends('admintemplate')

@section('title','Console : Return Approval')

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
  <table id="example" class="table table-striped display" style="width:100%">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Orderer Email</th>
        <th>Console ordered</th>
        <th>Price</th>
        <th>Start date</th>
        <th>Day(s)</th>
        <th>End date</th>
        <th>Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $order)
        <tr>
          <td>{{$order->orderId}}</td>
          <td>{{$order->email}}</td>
          <td>{{$order->NamaConsole}}</td>
          <td>{{$order->harga}}</td>
          <td>{{$order->startDate}}</td>
          <td>{{$order->hari}}</td>
          <td>{{$order->endDate}}</td>
          <td>{{$order->status}}</td>
          <td><a href="{{url('/admin/orders/console/return/approve/'.$order->orderId)}}">Confirm</a></td>
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
