@extends('adminlte::page')
@section('content')
<style>
   .table-responsive{
   font-size: 14px;
 }
</style>

        
            
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3>{{$orden_elegida->id}} - </h3>
                            <button class="btn btn-warning" id="botones"data-toggle="modal" data-target="#exampleModal01">Asignar un ingeniero</button>
                            <button class="btn btn-primary" id="botones">Formulario de Admision</button>
                            <button class="btn btn-primary" id="botones">Ir a Lista de archivos</button>
                            <button class="btn btn-warning" id="botones">Desbloquear Acceso de cliente</button>
                            <button class="btn btn-warning" id="botones">Actualizar Lista de archivos</button>
                            <button class="btn btn-warning" id="botones">Cambiar Cliente</button>
                            <button class="btn btn-primary" id="botones">Generar Factura</button>
                        </div>

                             <!-- Modal asignar ingeniero-->
                                <div class="modal fade" id="exampleModal01" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2" align="center">Asignar Trabajo a Ingeniero:</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="input-group md-2">
                                                    <span class="input-group-text">Ingeniero</span>
                                                    <select name="" class="form-control" class="btn-block">
                                                        <option value=""></option>
                                                        <option value="Seagate">Ingeniero1</option>
                                                        <option value="Toshiba">Ingeniero2</option>
                                                        <option value="Samsung">Ingeniero3</option>
                                                    </select>                           
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" id="botones" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-success" id="botones">Guardar</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                             {{-- Fin Diagnostico --}}
                    </div>
                    <div class="card">
                            <div class="card-header" id="card">
                                <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#general" data-toggle="tab">General</a></li>
                                <li class="nav-item"><a class="nav-link" href="#dispositivosTrabajo" data-toggle="tab">Dispositivos de Trabajo</a></li>
                                <li class="nav-item"><a class="nav-link" href="#servicios" data-toggle="tab">Servicios</a></li>
                                <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab">Clonacion</a></li>
                                <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab">Archivos adjuntos</a></li>
                                <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab">Facturacion</a></li>
                                <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab">Historial</a></li>
                                <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab">Iniciar Sesion</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                <!--General-->
                                    @include('trabajo.informacion.general')
                                <!--/General-->

                                <!--Dispositivos de trabajo-->
                                <div class="tab-pane" id="dispositivosTrabajo">
                                    @include('trabajo/informacion/dispositivos-de-trabajo')
                                </div>
                                <!--/Dispositivos de trabajo-->

                                <!--Servicios-->
                                <div class="tab-pane" id="servicios">
                                    <p>munfo</p>
                                </div>
                                <!-- /Servicios -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                
                
            

@endsection