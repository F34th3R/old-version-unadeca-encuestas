<div class="input-field form-group">
    <label for="code" class="mat-label">
        <span class="black-text">Código</span>
    </label>
    {{ Form::text('code', null, ['class' => 'active validate form-control'])}}
</div>
<div class="input-field form-group">
    <label for="name" class="mat-label">
        <span class="black-text">Nombre</span>
    </label>
    {{ Form::text('name', null, ['class' => 'active validate form-control'])}}
</div>
<div class="form-group center-align">
    @if(Route::current()->getName() == 'subjects.create')
        <div class="row">
            <div class="col s6 right-align" style="padding-right: 10px">
                <a href="{{ route('subjects.index') }}" class="waves-effect waves-light btn unadeca-btn">
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
    @if(Route::current()->getName() == 'subjects.edit')
        <div class="row">
            <div class="col s6 right-align" style="padding-right: 10px">
                <a href="{{ route('subjects.show', $subject->id) }}" class="waves-effect waves-light btn unadeca-btn">
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