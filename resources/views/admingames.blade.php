@extends('admintemplate')

@section('title','Game List')

@section('content')
<div class="container">
  <table id="example" class="table table-striped display" style="width:100%">
    <thead>
      <tr>
        <th>Game ID</th>
        <th>Nama</th>
        <th>Platform</th>
        <th>Qty</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($games as $game)
      <tr>
        <td>{{$game->GameID}}</td>
        <td>{{$game->NamaGame}}</td>
        <td>{{$game->platform}}</td>
        <td>{{$game->qty}}</td>
        <td><a href={{url('admin/gamedetails/'.$game->GameID)}}>Action</a></td>
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
