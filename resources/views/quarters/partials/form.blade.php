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
    <button type="submit" class="waves-effect waves-light btn unadeca-btn">
        Guardar
    </button>
</div>