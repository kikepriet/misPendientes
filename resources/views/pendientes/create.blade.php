@extends('../layouts.app')

@section('content')
    <form method="post" action="{{ url('/pendientes') }}">
        {{ csrf_field() }}
        
        <div class="form-group mt-3">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class=" form-control" autofocus>
        </div>

        <div class="form-group mt-2">
            <label for="descripcion">Descripcion:</label>
            <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
        </div>
        
        <div class="form-group mt-2">
            <label for="observaciones">Observaciones:</label>
            <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="10"></textarea>
        </div>
    
        <div class="form-group mt-2">
            <select class="form-control" name="status" id="status" disabled>
                <option value="FFFF00">Pendiente</option>
                <option value="00FF00">Listo</option>
            </select>
        </div>

        <div class="form-group mt-2">
            <select class="form-control" name="activo" id="status" disabled>
                <option value="1">Visible</option>
                <option value="0">No Visible</option>
            </select>
        </div>        

        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Crear">
        </div>
    </form>
@endsection