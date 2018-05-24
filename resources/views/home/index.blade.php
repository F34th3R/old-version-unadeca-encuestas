@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Welcome {{ Auth::user()->name }}</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Weekly Verse</span>
            </div>
            <div class="body-content-item-body">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aspernatur corporis culpa
                    debitis doloremque fugiat ipsa laboriosam nostrum nulla quisquam ratione repudiandae saepe sequi vel
                    veniam vero vitae, voluptas voluptatibus.
                </p>
                <div class="right-align">
                    <span class="bible-verse">
                        V:V
                    </span>
                </div>
            </div>
        </div>
        <div class="body-content-item">
            <div class="body-content-item-title">
                <div class="col s6">
                    <span>My user</span>
                </div>
                @can('student')
                    @if($my == '[{"s_register":"true"}]')
                        <div class="col s6">
                            <div class="right-align">
                                <a href="{{ route('home.my') }}" class="btn-flat disabled">
                                    <i class="material-icons">create</i>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="col s6">
                            <div class="right-align">
                                <a href="{{ route('home.my') }}" class="btn-flat">
                                    <i class="material-icons">create</i>
                                </a>
                            </div>
                        </div>
                    @endif
                @endcan
            </div>
            <div class="body-content-item-body">
                <p>Name: <span class="feather-secondary-text-color">{{ Auth::user()->name }}</span></p>
                <p>Code: <span class="feather-secondary-text-color">{{ Auth::user()->code }}</span></p>
                <p>Email: <span class="feather-secondary-text-color">{{ Auth::user()->email }}</span></p>
                <p>Role:
                    <span class="feather-secondary-text-color">
                        @foreach(Auth::user()->roles as $role)
                                {{ $role->name }} ...
                        @endforeach
                    </span>
                </p>
                <p>Faculty:
                    <span class="feather-secondary-text-color">
                            {{ empty($user->faculties->name) ? '' : $user->faculties->name}}
                    </span>
                </p>
                <p>My subjects:</p>
                <ul class="collection">
                    @foreach(Auth::user()->subjects as $subject)
                        <li class="collection-item">{{ $subject->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Edit my user</span>
            </div>
            <div class="body-content-item-body">
                <p>
                    If you want to edit your user, please contact with an administrator
                </p>
                <div class="right-align">
                    <div class="body-content-item-title">
                        <span class="bible-verse">
                            Att: Feather
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection