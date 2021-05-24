@extends('admintemplate')

@section('title','Console : Return Approval')

@section('content')
<div class="container">
  <table id="example" class="table table-striped display" style="width:100%">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Orderer Email</th>
        <th>Game ordered</th>
        <th>Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

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
