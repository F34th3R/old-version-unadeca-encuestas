<div class="input-field form-group">
    <label for="name" class="mat-label">
        <span class="black-text">Name</span>
    </label>
    {{ Form::text('name', null, ['class' => 'active validate form-control'])}}
</div>
<div class="input-field form-group">
    <h6>List of Subjects</h6>
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
    <button type="submit" class="waves-effect waves-light btn unadeca-btn">
        Save
    </button>
</div>