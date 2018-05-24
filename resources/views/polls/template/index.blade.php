@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Polls</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Choose the Template</span>
            </div>
            <div class="body-content-item-body">
                <table class="highlight responsive-table">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($polls as $poll)
                        @if($poll->isTemplate == 'true')
                            <tr>
                                <td>{{ $poll->titles->title}}</td>
                                <td>
                                    @can('polls.create')
                                        <a href="{{ route('polls.template.create', $poll->id) }}" class="waves-effect waves-light btn btn-flat">
                                            <i class="material-icons">add</i>
                                        </a>
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