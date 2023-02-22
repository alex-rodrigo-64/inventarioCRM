@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700"> VENTA REGISTRADA</h1>



<body>

    <div class="card">
        <div class="card-body">
              @csrf
              <div class="card">
                  <div class="card-body">
                    <h5><strong>DATOS DE LA VENTA</strong></h5>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group">
                                <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Sucursal</span>
                                <input name="sucursal" id="sucursal" onchange="getAlmacen()" placeholder="Sucursal registrada" disabled
                               value="{{$venta_elegida->nombre_sucursal}}" class="form-control" >              
                            </div>
                            <span id="estadoRol"></span>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Almacen</span>
                                <input name="almacen" id="almacen" required class="form-control" disabled value="{{$venta_elegida->nombre_almacen}}" placeholder="Almacen registrado" >               
                            </div>
                            <span id="estadoRol"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group">
                              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Cliente</span>
                              <input type="text" name="cliente" id="cliente" required class="form-control" disabled value="{{$venta_elegida->cliente}}" 
                              placeholder="Ingrese nuevo cliente" tabindex="1"  >
                            </div>
                          <span id="estadoNombre"></span>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Nombre del Producto</span>
                              <input type="text" name="producto" id="producto" required  class="form-control" disabled value="{{$venta_elegida->producto}}"
                              placeholder="Ingrese nuevo producto" tabindex="1" >
                            </div>
                          <span id="estadoNombre"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-4">
                        <div class="input-group">
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Tipo de Pago</span>
                              <input name="pago" id="pago" onchange="getPago()" placeholder="Tpo de pago" disabled value="{{$pago_elegido->nombre_pago}}" class="form-control"> 
                          </div>
                        <span id="estado"></span>
                      </div>
                      <div class="col-4">
                        <div class="input-group">
                            <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Detalle de Pago</span>
                              <input name="detallePago" id="detallePago" placeholder="Detalle de pago" disabled value="{{$pago_elegido->pago_detalle}}" class="form-control">
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
                      <table class="table table-light" id="tablaDetalle">
                          <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                              <tr>
                                <th class="text-center" >Codigo</th>
                                <th class="text-center" >Cantidad</th>
                                <th class="text-center" >Unidad</th>
                                <th class="text-center" >Detalle</th>
                                <th class="text-center" >Precio Unitario</th>
                                <th class="text-center" >Precio Total</th>
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
                <h6><strong>DETALLE / DESCRIPCION</strong></h6>

                <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px" name="descripcion" id="descripcion" cols="140" rows="4" disabled>{{$venta_elegida->descripcion}}</textarea>
                <br>    
                <div class="form-group">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="/ventas" class="btn btn-danger my-2 my-sm-0">Atras</a>
                    </div>
        </div>
    </div>
 

</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>
  $(document).ready(function() {

datosDetalle();

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
                        "</td></tr>"
                        
                        $("#detallesGuardados").append(nuevafila);
                    }
                    
                    }
                });
    }
</script>

@endsection