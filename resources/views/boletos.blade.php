@extends('plantilla')

@section('title', 'Central de autobuses')

@section('content')

    <br><br>
    <center><div class="row">
        <div class="col s0 m3"></div>
        <div class="col s4 m1">
            <img src="{{asset('imagenes/icons8-ubicación-100(2).png')}}" class="circle reponsive-img" style="max-height: 50px;"> 
        </div>
        <div class="col s4 m1">
            <span class="material-icons center"> east </span>
        </div>
        <div class="col s4 m1">
            <img src="{{asset('imagenes/icons8-marca-de-verificación-64(1).png')}}" class="circle reponsive-img" style="max-height: 50px; border: 1px solid grey;"> 
        </div>
        <div class="col s4 m1">
            <span class="material-icons center"> east </span>
        </div>
        <div class="col s4 m1">
            <img src="{{asset('imagenes/icons8-asiento-96 - copia.png')}}" class="circle reponsive-img" style="max-height: 50px; border: 1px solid grey;"> 
        </div>
        <div class="col s4 m1">
            <span class="material-icons center"> east </span>
        </div>
        <div class="col s4 m1" >
            <img src="{{asset('imagenes/icons8-pago-100.png')}}" class="circle reponsive-img" style="max-height: 50px; border: 1px solid grey;"> 
        </div>
    </div></center>

    <div class="row container "> 
        <form class="col s12 m6" method="post" action="#">
            <div class="row section" style="border: solid 1px black;">
                <div class="col s12"><b>Datos del cliente</b></div>
                <div class="col s12 container">
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input id="nombre" type="text" value="{{ old('nombre') }}" name="nombre" class="validate" required>
                            <label for="nombre">Nombre:</label>
                            <strong style="color: red;">@error('nombre') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="apellidos" type="text" value="{{ old('apellidos') }}" name="apellidos" class="validate" required>
                            <label for="apellidos">Apellidos:</label>
                            <strong style="color: red;">@error('apellidos') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="correo" name="correo" type="email" value="{{ old('correo') }}" class="validate" required
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un correo electronico valido">
                            <label for="correo">Correo electronico:</label>
                            <strong style="color: red;">@error('correo') {{ $message }} @enderror</strong> 
                        </div>

                        <div class="input-field col m6 s12">
                            <input id="telefono" name="telefono" type="tel" value="{{ old('telefono') }}" class="validate" required
                            pattern="[0-9]{10,10}" title="El telefono debe contener una longitud de 10 digitos">
                            <label for="telefono">Telefono:</label>
                            <strong style="color: red;">@error('telefono') {{ $message }} @enderror</strong> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="row section" style="border: solid 1px black;">
                <div class="col s12"><b>Pasajeros</b></div>
                <input type="hidden" name="numPasajeros" value="{{session('ninos') + session('adultos')}}">
                @for ($i = 1; $i <=session('adultos'); $i++)
                    <div class="col s12 divider"></div>
                    <div class="row">
                        <div class="col s12"><h6 style="color: #2e7d32;"> PASAJERO {{$i}} - ADULTO </h6></div>
                        <div class="input-field col m6 s12">
                            <input id="nombre_{{$i}}" type="text" value="{{ old('nombre_$i') }}" name="nombre_{{$i}}" class="validate" required>
                            <label for="nombre_{{$i}}">Nombre:</label>
                            <strong style="color: red;">@error('nombre_$i') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="apellidos_{{$i}}" type="text" value="{{ old('apellidos_$i') }}" name="apellidos_{{$i}}" class="validate" required>
                            <label for="apellidos_{{$i}}">Apellidos:</label>
                            <strong style="color: red;">@error('apellidos_$i') {{ $message }} @enderror</strong> 
                        </div>
                    </div>
                @endfor
                @for ($i=session('adultos') + 1; $i <=session('ninos') + session('adultos'); $i++)
                    <div class="col s12 divider"></div>
                    <div class="row">
                        <div class="col s12"><h6 style="color: #2e7d32;"> PASAJERO {{$i}} - NIÑO </h6></div>
                        <div class="input-field col m6 s12">
                            <input id="nombre_{{$i}}" type="text" value="{{ old('nombre_$i') }}" name="nombre_{{$i}}" class="validate" required>
                            <label for="nombre_{{$i}}">Nombre:</label>
                            <strong style="color: red;">@error('nombre_$i') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="apellidos_{{$i}}" type="text" value="{{ old('apellidos_$i') }}" name="apellidos_{{$i}}" class="validate" required>
                            <label for="apellidos_{{$i}}">Apellidos:</label>
                            <strong style="color: red;">@error('apellidos_$i') {{ $message }} @enderror</strong> 
                        </div>
                    </div>
                @endfor
            </div>
        </form>
        <div class="col s12 m6">

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        console.log(localStorage.getItem('costo'));
    </script>
@endsection