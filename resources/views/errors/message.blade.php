@if(count($errors->all()))
    @foreach($errors->all() as $error)
        <li>Oops! {{$error}}</li>
    @endforeach
@endif
@if(Session::has('message'))
    {{Session::get('message')}}
@endif
@if(Session::has('error'))
    <div class="s12">
        {{Session::get('error')}}
    </div>
@endif