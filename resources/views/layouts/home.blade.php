@extends('layouts.app')

@section('content')
    {{--Mobil-Navbar--}}
    @include('layouts.nav')

    <div class="container">
        <div class="home">
            <div class="row">
                @can('admin')
                    <div class="col m4 l4 xl3 home-menu hide-on-small-only">
                        <div class="row">
                            <div class="menu-header feather-card">
                                <img class="logo" src="{{ asset('images/unadeca/logo_color_up.svg') }}" alt="unadeca-logo">
                            </div>
                        </div>
                        <div class="row">
                            <div class="menu-body feather-card">
                                <div class="menu-user-id">
                                    <div class="row">
                                        <span class="user-id">{{ Auth::user()->code }}</span>
                                    </div>
                                    <div class="row">
                                        <span class="user-role">
                                            @foreach(Auth::user()->roles as $role)
                                                {{ $role->name }}
                                            @endforeach
                                        </span>
                                    </div>
                                </div>
                                @include('layouts.menu')
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m8 l8 xl9 home-body">
                        @yield('home_content')
                    </div>
                @endcan
                    @can('student', 'guest', 'professor')
                        <div class="col s12 home-body">
                            @yield('home_content')
                        </div>
                @endcan
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection