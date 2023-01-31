@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">REGISTRAR NUEVO INVENTARIO</h1>



<body>

    <div class="card">
        <div class="card-body">
            <form action="{{url('/cliente/nuevo')}}" id="formulario" method="POST">
              @csrf
              <div class="card">
                  <div class="card-body">
                    <h5><strong>DATOS DEL INVENTARIO</strong></h5>
                    <br>
                    <div class="row">
                        <div class="col-8">
                            <div class="input-group">
                              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Nombre del Producto</span>
                              <input type="text" name="nombreInventario" id="nombreInventario" required value="{{ old('Nombre') }}" class="form-control" onkeyup="validarNombre()" placeholder="Nuevo Inventario" tabindex="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209)) ">
                            </div>
                          <span id="estadoNombre"></span>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Cantidad</span>
                                 <input type="text" id="telefono" name="telefono" class="form-control"  placeholder="Ingrese la cantidad"
                                     required autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                            </div>
                             <span id="estadoCantidad"></span>
                          </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-4">
                        <div class="input-group">
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Ubicacion</span>
                              <select name="rol[]" id="rol" class="form-control">
                                <option disabled selected>Seleccione la Ubicacion</option>
                                <option value="Deposito">Deposito</option>
                                <option value="Tienda">Tienda</option>
                              </select>
                          </div>
                        <span id="estado"></span>
                      </div>
                      <div class="col-4">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Costo de Adquisicion</span>
                             <input type="text" id="costoAdqui" name="costoAdqui" class="form-control" 
                                 required autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                                 <span class="input-group-text" id="basic-addon1" >Bs.</span>
                        </div>
                         <span id="estadoCostoA"></span>
                      </div>
                      <div class="col-4">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Costo de Venta</span>
                        <input type="text" id="costoVenta" name="costoVenta" class="form-control" 
                          required onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 44) || (event.charCode == 46) || (event.charCode == 35) || (event.charCode == 47) || (event.charCode == 45) || (event.charCode == 124) || (event.charCode == 42))">
                          <span class="input-group-text" id="basic-addon1" >Bs.</span>
                        </div>
                      </div>
                    </div>
                    <br><div class="row">
                        <div class="col-4">
                          <div class="input-group">
                            <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Fecha</span>
                               <input type="date" id="costoAdqui" name="costoAdqui" class="form-control" 
                                   required autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                          </div>
                           <span id="estadoFecha"></span>
                        </div>
                        <div class="col-4">
                          <div class="input-group">
                            <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Proveedor</span>
                          <input type="text" id="costoVenta" name="costoVenta" class="form-control" 
                            required onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 44) || (event.charCode == 46) || (event.charCode == 35) || (event.charCode == 47) || (event.charCode == 45) || (event.charCode == 124) || (event.charCode == 42))">
                          </div>
                        </div>
                      </div>
                  </div> 
                     

                </div> 
                <h6><strong>DETALLE / DESCRIPCION</strong></h6>

                <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px" name="nota" id="nota" cols="140" rows="4"></textarea>
                <br>    
                <div class="form-group">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="/clientes" class="btn btn-danger my-2 my-sm-0">Cancelar</a>
                         <button class="btn btn-success my-2 my-sm-0" type="submit" onclick="enviarCliente()" >Guardar</button>
                    </div>
            </form>
        </div>
    </div>
 

</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

@endsection