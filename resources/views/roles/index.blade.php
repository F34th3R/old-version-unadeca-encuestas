@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Roles</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>List of all roles</span>
                <div class="right-align">
                    <a href="{{ route('roles.create') }}" class="waves-effect waves-light btn btn-flat">
                        <i class="material-icons right">add</i>Add
                    </a>
                </div>
            </div>
            <div class="body-content-item-body">
                <table class="highlight responsive-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            @if($role-> name == 'Feather' || $role-> name == 'Admin' || $role-> name == 'Student' || $role-> name == 'Professor' || $role-> name == 'Guest')
                                <td>{{ $role->name}}</td>
                                <td>
                                    @can('roles.show')
                                        <a href="{{ route('roles.show', $role->id) }}" class="waves-effect waves-light btn btn-flat">
                                            <i class="material-icons">assignment</i>
                                        </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('roles.edit')
                                        <a href="{{ route('roles.edit', $role->id) }}" class="waves-effect waves-light btn btn-flat disabled">
                                            <i class="material-icons">create</i>
                                        </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('roles.destroy')
                                        {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'DELETE']) !!}
                                            <button class="waves-effect waves-light btn btn-flat">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @else
                                <td>{{ $role->name}}</td>
                                <td>
                                    @can('roles.show')
                                        <a href="{{ route('roles.show', $role->id) }}" class="waves-effect waves-light btn btn-flat">
                                            <i class="material-icons">assignment</i>
                                        </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('roles.edit')
                                        <a href="{{ route('roles.edit', $role->id) }}" class="waves-effect waves-light btn btn-flat">
                                            <i class="material-icons">create</i>
                                        </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('roles.destroy')
                                        {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'DELETE']) !!}
                                        <button class="waves-effect waves-light btn btn-flat">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $roles->render() }}
            </div>
        </div>
    </div>
@endsection