@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">REGISTRAR NUEVA COMPRA</h1>
    
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

    <div class="card">
        <div class="card-body">
            <form action="{{url('/compra/nueva')}}" id="formulario" method="POST">
              @csrf
              <div class="card">
                  <div class="card-body">
                    <h5><strong>DATOS DE LA COMPRA</strong></h5>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group">
                                <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Sucursal</span>
                                <select name="sucursal" id="sucursal" required onchange="getAlmacen()"
                                class="form-control" >
                                <option selected value="" disabled>Elige una Sucursal</option>
                                        @foreach ($sucursal as $sucursal)
                                        <option   value="{{$sucursal->nombre_sucursal}}"> {{$sucursal->nombre_sucursal}}</option>
                                         @endforeach
                                </select>               
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Almacen</span>
                                <select name="almacen" id="almacen" required class="form-control" >
                                <option selected value="" disabled>Elige una Sucursal</option>
                                </select>               
                            </div>
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-8">
                            <div class="input-group">
                              <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Producto</span>
                              <input type="text" name="producto" id="producto" required autocomplete="off" list="codigo" class="form-control" onblur="llenarUnidad()"
                              placeholder="Ingrese Nombre o Codigo de Producto" tabindex="1"  >
                              <datalist id="codigoDatalist">
                              </datalist>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Proveedor</span>
                                <select name="proveedor" id="proveedor" required
                                class="form-control" >
                                <option selected value="" disabled>Elige un Proveedor</option>
                                        @foreach ($proveedor as $proveedor)
                                        <option   value="{{$proveedor->nombre_proveedor}}"> {{$proveedor->nombre_proveedor}}</option>
                                         @endforeach
                                </select>              
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <span id="productoMensaje"></span>
                        </div>
                        <div class="col-4">
                            <span id="productoMensaje"></span>
                        </div>
                    </div>
                    
                    <br>
                    <div class="row">
                        <div class="col-5">
                          <div class="input-group">
                            <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Cantidad</span>
                              <input type="text" id="cantidad" name="cantidad" class="form-control text-center"
                          required   onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                            <input type="text" class="form-control text-center" id="cantidadP" name="cantidadP" readonly value="Unidad">
                          </div>
                        </div>
                      <div class="col-3">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Cantidad Unitaria</span>
                        <input type="text" id="cantidadUnitaria" name="cantidadUnitaria" class="form-control text-center" 
                          required onkeyup=""  onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                          
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Costo de Adquisicion</span>
                             <input type="text" id="costoAdqui" name="costoAdqui" class="form-control text-right" 
                                 required  onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 44) || (event.charCode == 46) || (event.charCode == 35) || (event.charCode == 47) || (event.charCode == 45) || (event.charCode == 124) || (event.charCode == 42))">
                                 <span class="input-group-text" id="basic-addon1" >Bs.</span>
                        </div>
                      </div>
                    </div>
                    
                    <br>
                    <h6><strong>Actualizar Precio de Venta (Opcional)</strong></h6>
                    <div class="row">
                    <div class="col-4">
                      <div class="input-group">
                        <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Precio de Venta</span>
                      <input type="text" id="costoVenta" name="costoVenta" class="form-control text-right" 
                         onkeyup=""  onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 44) || (event.charCode == 46) || (event.charCode == 35) || (event.charCode == 47) || (event.charCode == 45) || (event.charCode == 124) || (event.charCode == 42))">
                        <span class="input-group-text" id="basic-addon1" >Bs.</span>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="input-group">
                        <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Precio Venta Unitario</span>
                           <input type="text" id="costoUni" name="costoUni" class="form-control text-right" 
                                 onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 44) || (event.charCode == 46) || (event.charCode == 35) || (event.charCode == 47) || (event.charCode == 45) || (event.charCode == 124) || (event.charCode == 42))">
                               <span class="input-group-text" id="basic-addon1" >Bs.</span>
                      </div>
                       
                    </div>
                  </div>
                  </div> 
                </div> 
                
                                    <h6><strong>DETALLE / DESCRIPCION</strong></h6>
                                    <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px" name="descripcion" id="descripcion" cols="140" rows="4"></textarea>
                                  <br>
                   
                <div class="form-group">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="/ventas" class="btn btn-danger my-2 my-sm-0">Cancelar</a>
                         <button class="btn btn-success my-2 my-sm-0" type="submit" >Guardar</button>
                    </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script>
        function getAlmacen(){
      var sucursal = $("#sucursal").val();
       $("#almacen").empty();
       $("#almacen").append("<option selected value='' disabled>Seleccione un Almacen</option>");
      $.ajax({
                    url: "/compra/getAlmacen",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "sucursal": sucursal,
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        //console.log(dataResult);
                       
                        dataResult.data.forEach(element => {
                          //console.log(element.nombre_almacen);
                          $("#almacen").append("<option value='"+element.nombre_almacen+"'>"+element.nombre_almacen+"</option>");
                        });
                        
                    }
                });
    }

    $('#producto').keyup(function() {
      var query = $(this).val();
      var sucursal = $('#sucursal').val();
      var almacen = $('#almacen').val();
      $('#productoMensaje').html("<span  class='menor'></span>");
      console.log(sucursal == null);

      if (sucursal == null) {
          $('#productoMensaje').html("<span  class='menor'>Seleccione Una Sucursal</span>");
      }else{
        if (almacen == null ) {
           $('#productoMensaje').html("<span  class='menor'>Seleccione Un Almacen</span>");
        }else{
          
        //console.log(query);
        if (query != '') {
            $.ajax({
                url: '/autocompletarProducto',
                type: 'POST',
                data: {
                  "_token": "{{ csrf_token() }}",
                  query: query,
                  sucursal: sucursal,
                  almacen: almacen,
                },
                success: function(data) {
                  
                  //console.log(data);
                  if (data == 0) {
                      $('#productoMensaje').html("<span  class='menor'><h5 class='menor'>Producto no Registrado</h5></span>");
                  }else{
                    $('#codigoDatalist').fadeIn();
                      $('#codigoDatalist').html(data); 
                      
                  }
                  
                }
                
            });
        }else{
          $('#productoMensaje').html("<span  class='menor'></span>");
        }
      
      
     
          $('#productoMensaje').html("<span  class='menor'></span>");
        }
      }
         
  });

    function llenarUnidad() {
      
      var valor = $('#producto').val();
      $.ajax({
              url: '/unidadProducto',
              type: 'POST',
              data: {
                "_token": "{{ csrf_token() }}",
                valor: valor,
              },
              success: function(data) {
                //console.log(data);;
                //console.log(re.datos[0].unidad);
                var re = JSON.parse(data);
                
                $('#cantidadP').val(re.datos[0].unidad);
              }
          
          });
    }
    </script>

@endsection