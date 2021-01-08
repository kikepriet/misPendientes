@extends('../layouts.app')

@section('content')
<form method="post" action="{{ url('/pendientes/' . $pendiente->id) }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }} <!-- Enviamos la info al método update -->
    
        {{-- <label for="{{ 'nombre' }}">Nombre</label>
        <input type="text" name="nombre" value="{{ $pendiente->nombre }}">
        <br>
    
        <label for="{{ 'descripcion' }}">Descripcion</label>
        <input type="text" name="descripcion" value="{{ $pendiente->descripcion }}">
        <br>
    
        <label for="{{ 'status' }}">Estatus</label>
        <input type="text" name="status" value="{{ $pendiente->status }}">
        <br>
    
        <label for="{{ 'observaciones' }}">Observaciones</label>
        <input type="text" name="observaciones" value="{{ $pendiente->observaciones }}">
        <br>
    
        <label for="{{ 'activo' }}">Activo</label>
        <input type="text" name="activo" value="{{ $pendiente->activo }}">
        <br>
    
        
        <input type="submit" value="Modidficar"> --}}
    
        <div class="form-group mt-3">
            <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" class=" form-control" value="{{ $pendiente->nombre }}">
        </div>
    
        <div class="form-group mt-2">
            <label for="descripcion">Descripcion:</label>
            <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10">{{ $pendiente->descripcion }}</textarea>
        </div>
        
        <div class="form-group mt-2">
            <label for="observaciones">Observaciones:</label>
        <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="10">{{ $pendiente->observaciones }}</textarea>
        </div>
    
        <div class="form-group mt-2">
            <select class="form-control" name="status" id="status">
                <option value="FFFF00">Pendiente</option>
                <option value="00FF00">Listo</option>
            </select>
        </div>
        
        <div class="row">
            <div class="col">
                <input type="text" name="created_at" id="nombre" class=" form-control" value="{{ $pendiente->created_at }}" disabled>
            </div>
            <div class="col">
                <input type="text" name="updated_at" id="nombre" class=" form-control" value="{{ $pendiente->updated_at }}" disabled>
            </div>
        </div>
        
        <div class="form-group mt-3">
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Modificar">
        </div>
    
    </form>
@endsection