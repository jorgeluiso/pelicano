@extends('layouts.app') @section('title', 'Cliente') @section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Cliente {{$client_name}}</h1>
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Información del Cliente</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label>Nombre</label> <input class="form-control" disabled=true value="{{ $client_name }}">
            </div>
            <button class="btn btn-default"
              onclick="location.href='{{ route('edit_client',['client_id' => $client_id]) }}'">Editar</button>
            <!-- /.col-lg-6 (nested) -->
          </div>
          <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
</div>
@endsection
