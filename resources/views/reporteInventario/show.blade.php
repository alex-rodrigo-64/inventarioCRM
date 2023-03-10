@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">REPORTE DE INVENTARIO</h1>
<div class="card">
    <div class="card-body">
        <br>
        <div class="card">
            <div class="card-body">
                <a href="/reporte/nuevo/inventario">
                    <button type="button" class="btn btn-secondary">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                    </button>
                </a>
                <div class="row justify-content-center">
                    <div class="col-5">
                        <div class="input-group">
                            <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Fecha de Inicio</span>
                            <input type="date" name="fechaInicio" id="fechaInicio" value="{{$fecha_inicial}}" disabled class="form-control" >
                        </div>
                        <span id="estadoNombre"></span>
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Fecha Final</span>
                            <input type="date" name="fechaFin" id="fechaFin" value="{{$fecha_fin}}" disabled class="form-control" >        
                        </div>
                        <span id="estadoRol"></span>
                    </div>
                </div>   
                <br>
                <div class="row justify-content-center">
                    <div class="col-5">
                        <div class="input-group">
                            <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Sucursal</span>
                            <input name="sucursal" id="sucursal" value="{{$inventario_elegido[0]->nombre_sucursal}}" disabled class="form-control" >              
                        </div>
                        <span id="estadoRol"></span>
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Almacen</span>
                            <input name="almacen" id="almacen" value="{{$inventario_elegido[0]->nombre_almacen}}" disabled class="form-control" >
                        </div>
                        <span id="estadoRol"></span>
                    </div>
                 </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
              <h5><strong>DETALLE DE INVENTARIO</strong></h5>
              <br>
                <table class="table table-light" id="tablaDetalle">
                    <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                        <tr>
                          <th class="text-center" >Codigo</th>
                          <th class="text-center" >Producto</th>
                          <th class="text-center" >Proveedor</th>
                          <th class="text-center" >Cantidad</th>
                          <th class="text-center" >Unidad</th>
                          <th class="text-center" >Cantidad Unitaria</th>
                          <th class="text-center" >Cantidad Unitaria Total</th>
                          <th class="text-center" >Costo Adquisicion</th>
                          <th class="text-center" >Precio Venta</th>
                          <th class="text-center" >Precio Venta Unitario</th>
                        </tr>
                      </thead>
                    <tbody class="table-bordered" id="detallesGuardados">
                        @foreach($inventario_elegido as $datos)
                        <tr>
                            <td class="text-center" >{{$datos->codigo}}</td>
                            <td class="text-center" >{{$datos->nombre_producto}}</td>
                            <td class="text-center" >{{$datos->proveedor}}</td>
                            <td class="text-center" >{{$datos->cantidad}}</td>
                            <td class="text-center" >{{$datos->unidad}}</td>
                            <td class="text-center" >{{$datos->cantidad_unitaria}}</td>
                            <td class="text-center" >{{$datos->cantidad_unitaria_total}}</td>
                            <td class="text-center" >{{$datos->costo_adquisicion}}</td>
                            <td class="text-center" >{{$datos->precio_venta}}</td>
                            <td class="text-center" >{{$datos->precio_venta_unitario}}</td>
                        <tr>   
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
    </div>
</div>
@endsection