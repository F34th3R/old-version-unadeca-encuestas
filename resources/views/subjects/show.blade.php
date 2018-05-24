@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Subjects</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Subjects data</span>
                @can('users.edit')
                    <div class="right-align">
                        <a href="{{ route('subjects', $matter->id) }}" class="btn-flat">
                            <i class="material-icons">create</i>
                        </a>
                    </div>
                @endcan
            </div>
            <div class="body-content-item-body">
                <p><strong>Name:</strong> {{ $matter->name }}</p>
            </div>
        </div>
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Matters</span>
            </div>
            <div class="body-content-item-body">
                <ul class="collection">
                    {{--@foreach($user->roles as $role)--}}
                        {{--<li class="collection-item">{{ $role->name }}</li>--}}
                    {{--@endforeach--}}
                </ul>
            </div>
        </div>
    </div>
@endsection