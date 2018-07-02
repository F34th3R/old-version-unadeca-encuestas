@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Titles</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>List of Titles</span>
                <div class="right-align">
                    <a href="{{ route('titles.create') }}" class="waves-effect waves-light btn btn-flat">
                        <i class="material-icons right">add</i>Add
                    </a>
                </div>
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
                    @foreach($titles as $title)
                        <tr>
                            <td>{{ $title->title }}</td>
                            <td>
                                @can('titles.show')
                                    <a href="{{ route('users.show', $title->id) }}" class="waves-effect waves-light btn btn-flat">
                                        <i class="material-icons">assignment</i>
                                    </a>
                                @endcan
                            </td>
                            <td>
                                @can('titles.edit')
                                    <a href="{{ route('titles.edit', $title->id) }}" class="waves-effect waves-light btn btn-flat">
                                        <i class="material-icons">create</i>
                                    </a>
                                @endcan
                            </td>
                            <td>
                                @can('titles.destroy')
                                    {!! Form::open(['route' => ['titles.destroy', $title->id], 'method' => 'DELETE']) !!}
                                    <button class="waves-effect waves-light btn btn-flat">
                                        <i class="material-icons">delete</i>
                                    </button>
                                    {!! Form::close() !!}
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