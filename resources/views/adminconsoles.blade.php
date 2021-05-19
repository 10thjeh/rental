@extends('admintemplate')

@section('title','Console List')

@section('content')
<div class="container">
  <table id="example" class="table table-striped display" style="width:100%">
    <thead>
      <tr>
        <th>Console ID</th>
        <th>Nama</th>
        <th>Qty</th>
        <th>Qty Ready</th>
        <th>Manufacturer</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($consoles as $console)
      <tr>
        <td>{{$console->ConsoleID}}</td>
        <td>{{$console->NamaConsole}}</td>
        <td>{{$console->qty}}</td>
        <td>{{$console->qtyReady}}</td>
        <td>{{$console->manufacturer}}</td>
        <td><a href="{{url('admin/consoledetails/'.$console->ConsoleID)}}">Action<a/></td>
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
