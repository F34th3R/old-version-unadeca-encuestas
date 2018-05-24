@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Subjects</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>List of all subjects</span>
                <div class="right-align">
                    <a href="{{ route('subjects.create') }}" class="waves-effect waves-light btn btn-flat">
                        <i class="material-icons right">add</i>Add
                    </a>
                </div>
            </div>
            <div class="body-content-item-body">
                <table class="highlight responsive-table">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th colspan="3">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subjects as $subject)
                        <tr>
                            <td>{{ $subject->code}}</td>
                            <td>{{ $subject->name}}</td>
                            <td>
                                @can('polls.show')
                                    <a href="{{ route('subjects.show', $subject->id) }}" class="waves-effect waves-light btn btn-flat">
                                        <i class="material-icons">assignment</i>
                                    </a>
                                @endcan
                            </td>
                            <td>
                                @can('polls.edit')
                                    <a href="{{ route('subjects.edit', $subject->id) }}" class="waves-effect waves-light btn btn-flat">
                                        <i class="material-icons">create</i>
                                    </a>
                                @endcan
                            </td>
                            <td>
                                @can('polls.destroy')
                                    <form action="{{ route('subjects.destroy', $subject->id) }}" method="DELETE">
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
                {{ $subjects->render() }}
            </div>
        </div>
    </div>
@endsection