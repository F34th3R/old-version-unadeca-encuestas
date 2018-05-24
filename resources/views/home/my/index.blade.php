@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>My Subjects</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Enter my subjects</span>
            </div>
            <div class="body-content-item-body">
                <form class="form-horizontal" method="PUT" action="{{ route('home.update', Auth::user()->id) }}">
                    {{ csrf_field() }}
                    @isset($mySubjects)
                        @foreach($mySubjects as $mySubject)
                            <p>
                                <label>
                                    {{ Form::checkbox('subjects[]', $mySubject->id, null) }}
                                    <span>{{ $mySubject->name }}</span>
                                </label>
                            </p>
                        @endforeach
                        <div class="form-group center-align">
                            <button type="submit" class="waves-effect waves-light btn unadeca-btn">
                                Save
                            </button>
                        </div>
                    @endisset

                    @empty($mySubjects)
                        null
                    @endempty
                </form>
            </div>
        </div>
    </div>
@endsection