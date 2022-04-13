<div class="right_col" role="main">
    <div class="">
        <!--@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
        @isset($clase)
            <div class="page-title">
                <div class="title_left">
                    <h3>Agregar clase</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <form action="/clase/{{ $clase->id }}" method="POST">
            @method('PATCH')
        @else
            <div class="page-title">
                <div class="title_left">
                    <h3>Agregar clase</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <form action="/clase" method="POST">
        @endisset
        <form action="/clase/create" method="GET">
            @csrf
            <br>
            <label for="nombre">Nombre: </label><br>
            <textarea name="nombre" id="nombre" cols="30" rows="5">{{isset($clase) ? $clase->nombre :''}}{{old('nombre')}}</textarea><br>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="descripcion">Descripcion: </label><br>
            <textarea name="descripcion" id="descripcion" cols="30" rows="5">{{isset($clase) ? $clase->descripcion :''}}{{old('descripcion')}}</textarea><br>
            @error('descripcion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="submit" value="Guardar">
        </form>
    </div>
</div>
