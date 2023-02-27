@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">REGISTRAR NUEVO ALMACEN </h1>

 

<body>

    <div class="card">
        <div class="card-body">
            <form action="{{url('/almacen/nuevo')}}" id="formulario" method="POST">
              @csrf
              <div class="card">
                  <div class="card-body">
                    <h5><strong>DATOS DEl NUEVO ALMACEN</strong></h5>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group">
                              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Nombre de Almacen</span>
                              <input type="text" name="nombreAlmacen" id="nombreAlmacen" required value="{{ old('Nombre') }}" class="form-control" onkeyup="validarNombre()" placeholder="Nuevo Almacen" tabindex="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 46)) ">
                            </div>
                          <span id="estadoNombre"></span>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Seleccione una Sucursal</span>
                                <select name="sucursal" id="sucursal" onblur="validarRoles()" onchange="validarRoles()"
                                class="form-control" >
                                <option selected value="Elige un Rol" disabled>Elige una Sucursal</option>
                                        @foreach ($sucursal as $sucursal)
                                        <option   value="{{$sucursal->id}}"> {{$sucursal->nombre_sucursal}}</option>
                                         @endforeach
                                </select>               
                            </div>
                            <span id="estadoRol"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-6">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Direccion</span>
                             <input type="text" id="direccion" name="direccion" class="form-control" 
                                 required autocomplete="off"  onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46) || (event.charCode == 241) || (event.charCode == 209))">
                        </div>
                         <span id="estadoCostoA"></span>
                      </div>
                    </div>
                  </div> 
                     

                </div> 
                   
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