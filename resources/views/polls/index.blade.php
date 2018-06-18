@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Polls</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <div class="col s6">
                    <span>List of Polls</span>
                </div>
                <div class="col s6">
                    <div class="right-align">
                        <a href="{{ route('polls.template.index') }}" class="waves-effect waves-light btn btn-flat">
                            <i class="material-icons right">add</i>Add
                        </a>
                    </div>
                </div>
            </div>
            <div class="body-content-item-body">
                <table class="highlight responsive-table">
                    <thead>
                    <tr>
                        <th>Title</th>
                        {{--<th>Start</th>--}}
                        <th>Faculty</th>
                        <th>Cuatrimestre</th>
                        <th>Enable</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($polls as $poll)
                        @if($poll->isTemplate == 'false')
                            <tr>
                                <td>{{ $poll->titles->title}}</td>
                                {{--<td>{{ $polls->start }}</td>--}}
                                <td>
                                    @foreach($poll->faculties as $faculty)
                                        {{ $faculty->name }}
                                    @endforeach
                                </td>
                                {{--<td>{{ date("d/m/Y", strtotime($poll->quarters->init_date)) }}</td>--}}
                                <td>{{ $poll->quarters->name }}</td>
                                <td>
                                    @if($poll->isClose)
                                        <span class="green-text">{{ $poll->isClose }}</span>
                                    @else
                                        <span class="red-text">{{ $poll->isClose }}</span>
                                    @endif
                                </td>
                                <td>
                                    @can('polls.show')
                                        <a href="{{ route('polls.show', $poll->id) }}" class="waves-effect waves-light btn btn-flat">
                                            <i class="material-icons">assignment</i>
                                        </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('polls.edit')
                                        <a href="{{ route('polls.edit', $poll->id) }}" class="waves-effect waves-light btn btn-flat">
                                            <i class="material-icons">create</i>
                                        </a>
                                    @endcan
                                </td>
                                <td>
                                    @can('polls.destroy')
                                        <form action="{{ route('polls.destroy', $poll->id) }}" method="DELETE">
                                            <button class="waves-effect waves-light btn btn-flat">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection