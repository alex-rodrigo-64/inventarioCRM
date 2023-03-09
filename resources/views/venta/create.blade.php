@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">REGISTRAR NUEVA VENTA</h1>

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
                                <option selected value="" disabled>Elige una Sucursal</option>
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
                                <option selected value="" disabled>Almacenes Disponibles</option>
                                </select>               
                            </div>
                            <span id="estadoRol"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-8">
                            <div class="input-group">
                              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Cliente</span>
                              <input type="text" name="cliente" id="cliente" required autocomplete="off" list="codigo" class="form-control"
                              placeholder="Ingrese nuevo cliente" tabindex="1"  onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209)) ">
                              <datalist id="codigoDatalist" >
                              </datalist>
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
                                <option  selected value="" disabled>Seleccione una opcion</option>
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
                                <option  selected value="" disabled>Tipo de Pago </option>
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
                            <input type="text" class="form-control " name="codigoVenta" id="codigoVenta" onkeyup="mayus(this);validarCodigo()" 
                            onkeypress="return ( (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 45))">
                        </div>
                        <span id="estadoCodigo"></span>
                    </div>
                    <div class="col-3">
                      <div class="input-group">
                          <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Producto</span>
                          <input type="text" class="form-control " name="producto" id="producto"  readonly
                          onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57))">
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="input-group">
                          <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Cantidad</span>
                          <input type="text" class="form-control " name="cantidad" id="cantidad" 
                          onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 44) || (event.charCode == 45) || (event.charCode == 46))">
                      </div>
                  </div>
                      <div class="col-3">
                        <div class="input-group">
                          <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Unidad</span>
                            <select name="unidad" id="unidad" class="form-control">
                              <option disabled selected>Seleccione Unidad</option>
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
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Descripcion</span>
                            <input type="text" class="form-control " name="descripcion" id="descripcion" 
                            onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Precio Unitario</span>
                            <input type="text" class="form-control " name="precioUnitario" id="precioUnitario"  onkeyup="validarPrecioUnitario()"
                            onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 44) || (event.charCode == 46))">
                        </div>
                        <span id="estadoPrecioUnitario"></span>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Precio Total</span>
                            <input type="text" class="form-control " name="precioTotal" id="precioTotal" 
                            onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 44) || (event.charCode == 46))">
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
                                <th class="text-center" >Producto</th>
                                <th class="text-center" >Cantidad</th>
                                <th class="text-center" >Unidad</th>
                                <th class="text-center" >Descripcion</th>
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
                                    <h6><strong>DETALLE / DESCRIPCION</strong></h6>
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
    if ($('#cliente').val() != "") {
    $('#cliente').prop('readonly', true);
  }

  $('#cliente').keyup(function() {
      var query = $(this).val();
      //console.log(query);
      if (query != '') {
          $.ajax({
              url: '/autocompletarCliente',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
                  query: query,
              },
              success: function(data) {
              //  console.log(data);
                  $('#codigoDatalist').fadeIn();
                  $('#codigoDatalist').html(data);
              }
          
          });
      }
  });
  //
        function validarCodigo() {
          
          var url1 = $('#codigoVenta').val();
          var url2 = $('#sucursal').val();
          var url3 = $('#almacen').val();
          //console.log(url1);
            jQuery.ajax({
                url: "/venta/validarCodigo",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "codigoVenta": url1,
                    "sucursal": url2,
                    "almacen": url3,
                },
                asycn: false,
                type: "POST",
                success: function(data) {
                  // console.log(data);
                   $('#estadoCodigo').empty();
                    if(data == 1){
                        $("#estadoCodigo").append("<span  class='menor'><h5 class='menor'>&nbsp;&nbsp;Codigo de Producto no Existe</h5></span>");

                    }else{
                        $("#estadoCodigo").append("<span  class='mayor'><h5 class='mayor'>&nbsp;&nbsp;Codigo de Producto Existe</h5></span>");
                        var re = JSON.parse(data);
                       // console.log(re);
                       $('#producto').val(re.data[0].nombre_producto);
                    }
                },
                error: function() {
                    console.log('Error');
                }
            });
        } 
 
    ////
 
      $("#guardarDetalle").on('click',function(){
            var url1 = $('#codigoVenta').val();
            var url2 = $('#producto').val();
            var url3 = $('#cantidad').val();
            var url4 = $('#unidad').val();
            var url5 = $('#descripcion').val();
            var url6 = $('#precioUnitario').val();
            var url7 = $('#precioTotal').val();

          //  console.log(url1);
                $.ajax({
                    url: "/venta/nuevoDetalle",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        codigoVenta: url1,
                        producto: url2,
                        cantidad: url3,
                        unidad: url4,
                        descripcion: url5,
                        precioUnitario: url6,
                        precioTotal: url7,
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        //console.log(dataResult);
                        datosDetalle();

                        $("#codigoVenta").val(''); 
                        $("#producto").val(''); 
                        $("#cantidad").val('');
                        $("#unidad").val('Seleccione una Unidad');
                        $("#descripcion").val('');
                        $("#precioUnitario").val('');
                        $("#precioTotal").val('');
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

                for (  i = 0 ; i < filas; i++){ 
                        count = Number(count) + Number(dataResult.data[i].precio_total); 
                    }

                    for (  i = 0 ; i < filas; i++){ //cuenta la cantidad de busquedas por id
                        var text = "";
                        var aux1 = "";
                        if (dataResult.data[i].id != null) {
                            aux1 = dataResult.data[i].id;
                        }
                            
                          var nuevafila= "<tr><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                          dataResult.data[i].codigo  + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                           dataResult.data[i].producto  + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                           dataResult.data[i].cantidad  + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                           dataResult.data[i].unidad   + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                           dataResult.data[i].descripcion  + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
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

                    var nueva= "<tr><td class='text-center text-white' style='background: rgb(2, 117, 216)' colspan='6'>"+
                                "TOTAL" +
                                "</td><td class='text-center' colspan='2' style= 'background: rgb(209, 244, 255)'>" +
                                count + "</td></tr>"
                        
                        $("#detallesGuardados").append(nueva) ;
                        $('#precioUnico').val(count);
                    
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
          ///
          function mayus(e) {
              $("#stateRow").html("<span  class='bien'><h5 ></h5></span>");
                e.value = e.value.toUpperCase();
            }
</script>

@endsection