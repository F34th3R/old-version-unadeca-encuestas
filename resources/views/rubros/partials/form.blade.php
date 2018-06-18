<div class="input-field form-group">
    <label for="name" class="mat-label">
        <span class="black-text">Nombre del rubro</span>
    </label>
    {{ Form::text('name', null, ['class' => 'active validate form-control'])}}
</div>
<div class="form-group center-align">
    <button type="submit" class="waves-effect waves-light btn unadeca-btn">
        Guardar
    </button>
</div>