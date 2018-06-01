<div class="input-field form-group">
    <label for="name" class="mat-label">
        <span class="black-text">Name</span>
    </label>
    {{ Form::text('name', null, ['class' => 'active validate form-control', 'id' => 'name'])}}
</div>
<div class="input-field form-group">
    <label for="slug" class="mat-label">
        <span class="black-text">Friendly URL</span>
    </label>
    {{ Form::text('slug', null, ['class' => 'active validate form-control', 'id' => 'slug'])}}
</div>
<div class="input-field form-group">
    <label for="description" class="mat-label">
        <span class="black-text">Description</span>
    </label>
    {{ Form::text('description', null, ['class' => 'active validate form-control'])}}
</div>
<div class="input-field form-group">
    <h5>Lista de permisos</h5>
    @foreach($permissions as $permission)
        <p>
            <label>
                {{ Form::checkbox('permissions[]', $permission->id, null) }}

                <span>{{ $permission->name }} ({{ $permission->description }})</span>
            </label>
        </p>
    @endforeach
</div>
<div class="form-group center-align">
    <button type="submit" class="waves-effect waves-light btn unadeca-btn">
        Save
    </button>
</div>