@extends('adminlte::page')
@section('content')

<style>
    .table-responsive{
    font-size: 14px;
  }  
  #botones, #btnAsignar{
         font-size: 14px;
         border-radius: 4px;
         padding: 5px;
         box-shadow: 2px 2px 2px rgb(95, 93, 93);
     }
 </style>
 <br>
<h3 align="center" style="font-weight: 700">CONFIGURACIONES </h3>
         
             <div class="container">
                 <!-- /.col -->
                 <div class="col-md-12">
                     <div class="card">
                             <div class="card-header" id="card">
                                 <ul class="nav nav-pills">
                                 <li class="nav-item"><a class="nav-link active" href="#inventario" data-toggle="tab">Inventario</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#dispositivosTrabajo" data-toggle="tab">Dispositivos de Trabajo</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#venta" data-toggle="tab">Venta</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#imagenes" data-toggle="tab">Imagenes</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#adjuntarArchivo" data-toggle="tab">Archivos adjuntos</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#historial" data-toggle="tab">Historial</a></li>
                                 <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab">Iniciar Sesion</a></li>
                                 </ul>
                             </div><!-- /.card-header -->
                             <div class="card-body">
                                 <div class="tab-content">
                                 <!--General-->
                                    @include('configuracion/inventario')
                                 <!--/General-->
 
                                 <!--Dispositivos de trabajo-->
                                 <div class="tab-pane" id="dispositivosTrabajo">
                                    {{-- @include('trabajo/informacion/dispositivos-de-trabajo')--}}
                                 </div>
                                 <!--/Dispositivos de trabajo-->
                                
                                  <!--venta-->
                                  <div class="tab-pane" id="venta">
                                    
                                 </div>
                                 <!-- /venta -->
 
                                 <!--Facturacion-->
                                 <div class="tab-pane" id="imagenes">
                                 </div>
                                 <!-- /Facturacion -->
                                
 
                                 <!--Adjuntar archivo -->
                                 <div class="tab-pane" id="adjuntarArchivo">
                                 </div>
                                 <!--/Adjuntar archivo -->
 
                                 <!--Historial-->
                                 <div class="tab-pane" id="historial" >
                                 </div>
                                 <!-- /Historial -->
                                 </div>
                                 <!-- /.tab-content -->
                             </div><!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                 </div>
                 <!-- /.col -->
             </div>
                 
 
     <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

@endsection