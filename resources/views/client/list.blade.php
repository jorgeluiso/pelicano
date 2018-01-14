@extends('layouts.app')
@section('title', 'Clientes') @section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Clientes</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- <pre>{{ var_dump($clients) }}</pre> -->
<!-- /.row -->
<div class="row">
  <div class="col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">Clientes</div>
      <!-- /.panel-heading -->
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo Electrónico</th>
              </tr>
            </thead>
            <tbody>
              @foreach( $clients as $client)
                <tr class='clickable-row' data-href='{{ route('show_client',['client_id' => $client->id]) }}'>
                  <td>{{ $client->id }}</td>
                  <td>{{ $client->name }}</td>
                  <td>{{ $client->phone }}</td>
                  <td>{{ $client->email }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@push('scripts')
<script>
  jQuery(document).ready(function($) {
      $(".clickable-row").click(function() {
          window.location = $(this).data("href");
      });
  });
</script>
@endpush 
@endsection
