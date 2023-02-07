@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">EDITAR SUCURSAL</h1>



<body>

    <div class="card">
        <div class="card-body">
            <form action="{{ url('sucursal/editar/'.$sucursal_elegida->id)}}" id="formulario" method="POST">
              @csrf
              <div class="card">
                  <div class="card-body">
                    <h5><strong>EDICION DE LA SUCURSAL</strong></h5>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group">
                              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Nombre de Sucursal</span>
                              <input type="text" name="nombreSucursal" id="nombreSucursal" required value="{{$sucursal_elegida->nombre_sucursal}}" class="form-control" onkeyup="validarNombre()" placeholder="Nueva Sucursal" tabindex="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209)) ">
                            </div>
                          <span id="estadoNombre"></span>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Nombre de Propietario</span>
                              <input type="text" name="nombrePropietario" id="nombrePropietario" required value="{{$sucursal_elegida->nombre_propietario}}" class="form-control" onkeyup="validarNombre()" placeholder="Nueva Sucursal" tabindex="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209)) ">
                            </div>
                          <span id="estadoNombre"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-7">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Direccion</span>
                             <input type="text" id="direccion" name="direccion" class="form-control" value="{{$sucursal_elegida->direccion_sucursal}}"
                                 required autocomplete="off"  onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46) || (event.charCode == 241) || (event.charCode == 209))">
                        </div>
                         <span id="estadoCostoA"></span>
                      </div>
                    </div>
                  </div> 
                     

                </div> 
                   
                <div class="form-group">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="/sucursales" class="btn btn-danger my-2 my-sm-0">Cancelar</a>
                         <button class="btn btn-success my-2 my-sm-0" type="submit" >Guardar</button>
                    </div>
            </form>
        </div>
    </div>
 

</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

@endsection