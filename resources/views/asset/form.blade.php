@extends('layouts.app') 

<?php 
$isEdit = $asset->id ? TRUE : FALSE;
$route  = $isEdit ? ['route' => [ 'submit_edit_asset', $asset->id ] ] : ['route' => 'submit_create_asset' ];
?>

@section('title', ($isEdit ? 'Editando Activo' . $asset->id : 'Nuevo Activo'))

@section('content')
<div class="row">
  <div class="col-lg-12">
    @if ($isEdit)
      <h1 class="page-header">Editando Activo {{$asset->id}}</h1>
    @else
      <h1 class="page-header">Nuevo Activo</h1>
    @endif
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">Formulario</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-lg-6">
            {!! Form::model($asset, $route) !!}
            
              {!! Form::hidden('id'); !!}
              
              <div class="form-group">
                {!! Form::label('name', 'Nombre'); !!}
                {!! Form::text('name', NULL, ['class' => 'form-control']); !!}
                {!! Form::label('type', 'Tipo'); !!}
                {!! Form::select('type', ['T' => 'Camión', 'O' => 'Otro'], NULL, ['class' => 'form-control']); !!}
                {!! Form::label('plate', 'Placa'); !!}
                {!! Form::text('plate', NULL, ['class' => 'form-control']); !!}
                {!! Form::label('serial', 'Serial'); !!}
                {!! Form::text('serial', NULL, ['class' => 'form-control']); !!}
                {!! Form::label('year', 'Año'); !!}
                {{ Form::selectYear('year', 1980, 2018, NULL, ['class' => 'form-control']) }}
              </div>
              
              {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
              
            {!! Form::close() !!}
          </div>
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
