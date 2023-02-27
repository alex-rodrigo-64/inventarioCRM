@extends('adminlte::page')
@section('content')
<br>
<h1 align="center" style="font-weight: 700">INVENTARIO</h1>


<div class="card">
    <div class="card-body">
        <div class="row ">
            @foreach ($arreglo as $item)
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-body text-left">
                            <a href="{{ url('/inventarios') }}">
                                @php
                                {{$codigo = App\Models\Inventario::randomColor();}}
                                @endphp   
                                <button class="btn btn-primary btn-lg" style='width:300px; height:100px;border-color: #4d441e7c ; background: linear-gradient(100deg, #f7f9fd, {{$codigo}});'>
                                    <b class="text-dark">
                                        <FONT SIZE=6>{{$item[0]->nombre_sucursal}}</font>
                                    </b>    
                                </button>
                            </a>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" 
                                style="width: 300px;color: black;background: linear-gradient(100deg, #f7f9fd, {{$codigo}});" aria-haspopup="true"  aria-expanded="false">
                                <FONT SIZE=3>Almacenes</font>
                                </button>
                                <div class="dropdown-menu" style="width: 300px;background: linear-gradient(100deg, #f7f9fd, {{$codigo}});" aria-labelledby="dropdownMenuButton">
                                    @for ($i = 1; $i <= $item['contador']; $i++)
                                        <a class="dropdown-item" href="{{ url('/inventarios/almacen/'.$item[$i]->id) }}">{{$item[$i]->nombre_almacen}}</a>
                                    @endfor  
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
</div>




<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script>
        
    </script>

@endsection