@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">REGISTRAR NUEVA COMPRA</h1>

<style>
        
  .menor{
          color:#ff3333;
          font-size: medium;
      }
  .mayor{
          color:#29a01e;
          font-size: medium;
      }
</style>

    <div class="card">
        <div class="card-body">
              <div class="card">
                  <div class="card-body">
                    <h5><strong>DATOS DE LA COMPRA</strong></h5>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group">
                                <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Sucursal</span>
                                <input type="text" class="form-control text-center" readonly value="{{$compra->id_sucursal}}">              
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Almacen</span>
                                <input type="text" class="form-control text-center" readonly value="{{$compra->id_almacen}}">              
                            </div>
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-8">
                            <div class="input-group">
                              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Producto</span>
                              <input type="text" class="form-control" readonly value="{{$compra->codigo_producto}}, {{$producto->nombre_producto}}">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Proveedor</span>
                                <input type="text" class="form-control text-center" readonly value="{{$compra->proveedor}}">         
                            </div>
                        </div>
                    </div>
                    
                    <br>
                    <div class="row">
                        <div class="col-5">
                          <div class="input-group">
                            <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Cantidad</span>
                            <input type="text" class="form-control text-center" readonly value="{{$compra->cantidad}}">
                            <input type="text" class="form-control text-center" readonly value="{{$compra->unidad}}">
                          </div>
                        </div>
                      <div class="col-3">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Cantidad Unitaria</span>
                          <input type="text" class="form-control text-center" readonly value="{{$compra->cantidad_unitaria}}">
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Costo de Adquisicion</span>
                          <input type="text" class="form-control text-right" readonly value="{{$compra->costo_adquisicion}}">
                                 <span class="input-group-text" id="basic-addon1" >Bs.</span>
                        </div>
                      </div>
                    </div>
                    <br>
                    
                    @if ($compra->precio_venta != null || $compra->precio_venta_unitario)
                        <h6><strong>Precio de Venta Actualizado</strong></h6>
                    @endif
                    
                    <div class="row">
                    @if ($compra->precio_venta != null)    
                    <div class="col-4">
                        <div class="input-group">
                            <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Precio de Venta</span>
                            <input type="text" class="form-control text-right" readonly value="{{$compra->precio_venta}}">
                            <span class="input-group-text" id="basic-addon1" >Bs.</span>
                        </div>
                    </div>
                    @endif
                    @if ($compra->precio_venta_unitario)
                    <div class="col-4">
                      <div class="input-group">
                        <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Precio Venta Unitario</span>
                           <input type="text" class="form-control text-right" readonly value="{{$compra->precio_venta_unitario}}">
                               <span class="input-group-text" id="basic-addon1" >Bs.</span>
                      </div>
                    </div>
                    @endif
                  </div>
                  </div> 
                </div> 
                
                                    <h6><strong>DETALLE / DESCRIPCION</strong></h6>
                                    <textarea class="embed-responsive form-control " readonly style="resize: none;padding-left: 20px;padding-top: 20px" name="descripcion" id="descripcion" cols="140" rows="4">
                                    {{$compra->detalle}}
                                    </textarea>
                                  <br>
                   
                <div class="form-group text-center">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="/compras" class="btn btn-secondary my-2 my-sm-0">Volver</a>
                    </div>
        </div>
    </div>


@endsection