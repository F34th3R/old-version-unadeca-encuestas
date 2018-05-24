@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Questions</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>List of Questions</span>
                <div class="right-align">
                    <a href="{{ route('questions.create') }}" class="waves-effect waves-light btn btn-flat">
                        <i class="material-icons right">add</i>Add
                    </a>
                </div>
            </div>
            <div class="body-content-item-body">
                <table class="highlight responsive-table">
                    <thead>
                    <tr>
                        <th>Questions</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $question)
                        <tr>
                            <td>{{ $question->question }}</td>
                            <td>
                                @can('questions.show')
                                    <a href="{{ route('questions.show', $question->id) }}" class="waves-effect waves-light btn btn-flat">
                                        <i class="material-icons">assignment</i>
                                    </a>
                                @endcan
                            </td>
                            <td>
                                @can('questions.edit')
                                    <a href="{{ route('questions.edit', $question->id) }}" class="waves-effect waves-light btn btn-flat">
                                        <i class="material-icons">create</i>
                                    </a>
                                @endcan
                            </td>
                            <td>
                                @can('questions.destroy')
                                    <form action="{{ route('questions.destroy', $question->id) }}" method="DELETE">
                                        <button class="waves-effect waves-light btn btn-flat">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection