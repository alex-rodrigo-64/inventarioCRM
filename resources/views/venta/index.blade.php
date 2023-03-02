@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">LISTA DE VENTAS </h1>

<div class="container">
  <br>
    <div class="row d-flex justify-content-center">
    <div class="tabla-general" >
        <table class="table table-striped table-hover table-responsive" id="Table">
        <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
            <tr>
            <th class="column1 text-center"># Venta</th>
            <th class="column2 text-center">Sucursal</th>
            <th class="column3 text-center">Almacen</th>
            <th class="column3 text-center">Cliente</th>
            <th class="column5 text-center">Fecha</th>
            <th class="column6 text-center">Acciones &nbsp;&nbsp;&nbsp;</th>
            </tr>
        </thead>
        <tbody class="table-bordered" id="myTable"> 
            @foreach ($venta as $ventas)
            <tr>
                <td class="text-center" >{{$ventas->id}}</td>
                <td class="text-center" >{{$ventas->nombre_sucursal}}</td>
                <td class="text-center" >{{$ventas->nombre_almacen}}</td>
                <td class="text-center" >{{$ventas->id_cliente}}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($ventas->created_at)->format('d-m-Y')}}</td>
                <td class="text-center" >

                <div style="text-align: right;width:px">
                
                @can('mostrar venta')
                     {{-- MOSTRAR --}}
                <a href="{{ url('/ventas/mostrar/'.$ventas->id)}}">
                  <button class="btn btn-light-active btn-sm d-inline">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512" width="18" height="20"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                      <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                    </svg>
                  </button>
                </a> 
                @endcan
                 
                @can('eliminar producto')
                  {{-- ELIMINAR --}}
                  <button class="btn d-inline" style="color: red"  data-toggle="modal" data-target="#eliminar{{$ventas->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                  </button>
      
                  </div>  
                @endcan
                
      
                  {{-- ELIMINAR --}}
                  <div class="modal fade" id="eliminar{{$ventas->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Eliminar Venta</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                         ¿Realmente Desea Borrar la Venta?
                        </div>
                        <form action="{{url('/venta/'.$ventas->id)}}" method="POST">
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