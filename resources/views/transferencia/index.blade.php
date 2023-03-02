@extends('adminlte::page')
@section('content')

<h1 align="center" style="font-weight: 700">SOLICITAR PRODUCTO</h1>

<div class="card">
    <div class="card-body">
        <br>

        <form action="{{url('/transferencias')}}" id="formulario" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="input-group">
                  <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Sucursal Origen</span>
                  <select name="sucursalOrigen" id="sucursalOrigen"  required onchange="sucursalAlmacen()"
                    class="form-control" >
                    <option selected value="" disabled>Elige una Sucursal</option>
                    @foreach ($sucursal as $sucursal)
                            <option   value="{{$sucursal->nombre_sucursal}}"> {{$sucursal->nombre_sucursal}}</option>
                    @endforeach
                    </select>
                </div>
              <span id="estadoNombre"></span>
            </div>
                <div class="col-1.5">
                    <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue"><b>SOLICITA</b></span>
                </div>
            
            <div class="col-5">
                <div class="input-group">
                    <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Sucursal Destino</span>
                    <select name="sucursalDestino" id="sucursalDestino" required
                    class="form-control" >
                    <option selected value="" disabled>Elige una Sucursal de Destino</option>
                    @foreach ($sucursales as $sucursal)
                        <option   value="{{$sucursal->nombre_sucursal}}"> {{$sucursal->nombre_sucursal}}</option>
                    @endforeach  
                    </select>               
                </div>
                <span id="estadoRol"></span>
            </div>
        </div>

        <br> 
        <div class="row justify-content-center">
            <div class="col-5" >
                <div class="input-group">
                  <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Almacen</span>
                  <select name="almacen" id="almacen"  required
                    class="form-control" >
                    <option selected value="" disabled>Elige una Sucursal de Origen</option>
                    </select>
                </div>
            </div>
            <div class="col-1" ></div>
            <div class="col-5" ></div>
        </div>

        <br>
        <div class="row justify-content-center">
            <div class="col-5" >
                <div class="input-group">
                  <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Nombre del Producto</span>
                  <input type="text" name="nombreProducto" id="nombreProducto" required value="{{ old('Nombre') }}" class="form-control" onkeyup="validarNombre()" placeholder="Nombre de Producto" tabindex="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209)) ">
                </div>
              <span id="estadoNombre"></span>
            </div>
            <div class="col-5">
                <div class="input-group">
                  <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Cantidad</span>
                    <input type="text" id="cantidad" name="cantidad" class="form-control text-center"
                required   onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                  <select name="cantidadP" required id="cantidadP" class="form-control">
                    <option disabled value="" selected>Seleccione una Unidad</option>
                    @foreach ($unidad as $unidad)
                          <option value="{{$unidad->nombre_unidad}}">{{$unidad->nombre_unidad}}</option>
                        @endforeach
                  </select> 
                </div>
              </div>
              <div class="col-1" ></div>
        </div>
        <br>
        <div class="row justify-content-center">

            <div class="col-11">
                <label style="font-size: 16px;">Detalle</label>
                        <br>
                        <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px" name="detalle" id="detalle" cols="140" rows="4"></textarea>

            </div>
       
        </div>
        


      </div>

      <div class="text-center">
            <button class="btn btn-success my-2 my-sm-0" type="submit" >Enviar</button>
      </div>
        
      <br>
     
    </form>
    </div>
</div>


    <script>

        function sucursalAlmacen() {
            var sucursal = $("#sucursalOrigen").val();
            //console.log(sucursal);
            $.ajax({
                url: "/transferencias/solicitar",
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
                    $("#almacen").append("<option value='' selected disabled>Seleccione un  Almacen</option>");
                    dataResult.data.forEach(element => {
                    //console.log(element.nombre_almacen);
                    $("#almacen").append("<option value='"+element.nombre_almacen+"'>"+element.nombre_almacen+"</option>");
                    });
                    
                }
            });
        }

    </script>

@endsection