@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Rubros</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Lista de Rubros</span>
                <div class="right-align">
                    <a href="{{ route('rubros.create') }}" class="waves-effect waves-light btn btn-flat">
                        <i class="material-icons right">add</i>Add
                    </a>
                </div>
            </div>
            <div class="body-content-item-body">
                <table class="highlight responsive-table">
                    <thead>
                    <tr>
                        <th>Rubro</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rubros as $rubro)
                        <tr>
                            <td>{{ $rubro->name }}</td>
                            <td>
                                @can('rubros.show')
                                    <a href="{{ route('rubros.show', $rubro->id) }}" class="waves-effect waves-light btn btn-flat">
                                        <i class="material-icons">assignment</i>
                                    </a>
                                @endcan
                            </td>
                            <td>
                                @can('rubros.edit')
                                    <a href="{{ route('rubros.edit', $rubro->id) }}" class="waves-effect waves-light btn btn-flat">
                                        <i class="material-icons">create</i>
                                    </a>
                                @endcan
                            </td>
                            <td>
                                @can('rubros.destroy')
                                    <form action="{{ route('rubros.destroy', $rubro->id) }}" method="DELETE">
                                        <button class="waves-effect waves-light btn btn-flat disabled">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection