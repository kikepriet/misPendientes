@extends('../layouts.app')

@section('content')
<div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($pendientes as $pendiente)
                        <a href="{{ url('/pendientes/' . $pendiente->id . '/edit') }}">
                            <div class="grid-container">
                            <div class="item1" style="background: #{{ $pendiente->status }}">&nbsp;&nbsp;&nbsp;</div>
                            <div class="item2"><strong>{{ $pendiente->nombre }}</strong></div>
                            <div class="item3">{{ $pendiente->descripcion }}</div>
                            </div>
                        </a>
                    @endforeach 

                    @if(count($pendientes) == 0)
                        <h1 class="text-center">No tienes pendientes</h1>
                        <h4 class="text-center">Puedes iniciar por agregar uno</h4>
                    @endif                                    

                </div>
@endsection