<div class="card">
    <div class="card-body">
      <h6 class="row justify-content-center"><strong>AGREGAR TIPO DE UNIDAD</strong></h6>

      <div class="row justify-content-center">
            <div class="col-4">
                <div class="input-group">
                    <span class="input-group-text" style=" background:rgb(29, 145, 195); color: aliceblue">Nombre de Unidad</span>
                    <input type="text" class="form-control " name="nombreUnidad"id="nombreUnidad"
                    onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32) || (event.charCode >= 48 && event.charCode <= 57))">
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
        <table class="table table-light" id="tablaUnidad">
            <thead class="table table-striped table-bordered text-white" style="background:rgb(2, 117, 216); color: aliceblue">
                <tr>
                  <th class="text-center" style="width: 500px">Nombre de Unidad</th>
                </tr>
              </thead>
            <tbody class="table-bordered" id="unidadesGuardadas">
                <tr>
                
                <tr>
            </tbody>
        </table>
    </div>
     
    
  </div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script>
    
    $(document).ready(function() {
      
        
        });


        $("#guardar").on('click',function(){
            var url1 = $('#nombreUnidad').val();

            $('#nombreUnidad').val('');
           // console.log(url1);
                $.ajax({
                    url: "/configuracion/agregarTipoUnidad",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": "id",
                        nombreUnidad: url1,
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        //console.log(dataResult);
                       
                    }
                });
        });


    function eliminarServicio(id){
      $.ajax({
                    url: "",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                    },
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        //console.log(dataResult);
                        verServicio();
                        $('#exampleModals'+id).modal('hide')
                    }
                });
    }
  </script>