@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">REGISTRAR NUEVO PROVEEDOR </h1>

 

<body>

    <div class="card">
        <div class="card-body">
            <form action="{{url('/proveedor/nuevo')}}" id="formulario" method="POST">
              @csrf
              <div class="card">
                  <div class="card-body">
                    <h5><strong>DATOS DEL NUEVO PROVEEDOR</strong></h5>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group">
                              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue"><span style="color: red">*</span>Nombre de Proveedor</span>
                              <input type="text" name="nombreProveedor" id="nombreProveedor" required value="{{ old('Nombre') }}" class="form-control" placeholder="Nombre Proveedor" tabindex="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 46)) ">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Telefono</span>
                                <input type="text" name="telefono" id="telefono" value="{{ old('Nombre') }}" class="form-control" placeholder="Numero Telefono" tabindex="1" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57)) ">               
                            </div>
                            <span id="estadoRol"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-6">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue"><span style="color: red">*</span>Direccion</span>
                             <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Nueva Direccion"
                                 required   onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46) || (event.charCode == 241) || (event.charCode == 209))">
                        </div>
                         
                      </div>
                      <div class="col-6">
                        <div class="input-group">
                            <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue"><span style="color: red">*</span>Celular</span>
                            <input type="text" name="celular" id="celular" required value="{{ old('Nombre') }}" class="form-control" placeholder="Numero Celular" tabindex="1" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57)) ">               
                        </div>
                        <span id="estadoRol"></span>
                    </div>
                    </div>
                  </div> 
                        <span>&nbsp;&nbsp;<b>Campos Obligatorios</b> <span style="color: red">*</span></span>
                </div> 
                <h6><strong>DETALLE / DESCRIPCION</strong></h6>

                <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px" name="detalle" id="detalle" cols="140" rows="4"></textarea>
                <br> 
                <div class="form-group">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="/proveedores" class="btn btn-danger my-2 my-sm-0">Cancelar</a>
                         <button class="btn btn-success my-2 my-sm-0" type="submit" >Guardar</button>
                    </div>
            </form>
        </div>
    </div>
 

</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

@endsection