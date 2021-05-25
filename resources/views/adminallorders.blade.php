@extends('admintemplate')

@section('title','All Orders')

@section('content')

<div class="container">
  <table id="example" class="table table-striped display" style="width:100%">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Orderer Email</th>
        <th>Game/Console ordered</th>
        <th>Price</th>
        <th>Start date</th>
        <th>Day(s)</th>
        <th>End date</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($consoles as $console)
        <tr>
          <td>{{$console->orderId}}</td>
          <td>{{$console->email}}</td>
          <td>{{$console->NamaConsole}}</td>
          <td>{{$console->harga}}</td>
          <td>{{$console->startDate}}</td>
          <td>{{$console->hari}}</td>
          <td>{{$console->endDate}}</td>
          <td>{{$console->status}}</td>
        </tr>
      @endforeach
      @foreach($games as $game)
        <tr>
          <td>{{$game->gameOrderId}}</td>
          <td>{{$game->email}}</td>
          <td>{{$game->NamaGame}}</td>
          <td>{{$game->harga}}</td>
          <td>{{$game->startDate}}</td>
          <td>{{$game->hari}}</td>
          <td>{{$game->endDate}}</td>
          <td>{{$game->status}}</td>
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
