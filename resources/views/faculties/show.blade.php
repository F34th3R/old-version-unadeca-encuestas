@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Faculties</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Faculty data</span>
                @can('users.edit')
                    <div class="right-align">
                        <a href="{{ route('faculties.edit', $faculty->id) }}" class="btn-flat">
                            <i class="material-icons">create</i>
                        </a>
                    </div>
                @endcan
            </div>
            <div class="body-content-item-body">
                <p><strong>Name:</strong> {{ $faculty->name }}</p>
            </div>
        </div>
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Profesores</span>
            </div>
            <div class="body-content-item-body">
                <ul class="collection">
                    @foreach($professors as $professor)
                        <li class="collection-item">{{$professor->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Subjects</span>
            </div>
            <div class="body-content-item-body">
                <ul class="collection">
                    @foreach($faculties as $faculty)
                        @foreach($faculty->subjects as $subject)
                            <li class="collection-item">{{$subject->name}}</li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection