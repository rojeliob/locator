@extends('layouts.app')

@section('content')
<!-- {{ $city }} -->
<div class="container" style="margin-top: 10px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm">
                            Ciudades
                        </div>
                        <div class="col-sm text-end">
                            <form method="GET" action="{{  route('city.create')}}">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    Crear
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Provincia</th>
                                    <th scope="col">Creado</th>
                                    <th scope="col">Modificado</th>
                                    <th scope="col"> Acciones </th>
                                    <th scope="col"> Eliminar </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($city as $citi)
                                <tr>
                                    <th scope="row">{{$citi->id}}</th>
                                    <td>{{$citi->name}}</td>
                                    <td>{{$citi->province->name}}</td>
                                    <td>{{$citi->created_at}}</td>
                                    <td>{{$citi->updated_at}}</td>
                                    <td>
                                        <form action="{{ route('city.edit', $citi) }}" method="GET">

                                            @csrf
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="bi bi-pen"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('city.destroy', $citi) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-primary"
                                                onclick="return confirm('Seguro de eliminar la citi?')"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {!! $city->links() !!}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection