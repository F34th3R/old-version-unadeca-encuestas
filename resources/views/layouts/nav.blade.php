<div class="navbar-fixed">
    <nav class="feather-primary-color">
        <div class="nav-wrapper">
            <a href="#" data-target="mobile-demo" class="sidenav-trigger hide-on-med-and-up"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <div class="sidenav" id="mobile-demo">
        <div class="menu-nav">
            <img class="logo" src="{{ asset('images/unadeca/logo_white_up.svg') }}" alt="unadeca-logo">
        </div>
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