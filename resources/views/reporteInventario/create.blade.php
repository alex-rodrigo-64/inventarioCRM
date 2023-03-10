@extends('adminlte::page')
@section('content')
<h1 align="center" style="font-weight: 700"> NUEVO REPORTE DE INVENTARIO</h1>
<body>
        <div class="card">
            <div class="card-body">
                <br>
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row justify-content-center">
                            <div class="col-5">
                                <div class="input-group">
                                    <span class="input-group-text"  style=" background:rgb(29, 145, 195); color: aliceblue">Fecha de Inicio</span>
                                    <input type="date" name="fechaInicio" id="fechaInicio" required class="form-control" >
                                </div>
                                <span id="estadoNombre"></span>
                            </div>
                            <div class="col-5">
                                <div class="input-group">
                                    <span  class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Fecha Final</span>
                                    <input type="date" name="fechaFin" id="fechaFin" required class="form-control" >        
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
                                <div class="col-1">
                                    <button class='btn btn-icon btn-success' type='button' id='guardar' name='guardar'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                        </svg>
                                        </button>
                                </div>
                         </div>
                    </div>
                </div>
                <div class="card">
            <div class="card-body">
    
            <div class="row justify-content-center">
                <table class="table table-light" id="tablaReportes">
                    <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                        <tr>
                        <th class="text-center" >Sucursal</th>
                        <th class="text-center" >Almacen</th>
                        <th class="text-center" >Fecha Inicio</th>
                        <th class="text-center" >Fecha Fin</th>
                        <th class="text-center" style="width: 15%"></th>
                        </tr>
                    </thead>
                    <tbody class="table-bordered" id="reportesBuscados">
                        <tr>
                        
                        <tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
            </div>
        </div>
        <br>
        
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
    ///

    $("#guardar").on('click',function(){

        var url1 = $('#fechaInicio').val();
        var url2 = $('#fechaFin').val();
        var url3 = $('#sucursal').val();
        var url4 = $('#almacen').val();
        
          //console.log(url1);
                $.ajax({
                    url: "/reporte/nuevoReporte",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        fechaInicio: url1,
                        fechaFin: url2,
                        sucursal: url3,
                        almacen: url4,
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        console.log(dataResult.data);

                        if (dataResult.data == true) {

                            $('#tablaReportes > tbody').empty();

                             var nuevafila= "<tr><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                            url3  + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                            url4  + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                            url1  + "</td><td class='text-center' style= 'background: rgb(209, 244, 255)'>" +
                           url2  + 
                            "</td><td class='text-center' style='width: 3%;background: rgb(209, 244, 255)' >" +
                                '<a href="{{url('/reporte/showReporte/inventario')}}'+'/'+url4+'/'+url1+'/'+url2+'">'+
                            '<button class="btn btn-light-active btn-sm d-inline">'+
                                '<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512" width="18" height="20"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->'+
                                '<path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>'+
                                '</svg>'+
                            '</button>'+
                           ' </a> '+
                           '<a href="">'+
                                '<button class="btn btn-light-active btn-sm d-inline" style="padding:3px">'+
                                    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(255, 0, 0)" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">'+
                                    '<path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>'+
                                    '<path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>'+
                                    '</svg>'+
                                '</button>'+
                            '</a>'+


                        "</td></tr>"
                        
                        $("#reportesBuscados").append(nuevafila);
                    

                        $("#fechaInicio").val('dd/mm/aaaa'); 
                        $("#fechaFin").val('dd/mm/aaaa');
                        $("#sucursal").val('Elige una Sucursal');
                        $("#almacen").val('Almacenes Disponibles');
                        } 
                        

                            
                         
                    }
                });
        });
        //
</script>
@endsection