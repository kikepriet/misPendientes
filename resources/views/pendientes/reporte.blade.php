@extends('../layouts.app')

@section('content')
<div class="container">
<h1>{{ date('F j, Y') }}</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Acción</th>
            <th scope="col">Creado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th scope="col">Actualizado</th>
            <th scope="col">diferencia</th>
            <th scope="col">Descripción</th>
            <th scope="col">Observaciones</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pendientes as $pendiente)
          <tr>
          <td>{{ $pendiente->id }}</td>
          <td>{{ $pendiente->nombre }}</td>
          <td>{{ $pendiente->created_at }}</td>
          <td>{{ $pendiente->updated_at }}</td>
          <td><?php 
                    if($pendiente->status == "00FF00"){
                    $hora1 = strtotime($pendiente->created_at);
                    $hora2 = strtotime($pendiente->updated_at);
                    $result = ($hora2 - $hora1)/60/60;
                    echo round($result)." hrs.";
                    } else {
                      echo "--";
                    }
              ?></td>
          <td>{{ $pendiente->descripcion }}</td>
          <td>{{ $pendiente->observaciones }}</td>
          <td>
                @php
                    if($pendiente['status'] == "00FF00"){
                        echo "Listo";
                    }
                    else{
                        echo "Pendiente";
                    }
                @endphp 
          </td>
          </tr>
          @endforeach
        </tbody>
    </table>

</div>

@endsection