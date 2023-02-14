@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">REGISTRAR NUEVA VENTA</h1>



<body>

    <div class="card">
        <div class="card-body">
            <form action="{{url('/cliente/nuevo')}}" id="formulario" method="POST">
              @csrf
              <div class="card">
                  <div class="card-body">
                    <h5><strong>DATOS DE LA VENTA</strong></h5>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group">
                                <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Sucursal</span>
                                <select name="sucursal" id="sucursal" onchange="getAlmacen()"
                                class="form-control" >
                                <option selected value="Elige un Rol" disabled>Elige una Sucursal</option>
                                        @foreach ($sucursal as $sucursal)
                                        <option   value="{{$sucursal->id}}"> {{$sucursal->nombre_sucursal}}</option>
                                         @endforeach
                                </select>               
                            </div>
                            <span id="estadoRol"></span>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Almacen</span>
                                <select name="almacen" id="almacen"  class="form-control" >
                                <option selected value="Elige un Rol" disabled>Almacenes Disponibles</option>
                                </select>               
                            </div>
                            <span id="estadoRol"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group">
                              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Cliente</span>
                              <input type="text" name="nombreInventario" id="nombreInventario" required value="{{ old('Nombre') }}" class="form-control" onkeyup="validarNombre()" 
                              placeholder="Ingrese nuevo cliente" tabindex="1"  onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209)) ">
                            </div>
                          <span id="estadoNombre"></span>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Nombre del Producto</span>
                              <input type="text" name="nombreInventario" id="nombreInventario" required value="{{ old('Nombre') }}" class="form-control" onkeyup="validarNombre()" 
                              placeholder="Ingrese nuevo producto" tabindex="1"  onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46) || (event.charCode == 241) || (event.charCode == 209))">
                            </div>
                          <span id="estadoNombre"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-4">
                        <div class="input-group">
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Tipo de Pago</span>
                              <select name="rol[]" id="rol" class="form-control">
                                <option disabled selected>Seleccione una opcion</option>
                                <option value="Contado">Contado</option>
                                <option value="Credito">Credito</option>
                              </select>
                          </div>
                        <span id="estado"></span>
                      </div>
                      <div class="col-4">
                        <div class="input-group">
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Tipo de Pago</span>
                              <select name="rol[]" id="rol" class="form-control">
                                <option disabled selected>Seleccione una opcion</option>
                                <option value="Contado">Contado</option>
                                <option value="Credito">Credito</option>
                              </select>
                          </div>
                        <span id="estado"></span>
                      </div>
                    </div>
                  </div> 
                </div> 
                <!----->
                <div class="card">
                  <div class="card-body">
                    <h5><strong>DETALLE DE LA VENTA</strong></h5>
                    <br>
                    <div class="row">
                      <div class="col-4">
                          <div class="input-group">
                              <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Cantidad</span>
                              <input type="text" class="form-control " name="detalle"id="detalle"
                              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57))">
                          </div>
                      </div>
                      <div class="col-3">
                          <div class="input-group">
                              <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Codigo</span>
                              <input type="text" class="form-control " name="descripcion"id="descripcion"
                              onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57))">
                          </div>
                      </div>
                      <div class="col-4">
                        <div class="input-group">
                          <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Unidad</span>
                            <select name="rol[]" id="rol" class="form-control">
                              <option disabled selected>Seleccione una Unidad</option>
                                 @foreach ($unidad as $unidades)
                                  <option   value="{{$unidades->nombre_unidad}}"> {{$unidades->nombre_unidad}}</option>
                                  @endforeach
                            </select>
                        </div>
                      <span id="estado"></span>
                      </div>
                      
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-4">
                        <div class="input-group">
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Detalle</span>
                            <input type="text" class="form-control " name="detalle"id="detalle"
                            onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Precio Unitario</span>
                            <input type="text" class="form-control " name="precio" id="precio"
                            onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Precio Total</span>
                            <input type="text" class="form-control " name="precio" id="precio"
                            onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                      </div>
                      <div class="col-1">
                          <button class='btn btn-icon btn-success' type='button' id='guardar' name='guardar'>
                              <svg xmlns="http://www.w3.org/2000/svg" width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox="0 0 448 512">
                                  <path d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 
                                  48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM272 80v80H144V80h128zm122 352H54a6 6 0 0 1-6-6V86a6 6 0 0 1 6-6h42v104c0 13.255 
                                  10.745 24 24 24h176c13.255 0 24-10.745 24-24V83.882l78.243 78.243a6 6 0 0 1 1.757 4.243V426a6 6 0 0 1-6 6zM224 232c-48.523 0-88 39.477-88 
                                  88s39.477 88 88 88 88-39.477 88-88-39.477-88-88-88zm0 128c-22.056 0-40-17.944-40-40s17.944-40 40-40 40 17.944 40 40-17.944 40-40 40z"/>
                              </svg>
                              </button>
                      </div>
                      
                    </div>
                    
                  </div>
              
                </div>
              
                <div class="card">
                  <div class="card-body">
                      <table class="table table-light" id="tablaServicio">
                          <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                              <tr>
                                <th class="text-center" >Cantidad</th>
                                <th class="text-center" >Codigo</th>
                                <th class="text-center" >Unidad</th>
                                <th class="text-center" >Detalle</th>
                                <th class="text-center" >Precio Unitario</th>
                                <th class="text-center" >Precio Total</th>
                              </tr>
                            </thead>
                          <tbody class="table-bordered" id="serviciosGuardados">
                              <tr>
                              
                              <tr>
                          </tbody>
                      </table>
                  </div>
                   
                  
                </div>
                <!----->
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
<script>
   function getAlmacen(){
      var sucursal = $("#sucursal").val();
      $.ajax({
                    url: "/venta/getAlmacen",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "sucursal": sucursal,
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        //console.log(dataResult);
                        $("#almacen").empty();
                        $("#almacen").append("<option selected disabled>Seleccione un Almacen</option>");
                        dataResult.data.forEach(element => {
                          //console.log(element.nombre_almacen);
                          $("#almacen").append("<option value='"+element.id+"'>"+element.nombre_almacen+"</option>");
                        });
                        
                    }
                });
    }
</script>

@endsection