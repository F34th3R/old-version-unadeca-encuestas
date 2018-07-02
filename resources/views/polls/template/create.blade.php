@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Polls</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            {{--<form action="{{ route('polls.template.store') }}" method="POST">--}}
            @include('errors.message')
            <form action="{{ route('polls.template.intermediate') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $poll->id }}">

                <div class="body-content-item-title">
                    <span>Details of Polls</span>
                </div>
                <div class="body-content-item-title">
                    <span>Title:</span>
                    <p>{{ $poll->titles->title }}</p>
                    <input type="hidden" name="titles_id" value="{{ $poll->titles->id }}">
                </div>
                <div class="body-content-item-title">
                    <span>Title of poll description:</span>
                    <p>{{ $poll->titleDescription }}</p>
                    <input type="hidden" name="titleDescription" value="{{ $poll->titleDescription }}">
                </div>
                <div class="body-content-item-title">
                    <span>Description:</span>
                    <p>{{ $poll->description }}</p>
                    <input type="hidden" name="description" value="{{ $poll->description }}">
                </div>
                <div class="body-content-item-title">
                    <span>Instruction:</span>
                    <p>{{ $poll->instruction }}</p>
                    <input type="hidden" name="instruction" value="{{ $poll->instruction }}">
                </div>
                <div class="body-content-item-title">
                    <span>Cuatrimestre:</span>
                    @foreach($quarters as $quarter)
                        <p>
                            <label>
{{--                                {{ Form::checkbox('quarters[]', $quarter->id, false) }}--}}
                                <input name="quarters" type="radio" value="{{$quarter->id}}" checked />
                                <span>{{ $quarter->name }}</span>
                            </label>
                        </p>
                    @endforeach
                </div>

                <div class="body-content-item-title">
                    <span>Enable:</span>
                    <p>
                        <label>
                            <input name="isClose" type="radio" value="true" checked />
                            <span>True</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input name="isClose" type="radio" value="false"/>
                            <span>False</span>
                        </label>
                    </p>
                </div>

                <div class="body-content-item-title">
                    <span>For:</span>
                    @foreach( $faculties as $faculty)
                        <p>
                            <label>
                                @if($faculty->name == 'General')
                                    <input name="faculty_id" type="radio" value="{{ $faculty->id }}" checked/>
                                    <span>{{ $faculty->name }}</span>
                                @else
                                    <input name="faculty_id" type="radio" value="{{ $faculty->id }}"/>
                                    <span>{{ $faculty->name }}</span>
                                @endif
                            </label>
                        </p>
                    @endforeach
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
                        Next
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection