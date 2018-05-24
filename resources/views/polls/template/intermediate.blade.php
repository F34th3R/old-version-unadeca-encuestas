@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Polls</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <form action="{{ route('polls.template.store') }}" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="titles_id" value="{{ $myRequest->titles_id }}">
                <input type="hidden" name="titleDescription" value="{{ $myRequest->titleDescription }}">
                <input type="hidden" name="description" value="{{ $myRequest->description }}">
                <input type="hidden" name="instruction" value="{{ $myRequest->instruction }}">
                <input type="hidden" name="faculty_id" value="{{ $myRequest->faculty_id }}">
                <input type="hidden" name="start" value="{{ $myRequest->start }}">
                <input type="hidden" name="end" value="{{ $myRequest->end }}">
                <input type="hidden" name="isClose" value="{{ $myRequest->isClose }}">

                <div class="body-content-item-title">
                    <span>Subjects</span>
                </div>
                <div class="body-content-item-body">
                    @isset($subjects)
                        @foreach($subjects as $subject)
                            <p>
                                <label>
                                    {{ Form::checkbox('subjects[]', $subject->id, null) }}
                                    <span>{{ $subject->name }}</span>
                                </label>
                            </p>
                        @endforeach
                    @endisset
                    @empty($subjects)
                        null
                    @endempty
                </div>

                <div class="body-content-item-title">
                    <span>Questions</span>
                </div>
                <div class="body-content-item-body">
                    @foreach($questions as $question)
                        <p>
                            <label>
                                {{ Form::checkbox('questions[]', $question->id, true) }}
                                <span>{{ $question->question }}</span>
                            </label>
                        </p>
                    @endforeach
                </div>
                <div class="form-group center-align" style="margin-bottom: 20px">
                    <button type="submit" class="waves-effect waves-light btn unadeca-btn">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection