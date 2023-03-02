@extends('adminlte::page')
@section('content')

<h1 align="center" style="font-weight: 700">SOLICITUD DE PRODUCTO</h1>

<div class="card">
    <div class="card-body">
        <br>
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="input-group">
                  <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Sucursal Origen</span>
                  <input type="text" name="nombreProducto" id="nombreProducto" required value="{{ $transfe->id_origen }}" readonly class="form-control" placeholder="Nombre de Producto" tabindex="1">
                </div>
              <span id="estadoNombre"></span>
            </div>
                <div class="col-1.5">
                    <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue"><b>SOLICITA</b></span>
                </div>
            
            <div class="col-5">
                <div class="input-group">
                    <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Sucursal Destino</span>
                    <input type="text" name="nombreProducto" id="nombreProducto" required value="{{ $transfe->id_destino }}" readonly class="form-control" placeholder="Nombre de Producto" tabindex="1">               
                </div>
                <span id="estadoRol"></span>
            </div>
        </div>

        <br> 
        <div class="row justify-content-center">
            <div class="col-5" >
                <div class="input-group">
                  <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Almacen</span>
                  <input type="text" name="nombreProducto" id="nombreProducto" required value="{{ $transfe->id_almacen }}" readonly class="form-control" placeholder="Nombre de Producto" tabindex="1">
                </div>
            </div>
            <div class="col-1" ></div>
            <div class="col-5" ></div>
        </div>

        <br>
        <div class="row justify-content-center">
            <div class="col-5" >
                <div class="input-group">
                  <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Nombre del Producto</span>
                  <input type="text" name="nombreProducto" id="nombreProducto" required value="{{ $transfe->nombre_producto }}" readonly class="form-control" placeholder="Nombre de Producto" tabindex="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209)) ">
                </div>
              <span id="estadoNombre"></span>
            </div>
            <div class="col-5">
                <div class="input-group">
                  <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Cantidad</span>
                    <input type="text" id="cantidad" value="{{$transfe->cantidad}}" readonly name="cantidad" class="form-control text-center" required readonly >
                <input type="text" name="nombreProducto" id="nombreProducto" required value="{{ $transfe->unidad }}" readonly class="form-control" placeholder="Nombre de Producto" tabindex="1"> 
                </div>
              </div>
              <div class="col-1" ></div>
        </div>
        <br>
        <div class="row justify-content-center">

            <div class="col-11">
                <label style="font-size: 16px;">Detalle</label>
                        <br>
                        <textarea class="embed-responsive form-control " readonly style="resize: none;padding-left: 0px;padding-top: 20px" name="detalle" id="detalle" cols="140" rows="4">
                        {{$transfe->detalle}}
                        </textarea>

            </div>
       
        </div>
        


      </div>

      <div class="text-center">
            <button class="btn btn-danger my-2 my-sm-0" id="cancelar" type="button" >Cancelar Solicitud</button>
            <a href="/solicitudes" class="btn btn-secondary">volver</a>
            <button class="btn btn-success my-2 my-sm-0" id="aceptar" type="button" >Enviar Solicitud</button>
      </div>
        
      <br>
     
    </form>
    </div>
</div>


@endsection