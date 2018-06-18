@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Subjects Polls</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>My polls</span>
            </div>
            <div class="body-content-item-body">
                <table class="highlight responsive-table">
                    <thead>
                    <tr>
                        <th>Title</th>
                        {{--<th>Start</th>--}}
                        <th>Subject</th>
                        <th>End</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--@foreach($polls->subjects as $subject)--}}
                        {{--{{ $subject->name }}--}}
                    {{--@endforeach--}}

                    @foreach(Auth::user()->subjects as $userSubject)
                        <p>{{ $userSubject->name }}</p>
                    @endforeach
                    @foreach($polls as $poll)
                        @foreach($poll->faculties as $faculty)
                            @if($faculty->name == Auth::user()->faculties->name || $faculty->name == 'General')
                                <tr>
                                    <td>{{ $poll->titles->title}}</td>
                                    <td>
                                        @foreach($poll->subjects as $subject)
                                            <p>{{ $subject->name }}</p>
                                        @endforeach
                                    </td>
                                    <td>{{ date("d/m/Y", strtotime($poll->end)) }}</td>
                                    <td>
                                        @can('student')
                                            <a href="{{ route('do.polls.show', $poll->id) }}" class="waves-effect waves-light btn btn-flat">
                                                <i class="material-icons">create</i>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    <p class="range-field">
                        <input type="range" id="test5" min="1" max="5" />
                    </p>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection