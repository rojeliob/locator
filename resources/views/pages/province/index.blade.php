@extends('layouts.app')

@section('content')
<!-- {{ $province }} -->
<div class="container" style="margin-top: 10px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm">
                            Provincias
                        </div>
                        <div class="col-sm text-end">
                            <form method="GET" action="{{  route('province.create')}}">
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
                                    <th scope="col">Creado</th>
                                    <th scope="col">Modificado</th>
                                    <th scope="col"> Acciones </th>
                                    <th scope="col"> Eliminar </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($province as $provincia)
                                <tr>
                                    <th scope="row">{{$provincia->id}}</th>
                                    <td>{{$provincia->name}}</td>
                                    <td>{{$provincia->created_at}}</td>
                                    <td>{{$provincia->updated_at}}</td>
                                    <td>
                                        <form action="{{ route('province.edit', $provincia) }}" method="GET">
                                            @csrf
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="bi bi-pen"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('province.destroy', $provincia) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-primary"
                                                onclick="return confirm('Seguro de eliminar la provincia?')"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {!! $province->links() !!}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection