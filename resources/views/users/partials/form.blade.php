@include('errors.message')

<div class="input-field form-group">
    <label for="name" class="mat-label">
        <span class="black-text">Name</span>
    </label>
    {{ Form::text('name', null, ['class' => 'active validate form-control'])}}
</div>


    <div class="input-field form-group">
        <label for="code" class="mat-label">
            <span class="black-text">Code</span>
        </label>
        @can('admin')
            {{ Form::text('code', null, ['class' => 'active validate form-control'])}}
        @endcan
    </div>


<div class="input-field form-group">
    <label for="email" class="mat-label">
        <span class="black-text">Email</span>
    </label>
    {{ Form::text('email', null, ['class' => 'active validate form-control'])}}
</div>
<div class="input-field form-group">
    <select id="faculties_id" name="faculties_id">
        {{--<option value="" disabled selected>Faculty</option>--}}
        @foreach($faculties as $faculty)
            <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
        @endforeach
    </select>
    <label>Faculty</label>
</div>
<div class="input-field form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="mat-label">
        <span class="black-text">Password</span>
    </label>
    <input id="password" class="active validate form-control" name="password" type="password" value="{{ old('password') }}" >
</div>

<div class="input-field form-group">
    <label for="password-confirm" class="mat-label">
        <span class="black-text">Confirm Password</span>
    </label>
    <input id="password-confirm" class="active validate form-control" name="password_confirmation" type="password" >
</div>

@foreach($roles as $role)
    <p>
        <label>
            {{ Form::checkbox('roles[]', $role->id, null) }}

            <span>{{ $role->name }} ({{ $role->description }})</span>
        </label>
    </p>
@endforeach

<div class="form-group center-align">
    <button type="submit" class="waves-effect waves-light btn unadeca-btn">
        Guardar
    </button>
</div>
