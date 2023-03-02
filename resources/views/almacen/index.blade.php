@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">LISTA DE ALMACENES </h1>

<div class="container">
  <br>
    <div class="row d-flex justify-content-center">
    <div class="tabla-general" >
        <table class="table table-striped table-hover table-responsive" id="Table">
        <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
            <tr>
            <th class="column1 text-center">Id</th>
            <th class="column2 text-center">Nombre de Almacen</th>
            <th class="column3 text-center">Direccion</th>
            <th class="column4 text-center">Sucursal</th>
            <th class="column5 text-center">Fecha</th>
            <th class="column6 text-center">Acciones &nbsp;&nbsp;&nbsp;</th>
            </tr>
        </thead>
        <tbody class="table-bordered" id="myTable"> 
            @foreach ($almacen as $almacen)
            <tr>
                <td class="text-center" >{{$almacen->id}}</td>
                <td class="text-center" >{{$almacen->nombre_almacen}}</td>
                <td class="text-center" >{{$almacen->direccion_almacen}}</td>
                <td class="text-center" >{{$almacen->id_sucursal}}</td>
                <td class="text-center" >{{ \Carbon\Carbon::parse($almacen->created_at)->format('d-m-Y')}}</td>
                <td class="text-center" >

                <div style="text-align: right;width:px">
                
                @can('editar producto')
                     {{-- EDITAR --}}
                <a href="{{ url('/almacen/editar/'.$almacen->id)}}">
                  <button class="btn btn-light-active btn-sm d-inline"  >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="rgb(168, 166, 14)" viewBox="0 0 16 16" width="18" height="20">
                      <path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 
                      0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z">
                      </path>
                    </svg>
                  </button>
                </a> 
                @endcan
                 
                @can('eliminar producto')
                  {{-- ELIMINAR --}}
                  <button class="btn d-inline" style="color: red"  data-toggle="modal" data-target="#eliminar{{$almacen->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                  </button>
      
                  </div>  
                @endcan
                
      
                  {{-- ELIMINAR --}}
                  <div class="modal fade" id="eliminar{{$almacen->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Eliminar Almacen</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                         ¿Realmente Desea Borrar el Almacen?
                        </div>
                        <form action="{{url('/almacen/'.$almacen->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>
                          <button class="btn btn-success" >Aceptar</button>
                          
                        </div>
                      </form> 
                      </div>
                    </div>
                  </div>
                
              </td>
            </tr>

            @endforeach

        </tbody> 
        </table>
        </div>
</div>
</div>


    
    <link rel="stylesheet" href="{{ URL::asset('estilos/style.css') }} ">
@endsection