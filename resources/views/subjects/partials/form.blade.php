<div class="input-field form-group">
    <label for="code" class="mat-label">
        <span class="black-text">Code</span>
    </label>
    {{ Form::text('code', null, ['class' => 'active validate form-control'])}}
</div>
<div class="input-field form-group">
    <label for="name" class="mat-label">
        <span class="black-text">Name</span>
    </label>
    {{ Form::text('name', null, ['class' => 'active validate form-control'])}}
</div>
<div class="form-group center-align">
    <button type="submit" class="waves-effect waves-light btn unadeca-btn">
        Save
    </button>
</div>