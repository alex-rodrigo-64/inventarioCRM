@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700"> NUEVO REPORTE</h1>
<body>
        <div class="card">
            <div class="card-body">
                <br>
                <div class="row justify-content-center">
                    <div class="col-5">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Fecha de Inicio</span>
                          <input type="date" name="fechaInicio" id="fechaInicio" required value="" class="form-control" >
                        </div>
                      <span id="estadoNombre"></span>
                    </div>
                    <div class="col-5">
                        <div class="input-group">
                            <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Fecha Final</span>
                            <input type="date" name="fechaFin" id="fechaFin"  class="form-control" >        
                        </div>
                        <span id="estadoRol"></span>
                    </div>
                </div>
                <br>
                <div class="row justify-content-center">
                    <div class="col-4">
                        <div class="input-group">
                            <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Sucursal</span>
                            <select name="sucursal" id="sucursal" required onchange="getAlmacen()"
                            class="form-control" >
                            <option selected value="" disabled>Elige una Sucursal</option>
                            </select>               
                        </div>
                        <span id="estadoRol"></span>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Almacen</span>
                            <select name="almacen" id="almacen" required class="form-control" >
                            <option selected value="" disabled>Almacenes Disponibles</option>
                            </select>               
                        </div>
                        <span id="estadoRol"></span>
                    </div>
                </div>

            </div>
        </div>
</body>
@endsection