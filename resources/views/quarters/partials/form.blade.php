<div class="input-field form-group">
    <label for="name" class="mat-label">
        <span class="black-text">Nombre del cuatrimestre</span>
    </label>
    {{ Form::text('name', null, ['class' => 'active validate form-control'])}}
</div>
<div class="input-field form-group">
    {{ Form::text('init_date', null, ['class' => 'datepicker'])}}
    <label for="start">Fecha de inicio</label>
</div>
<div class="input-field form-group">
    {{ Form::text('end_date', null, ['class' => 'datepicker'])}}
    <label for="start">Fecha de final</label>
</div>

<div class="form-group center-align">
    @if(Route::current()->getName() == 'quarters.create')
        <div class="row">
            <div class="col s6 right-align" style="padding-right: 10px">
                <a href="{{ route('quarters.index') }}" class="waves-effect waves-light btn unadeca-btn">
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
    @if(Route::current()->getName() == 'quarters.edit')
        <div class="row">
            <div class="col s6 right-align" style="padding-right: 10px">
                <a href="{{ route('quarters.show', $quarter->id) }}" class="waves-effect waves-light btn unadeca-btn">
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