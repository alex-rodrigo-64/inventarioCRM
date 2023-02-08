@extends('adminlte::page')
@section('content')
@php
{{$texto = strtoupper($sucursal->nombre_sucursal);}}
@endphp
<br>
<h1 align="center" style="font-weight: 700">INVENTARIO DE {{$texto}}</h1>

<div class="card">
    <div class="card-body">

        <a href="/inventario">
            <button type="button" class="btn btn-secondary">
                <i class="fas fa-arrow-alt-circle-left"></i>
            </button>
        </a>

        <div class="row ">
            @foreach ($almacenes as $item)
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-body text-left">
                            <a href="{{ url('/inventario/almacen/'.$item->id) }}">
                                @php
                                {{$codigo = App\Models\Inventario::randomColor();}}
                                @endphp   
                                <button class="btn btn-primary btn-lg" style='width:300px; height:100px;border-color: #4d441e7c ; background: linear-gradient(100deg, #f7f9fd, {{$codigo}});'>
                                    <b class="text-dark">
                                        <FONT SIZE=6>{{$item->nombre_almacen}}</font>
                                    </b>    
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


@endsection