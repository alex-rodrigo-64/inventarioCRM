@extends('adminlte::page')

@section('content_header')
    <h1 align="center"><strong>REGISTRAR NUEVO DISCO</strong></h1>
@stop

@section('content')

<style>
  span {
              text-transform: capitalize;
              }
          .error{
              color:#cf1111;
              font-size: medium;
          }
          .bien{
               color: rgb(15, 208, 67);
              font-size: medium;
          }
</style>
<script>
 function validarModelo(){
  if($("#modelo").val() == ""){
    $("#estadoModelo").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>");
  }else{
        if ($("#modelo").val().length < 5) {
            $("#estadoModelo").html("<span  class='error'><h5 class='menor'>Ingrese de 5 hasta 40 caracteres</h5></span>");
        }else{
            if($("#modelo").val().length > 40) {
                $("#estadoModelo").html("<span  class='error'><h5 class='menor'>Ingrese menos de 40 caracteres</h5></span>");
            }else{
                    $("#estadoModelo").html("<span  class='bien'><h5 class='menor'> Modelo Válido </h5></span>");
            }
        } 
  }
}
function validarSerie(){
  if($("#numero_de_serie").val() == ""){
    $("#estadoSerie").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
        if ($("#numero_de_serie").val().length < 5) {
            $("#estadoSerie").html("<span  class='error'><h5 class='menor'>Ingrese de 5 hasta 40 caracteres</h5></span>");
        }else {
            if ($("#numero_de_serie").val().length > 40) {
                $("#estadoSerie").html("<span  class='error'><h5 class='menor'>Ingrese menos de 40 caracteres</h5></span>");
            }else {
                    $("#estadoSerie").html("<span  class='bien'><h5 class='menor'> Numero de serie Válido </h5></span>");
            }
        } 
  }
}
function validarFirmware(){
  if($("#firmware").val() == ""){
    $("#estadoFirmware").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
        if ($("#firmware").val().length < 5) {
            $("#estadoFirmware").html("<span  class='error'><h5 class='menor'>Ingrese de 5 hasta 40 caracteres</h5></span>");
        }else {
            if ($("#firmware").val().length > 40) {
                $("#estadoFirmware").html("<span  class='error'><h5 class='menor'>Ingrese menos de 40 caracteres</h5></span>");
            }else {
                    $("#estadoFirmware").html("<span  class='bien'><h5 class='menor'> Firmware Válido </h5></span>");
            }
        } 
  }
}
function validarCapacidad(){
  if($("#capacidad").val() == ""){
    $("#estadoCapacidad").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoCapacidad").html("<span  class='bien'><h5 class='menor'>Válido</h5></span>");
        
  }
}
function validarPbc(){
  if($("#pbc").val() == ""){
    $("#estadoPbc").html("<span  class='error'><h5 class='menor'>Este campo no puede estar vacío</h5></span>"); 
  }else{
      $("#estadoPbc").html("<span  class='bien'><h5 class='menor'>Válido</h5></span>");
        
  }
}
</script>

<div class="card">
    <div class="container">
    <form class="m-3" action="{{ url('/inventario/nuevo') }}" method="post">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-6" style="padding-top: 32px">
              <div class="input-group">
                <span class="input-group-text" style="background:rgb(2, 117, 216); color: aliceblue">Fabricante</span>
                  <select name="manufactura" class="form-control" class="btn-block" required>
                    <option value="">Elija el Fabricante</option>
                    <option value="Seagate">Seagate</option>
                    <option value="Toshiba">Toshiba</option>
                    <option value="Samsung">Samsung</option>
                    <option value="Verbatim">Verbatim</option>
                    <option value="Wester Digital">Western Digital</option>
                    <option value="SkayNet">SkyNet</option>
                    <option value="Maxtor">Maxtor</option>
                    <option value="Adata">Adata</option>
                    <option value="Crucial">Crucial</option>
                    <option value="Kingston">Kingston</option>
                    <option value="Sony">Sony</option>
                    <option value="Hitachi">Hitachi</option>
                    <option value="Asus">Asus</option>
                  </select>
                  <span id="estadoManufactura"></span>
              </div>
        </div>
        <div class="form-group col-md-6 pb-17">
            <label for="inputPassword4">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Ingrese el modelo"
                   value="{{ old('modelo') }}" onkeyup="validarModelo()" required>
                 <span id="estadoModelo"></span>
        </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">Numero de Serie</label>
            <input type="text" class="form-control" id="numero_de_serie" name="numero_de_serie"
                   placeholder="Ingrese un numero de serie" value="{{ old('numero_de_serie') }}" onkeyup="validarSerie()" required>
                  <span id="estadoSerie"></span>
          </div>
          <div class="form-group col-md-4">
              <label for="inputCity">Firmware</label>
              <input type="text" class="form-control" id="firmware" name="firmware"
                      placeholder="Ingrese el firmware" value="{{ old('firmware') }}" onkeyup="validarFirmware()" required>
                      <span id="estadoFirmware"></span>
          </div>
            <div class="form-group col-md-4">
              <label for="inputCity">Capacidad</label>
              <input type="number" class="form-control" id="capacidad" name="capacidad" placeholder="Ingrese la capacidad en GB"
              value="{{ old('firmware') }}" onkeyup="validarCapacidad()" required>
              <span id="estadoCapacidad"></span>
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">PCB</label>
            <input type="text" class="form-control" id="pbc" name="pbc" placeholder="Ingrese la placa del disco"
                    value="{{ old('pbc') }}" onkeyup="validarPbc()" required>
                  <span id="estadoPbc"></span>
          </div>
          <div class="form-group col-md-4">
              <label for="inputCity">Ubicación *</label>
              <input type="text" class="form-control" id="ubicacion" name="ubicacion" placeholder="Ingrese la ubicación">
          </div>
          <div class="form-group col-md-4" style="padding-top: 32px">
            <div class="input-group">
              <span class="input-group-text" style="background:rgb(2, 117, 216); color: aliceblue">Factor de Forma</span>
                <select class="form-control" class="btn-block" id="factor_de_forma" name="factor_de_forma" required>
                  <option value="">Elija el Factor de Forma</option>
                  <option value="3.5 pulgadas ">3.5 pulgadas</option>
                  <option value="2.5 pulgadas">2.5 pulgadas</option>
                  <option value="M2">M2</option>
                </select>
            </div>
        </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">Nota <strong>*</strong></label>
            <input type="text" class="form-control" id="nota" name="nota" placeholder="Ingrese una nota del disco">
          </div>
          <div class="form-group col-md-4">
              <label for="inputCity">Cabezal <strong>*</strong></label>
              <input type="text" class="form-control" id="cabecera" name="cabecera" placeholder="Ingrese el cabezal del disco">
          </div>
            <div class="form-group col-md-4">
              <label for="inputCity">Información del cabezal <strong>*</strong></label>
              <input type="text" class="form-control" id="info_de_cabecera" name="info_de_cabecera"
                     placeholder="Ingrese información acerca del cabezal">
          </div>
          <span class="mb-4"><strong>*</strong> Campos Opcionales</span>
      </div>
        <div class="form-group">
          <button type="submit" class="btn btn-lg btn-secondary" style="background:rgb(2, 117, 216); color: aliceblue">Registrar</button>
        </div>
    </div>
    </form>
  </div>
  </div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop