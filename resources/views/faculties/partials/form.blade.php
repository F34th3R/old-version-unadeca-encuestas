<div class="input-field form-group">
    <label for="name" class="mat-label">
        <span class="black-text">Name</span>
    </label>
    {{ Form::text('name', null, ['class' => 'active validate form-control'])}}
</div>

<div class="input-field form-group">
    <span>List of Subjects</span>
    @foreach($subjects as $subject)
        <p>
            <label>
                {{ Form::checkbox('subjects[]', $subject->id, null) }}
                <span>{{ $subject->name }}</span>
            </label>
        </p>
    @endforeach
</div>

<div class="form-group center-align">
    @if(Route::current()->getName() == 'faculties.create')
        <button type="submit" class="waves-effect waves-light btn unadeca-btn">
            Guardar
        </button>
    @endif
    @if(Route::current()->getName() == 'faculties.edit')
        <div class="row">
            <div class="col s6 right-align" style="padding-right: 10px">
                <a href="{{ route('faculties.show', $faculty->id) }}" class="waves-effect waves-light btn unadeca-btn">
                    Atrás
                </a>
            </div>
            <div class="col s6 left-align" style="padding-left: 10px">
                <button type="submit" class="waves-effect waves-light btn unadeca-btn">
                    Guardar
                </button>
            </div>
        </div>
    @endif
</div>