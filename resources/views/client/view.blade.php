@extends('layout.app')
@section('title', Cliente {{$client->id}})
@section('content')
            <div class="row">
                <div class="col-lg-12">
									<h1 class="page-header">Cliente {{$client->name}}</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Información del Cliente
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input class="form-control" disabled=true value="{{ $client->name }}">
                                </div>
								<button class="btn btn-default" onclick="location.href='{{ route('edit_client',['client_id' => $client->id]) }}'">Editar</button>
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
@endsection