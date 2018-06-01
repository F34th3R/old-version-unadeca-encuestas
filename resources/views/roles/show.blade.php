@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Subjects</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Subjects data</span>
                @can('roles.edit')
                    <div class="right-align">
                        {{--<a href="{{ route('roles/edit', $role->id) }}" class="btn-flat">--}}
                            {{--<i class="material-icons">create</i>--}}
                        {{--</a>--}}
                    </div>
                @endcan
            </div>
            <div class="body-content-item-body">
                <p><strong>Name:</strong> {{ $role->name }}</p>
                <p><strong>Friendly URL:</strong> {{ $role->slug }}</p>
                <p><strong>Description:</strong> {{ $role->description }}</p>
            </div>
        </div>
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Permissions</span>
            </div>
            <div class="body-content-item-body">
                <ul class="collection">
                    @foreach($role->permissions as $r)
                        <li class="collection-item">{{ $r->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection