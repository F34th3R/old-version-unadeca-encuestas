@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Facultades</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Lista de Facultades</span>
                <div class="right-align">
                    <a href="{{ route('faculties.create') }}" class="waves-effect waves-light btn btn-flat">
                        <i class="material-icons right">add</i>Añadir
                    </a>
                </div>
            </div>
            <div class="body-content-item-body">
                <table class="highlight responsive-table">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($faculties as $faculty)
                        <tr>
                            @if($faculty->id == 1 || $faculty->id == 2 || $faculty->id == 2 || $faculty->id == 3 || $faculty->id == 4 || $faculty->id == 5 || $faculty->id == 6 || $faculty->id == 7 || $faculty->id == 8)
                                <td>{{ $faculty->name}}</td>
                                <td>
                                    @can('faculties.show')
                                        <a href="{{ route('faculties.show', $faculty->id) }}" class="waves-effect waves-light btn btn-flat">
                                            <i class="material-icons">assignment</i>
                                        </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('faculties.edit')
                                        <a href="{{ route('faculties.edit', $faculty->id) }}" class="waves-effect waves-light btn btn-flat">
                                            <i class="material-icons">create</i>
                                        </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('faculties.destroy')
                                        {!! Form::open(['route' => ['faculties.destroy', $faculty->id], 'method' => 'DELETE']) !!}
                                        <button class="waves-effect waves-light btn btn-flat disabled">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @else
                                <td>{{ $faculty->name}}</td>
                                <td>
                                    @can('faculties.show')
                                        <a href="{{ route('faculties.show', $faculty->id) }}" class="waves-effect waves-light btn btn-flat">
                                            <i class="material-icons">assignment</i>
                                        </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('faculties.edit')
                                        <a href="{{ route('faculties.edit', $faculty->id) }}" class="waves-effect waves-light btn btn-flat">
                                            <i class="material-icons">create</i>
                                        </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('faculties.destroy')
                                        <a href="{{ route('faculties.delete', $faculty->id) }}" class="waves-effect waves-light btn btn-flat">
                                            <i class="material-icons">delete</i>
                                        </a>
                                    @endcan
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $faculties->render() }}
            </div>
        </div>
    </div>
@endsection