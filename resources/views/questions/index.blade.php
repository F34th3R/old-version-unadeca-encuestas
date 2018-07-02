@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Preguntas</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Lista de Preguntas</span>
                <div class="right-align">
                    <a href="{{ route('questions.create') }}" class="waves-effect waves-light btn btn-flat">
                        <i class="material-icons right">add</i>Añadir
                    </a>
                </div>
                @include('errors.message')
            </div>
            <div class="body-content-item-body">
                <table class="highlight responsive-table">
                    <thead>
                    <tr>
                        <th>Preguntas</th>
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
                                    <a href="{{ route('questions.delete', $question->id) }}" class="waves-effect waves-light btn btn-flat">
                                        <i class="material-icons">delete</i>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $questions->render() }}
            </div>
        </div>
    </div>
@endsection