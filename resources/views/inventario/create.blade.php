@extends('adminlte::page')

@section('content_header')
    <h1 align="center"><strong>REGISTRAR NUEVO DISCO</strong></h1>
@stop

@section('content')

<style>
  span {
              text-transform: capitalize;
              }

          .card1  {

              background: linear-gradient(100deg, #5f8ab6, rgb(234, 234, 236));
              
          }
          .card2  {

              background: linear-gradient(100deg, #1b5794, rgb(234, 234, 236));
              
          }
          .menor{
              color:#2d05f2;
              font-size: medium;
          }
</style>
<script>
 function validarModelo() {

if($("#modelo").val() == ""){
  $("#estadoModelo").html("<span  class='menor'><h5 class='menor'> </h5></span>");
 }else{
      if ($("#modelo").val().length < 3) {
          $("#estadoModelo").html(
              "<span  class='menor'><h5 class='menor'>Ingrese de 5 a 50 caracteres</h5></span>");
      } else {
          if ($("#modelo").val().length > 50) {
              $("#estadoModelo").html(
                  "<span  class='menor'><h5 class='menor'>Ingrese menos de 50 caracteres</h5></span>");
          } else {
              
                  $("#estadoModelo").html("<span  class='menor'><h5 class='menor'> </h5></span>");
          }
      } 
}
}
</script>

<div class="card">
    <div class="container">
    <form class="m-3" action="{{ url('/inventario/nuevo') }}" method="post">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Fabricante</label>
          <input type="text" class="form-control" id="manufactura" name="manufactura" placeholder="">
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Modelo</label>
          <input type="text" class="form-control" id="modelo" name="modelo" placeholder=""
                 value="{{ old('modelo') }}" onkeyup="validarModelo()">
                 <span id="estadoModelo"></span>
        </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">Numero de Serie</label>
            <input type="text" class="form-control" id="numero_de_serie" name="numero_de_serie">
          </div>
          <div class="form-group col-md-4">
              <label for="inputCity">Firmware</label>
              <input type="text" class="form-control" id="firmware" name="firmware">
          </div>
            <div class="form-group col-md-4">
              <label for="inputCity">Capacidad</label>
              <input type="text" class="form-control" id="capacidad" name="capacidad">
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">PBC</label>
            <input type="text" class="form-control" id="pbc" name="pbc">
          </div>
          <div class="form-group col-md-4">
              <label for="inputCity">Ubicación</label>
              <input type="text" class="form-control" id="ubicacion" name="ubicacion">
          </div>
            <div class="form-group col-md-4">
              <label for="inputCity">Factor de Forma</label>
              <input type="text" class="form-control" id="factor_de_forma" name="factor_de_forma">
          </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputCity">Nota</label>
            <input type="text" class="form-control" id="nota" name="nota">
          </div>
          <div class="form-group col-md-4">
              <label for="inputCity">Cabecera</label>
              <input type="text" class="form-control" id="cabecera" name="cabecera">
          </div>
            <div class="form-group col-md-4">
              <label for="inputCity">Info de Cabecera</label>
              <input type="text" class="form-control" id="info_de_cabecera" name="info_de_cabecera">
          </div>
      </div>
        <div class="form-group">
          <button type="submit" class="btn btn-lg btn-secondary">Registrar</button>
        </div>
    </div>
    </form>
  </div>
  </div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop