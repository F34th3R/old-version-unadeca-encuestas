@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Users</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>List of Users</span>
                @can('users.create')
                    <div class="right-align">
                        <a href="{{ route('users.create') }}" class="btn-flat">
                            <i class="material-icons right">add</i>Add
                        </a>
                    </div>
                @endcan
            </div>
            <div class="body-content-item-body">
                <table class="highlight responsive-table">
                    <thead>
                    <tr>
                        <th width="10px">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                @if($user->id == 1 || $user->id == 2 || $user->id == 3 || $user->id == 4 || $user->id == 5)
                                    <td>{{ $user->code }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @can('users.show')
                                            <a href="{{ route('users.show', $user->id) }}" class="waves-effect waves-light btn btn-flat">
                                                <i class="material-icons">assignment</i>
                                            </a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('users.edit')
                                            <a href="{{ route('users.edit', $user->id) }}" class="waves-effect waves-light btn btn-flat">
                                                <i class="material-icons">create</i>
                                            </a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('users.destroy')
                                            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
                                            <button class="waves-effect waves-light btn btn-flat disabled">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                @else
                                    <td>{{ $user->code }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @can('users.show')
                                            <a href="{{ route('users.show', $user->id) }}" class="waves-effect waves-light btn btn-flat">
                                                <i class="material-icons">assignment</i>
                                            </a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('users.edit')
                                            <a href="{{ route('users.edit', $user->id) }}" class="waves-effect waves-light btn btn-flat">
                                                <i class="material-icons">create</i>
                                            </a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('users.destroy')
                                            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
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
                {{ $users->render() }}
            </div>
        </div>
        <div class="body-content-item">
            {{--@can('users.create')--}}
                {{--<div class="right-align">--}}
                    {{--<a href="{{ route('users.update.pass') }}" class="btn-flat">--}}
                        {{--<i class="material-icons right">warning</i>Update all users password--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--@endcan--}}
        </div>
    </div>
@endsection