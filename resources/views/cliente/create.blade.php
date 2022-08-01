@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700">REGISTRAR NUEVO CLIENTE</h1>



<body>
 <div class="card">
   
     <div class="card-body">
  
            <form action="{{url('/cliente/nuevo')}}" id="formulario" method="POST">
              @csrf
              <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <label for="nombre" style="justify-content-center;">Nombre del cliente</label>
                        <input type="text" name="nombreCliente" id="nombreCliente" required value="{{ old('Nombre') }}" class="form-control" onkeyup="validarNombre()" placeholder="Nombre" tabindex="1" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)) ">
                        <span id="estadoNombre"></span>
                      </div>
                      <div class="col-3">
                        <label for="nombre" style="justify-content-center;"> &nbsp;</label>
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">VAT ID</span>
                        <input type="text" id="vat" name="vat" class="form-control" onkeyup="mayus(this);"
                          required onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-6">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Dirección</span>
                        <input type="text" id="direccion" name="direccion" class="form-control" 
                          required onkeyup="validarDireccion()" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)  || (event.charCode == 32) || (event.charCode == 46))">
                        </div>
                        <span id="estadoDireccion"></span>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Número</span>
                        <input type="text" id="numero" name="numero" class="form-control" 
                          required onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">APT</span>
                        <input type="text" id="apt" name="apt" class="form-control" 
                          required onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-4">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Codigo Postal</span>
                        <input type="text" id="postal" name="postal" class="form-control" 
                          required onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))">
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">PAK</span>
                        <input type="text" id="pak" name="pak" class="form-control" 
                          required onkeyup="" autocomplete="off" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57)   )">
                        </div>
                      </div>
                      <div class="col-5">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Nombre de Ciudad</span>
                        <input type="text" id="ciudad" name="ciudad" class="form-control" 
                          required onkeyup="validarCiudad()" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">
                         </div>
                         <span id="estadoCiudad"></span>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-6">
                        <div class="input-group">
                          <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Pais</span>
                        <input type="text" id="pais" name="pais" class="form-control" 
                          required onkeyup="validarPais()" autocomplete="off" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode == 241) || (event.charCode == 209))">
                        </div>
                        <span id="estadoPais"></span>
                      </div>
                      <div class="col-6">
                        <div class="input-group">
                          <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Idioma</span>
                          <select name="idioma" id="idioma"class="form-control" >
                            <option value="español">Español</option>
                            <option value="ingles">Ingles</option>
                            <option value="frances">Frances</option>
                            <option value="chino">Chino</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div> 
                </div>

                <div class="card">
                  <div class="card-body">
                    <h4><strong>Detalles</strong></h4>
                    &nbsp;&nbsp;&nbsp;&nbsp;<td class="btn-block"><button type="button" id="adicional" name="adicional" class="btn btn-primary" style="border-radius: 50%;">
                     <i class="fa fa-plus"></i> </button>
                    </td>
                        <div class="table-responsive">
                      <table class="table" id="tabla">
                          <thead class="thead">
                              
                          </thead>
                          <tbody id="tabla">
                              <span id="estadoBoton"></span>
                              <tr id="columna-0">
                                  <td>
                                      <div class="input-group">
                                        <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Tipo</span>
                                          <select name="tipo[]" id="tipo" class="form-control country"  required>
                                            <option value="correo">Correo Electrónico</option>
                                            <option value="telefono">Telefono</option>
                                            <option value="celular">Celular</option>
                                            <option value="skype">Skype</option>
                                          </select>
                                      </div>
                                  </td>
                                  <td>
                                    <div class="input-group">
                                      <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Valor</span>
                                        <input type="text" class="form-control" onkeyup="validarCorreo()" name="valor[]"id="valor">
                                    </div>
                                    <span id="estado"></span>
                                  </td>
                                  <td>
                                    <div class="input-group">
                                      <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Nombre</span>
                                        <input type="text" class="form-control " name="nombre[]"id="nombre"
                                        onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))">
                                    </div>
                                  </td>
                                  <td class='borrar'>
                                      <button class='btn btn-icon btn-danger' type='button' id='deletRow' name='deletRow'>
                                      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                      <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                      <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                      </svg>
                                      </button>
                                    </td>
                              </tr>
                  
                          </tbody>
                      </table>
                      <div class="div text-center">
                        <span id="estadoTabla"></span>
                      </div>
                  </div>
                  </div>
                  
                </div>


                <label style="font-size: 16px;">Nota</label>
                <br>
                <textarea class="embed-responsive form-control " style="resize: none;padding-left: 20px;padding-top: 20px" name="nota" id="nota" cols="140" rows="4"></textarea>



              </div>

              <div class="form-group">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="" class="btn btn-warning my-2 my-sm-0">Resetear</a>
              
                <button class="btn btn-success" type="submit" onclick="enviarOrden()" >Guardar y Crear Orden</button>

                <button class="btn btn-success my-2 my-sm-0" type="submit" onclick="enviarCliente()" >Guardar</button>
              </div> 
      </div>
                

      </form>
                

</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>script>
<script src="{{ asset('js/cliente/create.js')}}"></script>
<link rel="stylesheet" href="{{ URL::asset('estilos/style.css') }} ">
  

@endsection