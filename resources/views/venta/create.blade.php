@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">REGISTRAR NUEVA VENTA</h1>



<body>

    <div class="card">
        <div class="card-body">
            <form action="{{url('/venta/nuevo')}}" id="formulario" method="POST">
              @csrf
              <div class="card">
                  <div class="card-body">
                    <h5><strong>DATOS DE LA VENTA</strong></h5>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group">
                                <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Sucursal</span>
                                <select name="sucursal" id="sucursal" required onchange="getAlmacen()"
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
                                <select name="almacen" id="almacen" required class="form-control" >
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
                              <input type="text" name="cliente" id="cliente" required value="{{ old('Nombre') }}" class="form-control" onkeyup="validarNombre()" 
                              placeholder="Ingrese nuevo cliente" tabindex="1"  onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209)) ">
                            </div>
                          <span id="estadoNombre"></span>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Nombre del Producto</span>
                              <input type="text" name="producto" id="producto" required value="{{ old('Nombre') }}" class="form-control" onkeyup="validarNombre()" 
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
                              <select name="pago" id="pago" onchange="getPago()" class="form-control"> 
                                <option disabled selected>Seleccione una opcion</option>
                                @foreach ($tipoPago as $tipoPagos)
                                        <option   value="{{$tipoPagos->id}}"> {{$tipoPagos->nombre_pago}}</option>
                                         @endforeach
                              </select>
                          </div>
                        <span id="estado"></span>
                      </div>
                      <div class="col-4">
                        <div class="input-group">
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Detalle de Pago</span>
                              <select name="detallePago" id="detallePago" class="form-control">
                                <option disabled selected>Tipo de Pago </option>
                              </select>
                          </div>
                        <span id="estado"></span>
                      </div>
                    </div>
                  </div> 
                </div> 
                <!---->
                <div class="card">
                  <div class="card-body">
                    <h5><strong>DETALLE DE LA VENTA</strong></h5>
                    <br>
                    <div class="row">
                      <div class="col-3">
                        <div class="input-group">
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Codigo</span>
                            <input type="text" class="form-control " name="codigo" id="codigo"
                            onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                    </div>
                    <div class="col-4">
                      <div class="input-group">
                          <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Cantidad</span>
                          <input type="text" class="form-control " name="cantidad" id="cantidad"
                          onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57))">
                      </div>
                  </div>
                      <div class="col-4">
                        <div class="input-group">
                          <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Unidad</span>
                            <select name="unidad" id="unidad" class="form-control">
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
                            <input type="text" class="form-control " name="detalle" id="detalle"
                            onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Precio Unitario</span>
                            <input type="text" class="form-control " name="precioUnitario" id="precioUnitario"
                            onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Precio Total</span>
                            <input type="text" class="form-control " name="precioTotal" id="precioTotal"
                            onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                      </div>
                      <div class="col-1">
                          <button class='btn btn-icon btn-success' type='button' id='guardarDetalle' name='guardarDetalle'>
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
                      <table class="table table-light" id="tablaDetalle">
                          <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                              <tr>
                                <th class="text-center" >Codigo</th>
                                <th class="text-center" >Cantidad</th>
                                <th class="text-center" >Unidad</th>
                                <th class="text-center" >Detalle</th>
                                <th class="text-center" >Precio Unitario</th>
                                <th class="text-center" >Precio Total</th>
                                <th class="text-center" ></th>
                              </tr>
                            </thead>
                          <tbody class="table-bordered" id="detallesGuardados">
                              <tr>
                              
                              <tr>
                          </tbody>
                      </table>
                  </div>
                   
                  
                </div>
                <!----->
                                <!----->
                                <div class="card">
                                  <div class="card-body">
                                    <h6><strong>DESCRIPCION</strong></h6>
                                    <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px" name="descripcion" id="descripcion" cols="140" rows="4"></textarea>
                                  </div>
                                </div>
                   
                <div class="form-group">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="/ventas" class="btn btn-danger my-2 my-sm-0">Cancelar</a>
                         <button class="btn btn-success my-2 my-sm-0" type="submit" >Guardar</button>
                    </div>
            </form>
        </div>
    </div>
 

</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>

  $(document).ready(function() {

    datosDetalle();

  });
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

    function getPago(){
      var pago = $("#pago").val();
     // console.log(pago);
      $.ajax({
                    url: "/venta/getPago",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "pago": pago,
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        //console.log(dataResult);
                        $("#detallePago").empty();
                        $("#detallePago").append("<option selected disabled>Seleccione el detalle</option>");
                        dataResult.data.forEach(element => {
                          //console.log(element.nombre_almacen);
                          $("#detallePago").append("<option value='"+element.id+"'>"+element.pago_detalle+"</option>");
                        });
                        
                    }
                });
    }
    ////

      $("#guardarDetalle").on('click',function(){
            var url1 = $('#codigo').val();
            var url2 = $('#cantidad').val();
            var url3 = $('#unidad').val();
            var url4 = $('#detalle').val();
            var url5 = $('#precioUnitario').val();
            var url6 = $('#precioTotal').val();

          //  console.log(url1);
                $.ajax({
                    url: "/venta/nuevoDetalle",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        codigo: url1,
                        cantidad: url2,
                        unidad: url3,
                        detalle: url4,
                        precioUnitario: url5,
                        precioTotal: url6,
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        //console.log(dataResult);
                        datosDetalle();
                    }
                });
        });


        function datosDetalle(){
        $.ajax({
                url: "/venta/datos",
                type: "POST",
                data:{ 
                    "_token": "{{ csrf_token() }}",
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                //console.log(dataResult);
                $('#tablaDetalle > tbody').empty();
                var filas = dataResult.data.length;
                var count = 0;


                    for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de busquedas por id
                        var text = "";
                        var aux1 = "";
                        if (dataResult.data[i].id != null) {
                            aux1 = dataResult.data[i].id;
                        }
                            
                          var nuevafila= "<tr><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                          dataResult.data[i].codigo  + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                           dataResult.data[i].cantidad  + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                           dataResult.data[i].unidad   + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                           dataResult.data[i].detalle  + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                           dataResult.data[i].precio_unitario  + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                           dataResult.data[i].precio_total  + 
                            "</td><td class='text-center' style='width: 3%;background: rgb(209, 244, 255)' >" +
                        '<button type="button" class="btn" data-toggle="modal" data-target="#exampleModalDetalle'+dataResult.data[i].id+'">'+
                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'+
                            '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'+
                            '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'+
                            '</svg>'+
                        '</button>'+
                        '<div class="modal fade" id="exampleModalDetalle'+dataResult.data[i].id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                            '<div class="modal-dialog" role="document">'+
                            '<div class="modal-content">'+
                                '<div class="modal-header">'+
                                '<h5 class="modal-title w-100 text-center" id="exampleModalLabel">Eliminar Detalle de Venta</h5>'+
                                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                    '<span aria-hidden="true">&times;</span>'+
                                '</button>'+
                                '</div>'+
                                '<div class="modal-body">'+
                                '¿Realmente Desea Borrar el Detalle de Venta?'+
                                '</div>'+
                                '<div class="modal-footer">'+
                                '<button type="button" class="btn btn-secondary" data-dismiss="modal">Rechazar</button>'+
                                '<button class="btn btn-primary" onclick="eliminarDetalle('+dataResult.data[i].id+')">'+
                                    'Aceptar'+
                                '</button>'+
                                '</div>'+
                            '</div>'+
                            '</div>'+
                        ' </div> '+
                        "</td></tr>"
                        
                        $("#detallesGuardados").append(nuevafila);
                    }
                    
                    }
                });
    }

    function eliminarDetalle(id){
             $.ajax({
                    url: "/venta/eliminar",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        //console.log(dataResult);
                        datosDetalle();
                        $('#exampleModalDetalle'+id).modal('hide')
                    }
                });
          }
</script>

@endsection