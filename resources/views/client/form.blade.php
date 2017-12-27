@extends('layout.app')
@section('title', ($edit ? 'Editando Cliente' . $client_id : 'Nuevo Cliente'))
@section('content')
            <div class="row">
                <div class="col-lg-12">
@if ($edit)
									<h1 class="page-header">Editando Cliente {{$client_id}}</h1>
@else
    							<h1 class="page-header">Nuevo Cliente</h1>
@endif
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Formulario
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="{{($edit ? route('submit_edit_client',['client_id'=>$client_id]) : route('submit_create_client'))}}">
																			{{ csrf_field() }}
																				<input name="id" value="{{$edit ? $client_id : ''}}" type="hidden"/>
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input class="form-control" name="name" value="{{($edit ? old('name',$client_name) : old('name')) }}">
                                            <p class="help-block">{{$errors->first('name')}}</p>
                                        </div>
																				<button type="submit" class="btn btn-default" onclick="location.href='{{ $edit ? route('show_client',['client_id' => $client_id]) : route('list_clients') }}'">Descartar</button>
																				<button type="submit" class="btn btn-primary">Guardar</button>
                                    </form>
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