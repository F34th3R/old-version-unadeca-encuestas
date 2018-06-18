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
                        <a href="{{ route('subjects.show', $subject->id) }}" class="btn-flat">
                            <i class="material-icons">create</i>
                        </a>
                    </div>
                @endcan
            </div>
            <div class="body-content-item-body">
                <p><strong>Name:</strong> {{ $subject->name }}</p>
            </div>
        </div>
    </div>
@endsection