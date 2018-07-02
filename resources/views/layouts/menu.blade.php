<div class="menu-item-solo">
    <a href="{{ route('home') }}">
        <span>Home</span>
    </a>
</div>
@can('admin')
    <div class="menu-item-group">
        <div class="menu-item-group-title">
            <span>Create</span>
        </div>
        @can('subjects.index')
            <div class="menu-item-group-item">
                <a href="{{ route('subjects.index') }}">
                    <span>Subjects</span>
                </a>
            </div>
        @endcan
        @can('faculties.index')
            <div class="menu-item-group-item">
                <a href="{{ route('faculties.index') }}">
                    <span>Faculties</span>
                </a>
            </div>
        @endcan
        @can('rubros.index')
            <div class="menu-item-group-item">
                <a href="{{ route('rubros.index') }}">
                    <span>Rubros</span>
                </a>
            </div>
        @endcan
        @can('quarters.index')
            <div class="menu-item-group-item">
                <a href="{{ route('quarters.index') }}">
                    <span>Cuatrimestres</span>
                </a>
            </div>
        @endcan
        {{--@can('titles.index')--}}
            {{--<div class="menu-item-group-item">--}}
                {{--<a href="{{ route('titles.index') }}">--}}
                    {{--<span>Type of polls</span>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--@endcan--}}
        @can('questions.index')
            <div class="menu-item-group-item">
                <a href="{{ route('questions.index') }}">
                    <span>Questions</span>
                </a>
            </div>
        @endcan
        @can('polls.index')
            <div class="menu-item-group-item">
                <a href="{{ route('polls.index') }}">
                    <span>Polls</span>
                </a>
            </div>
        @endcan
    </div>
@endcan
@can('student', 'guest', 'professor')
    <div class="menu-item-group">
        <div class="menu-item-group-title">
            <span>Polls</span>
        </div>
        <div class="menu-item-group-item">
            {{--<a href="{{ route('do.polls') }}">--}}
                {{--<span>Subjects polls</span>--}}
            {{--</a>--}}
        </div>
        <div class="menu-item-group-item">
            <span>General polls</span>
        </div>
        <div class="menu-item-group-item">
            <span>Code</span>
        </div>
    </div>
@endcan
@can('roles.index')
    <div class="menu-item-solo">
        <a href="{{ route('roles.index') }}">
            <span>Roles</span>
        </a>
    </div>
@endcan
{{--@can('permissions.index')--}}
    {{--<div class="menu-item-solo">--}}
        {{--<a href="{{ route('permissions.index') }}">--}}
            {{--<span>Permissions</span>--}}
        {{--</a>--}}
    {{--</div>--}}
{{--@endcan--}}
@can('users.index')
    <div class="menu-item-solo">
        <a href="{{ route('users.index') }}">
            <span>Users</span>
        </a>
    </div>
@endcan
@can('results.index')
    <div class="menu-item-group">
        <div class="menu-item-group-title">
            <span>Results</span>
        </div>
        <div class="menu-item-group-item">
            <span>Result-Title-00</span>
        </div>
    </div>
@endcan
<div class="menu-item-solo">
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span>Sing Out</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>