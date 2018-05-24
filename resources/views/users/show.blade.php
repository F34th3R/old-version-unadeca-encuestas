@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>User</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Details of Users</span>
                @can('users.edit')
                    <div class="right-align">
                        <a href="{{ route('users.edit', $user->id) }}" class="btn-flat">
                            <i class="material-icons">create</i>
                        </a>
                    </div>
                @endcan
            </div>
            <div class="body-content-item-body">
                <p><strong>Name:</strong> {{ $user->name }}</p>
                <p><strong>Code:</strong> {{ $user->code }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p>
                    <strong>Faculty:</strong>
                    {{ empty($user->faculties->name) ? '' : $user->faculties->name}}
                </p>
                <p>
                    <strong>Subjects:</strong>
                    <ul class="collection">
                        @foreach($user->permissions as $role)
                            <li class="collection-item">{{ $role->name }}</li>
                        @endforeach
                    </ul>
                </p>
            </div>
        </div>
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Roles</span>
            </div>
            <div class="body-content-item-body">
                <ul class="collection">
                    @foreach($user->roles as $role)
                        <li class="collection-item">{{ $role->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="body-content-item-title">
                <span>Permissions</span>
            </div>
            <div class="body-content-item-body">
                <ul class="collection">
                    @foreach($user->permissions as $role)
                        <li class="collection-item">{{ $role->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection