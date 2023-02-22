@extends('adminlte::page')
@section('content')
@php
{{$texto = strtoupper($almacen->nombre_almacen);}}
@endphp
<br>
<h1 align="center" style="font-weight: 700">INVENTARIO DE {{$texto}}</h1>

<div class="card">
    <div class="card-body">

        <a href="/inventarios">
            <button type="button" class="btn btn-secondary">
                <i class="fas fa-arrow-alt-circle-left"></i>
            </button>
        </a>

        <br>
        <br>
        <div class="row justify-content-center">
            <div class="col-10">
    <div class="table-responsive">
                <table class="table table-striped table-hover table-responsive">
                  <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                    <tr>
                      <th class="text-center"style="width: 25%">Codigo</th>
                      <th class="text-center"style="width: 15%">Nombre</th>
                      <th class="text-center"style="width: 20%;">Proveedor</th>
                      <th class="text-center"style="width: 10%">Cantidad</th>
                      <th class="text-center"style="width: 15%">Fecha</th>
                      <th class="text-center" style="width: 10%">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($inventario as $item)
                      <tr>
                        <td class="text-center">{{$item->codigo}}</td>
                        <td class="text-center">{{$item->nombre_producto}}</td>
                        <td class="text-center">{{$item->proveedor}}</td>
                        <td class="text-center">{{$item->cantidad}}</td>
                        <td class="text-center">{{$item->created_at}}</td>
                        <td style="width: 10%">
                
                          <div style="text-align: center;width:90px">
                            
                            {{-- EDITAR --}}
                          <a href="{{ url('/item/editar/'.$item->id)}}">
                            <button class="btn btn-light-active btn-sm d-inline"  >
                              <svg xmlns="http://www.w3.org/2000/svg" fill="rgb(168, 166, 14)" viewBox="0 0 16 16" width="18" height="20">
                                <path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 
                                0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z">
                                </path>
                              </svg>
                            </button>
                          </a> 
                
                          {{-- ELIMINAR --}}
                            <button class="btn d-inline" style="color: red"  data-toggle="modal" data-target="#eliminar{{$item->id}}">
                              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                              </svg>
                            </button>
                
                          </div>
                
                
                          {{-- ELIMINAR --}}
                          <div class="modal fade" id="eliminar{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Eliminar item</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-title w-100 text-center">
                                  ¿Realmente Desea Borrar el item?
                                </div>
                                <form action="{{url('/inventarios/almacen'.$item->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>
                                  <button class="btn btn-success" >Aceptar</button>
                                </div>
                              </form> 
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
    </div>
</div>


@endsection