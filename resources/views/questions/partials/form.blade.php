<div class="input-field form-group">
    <label for="name" class="mat-label">
        <span class="black-text">Nombre del cuatrimestre</span>
    </label>
    {{ Form::text('question', null, ['class' => 'active validate form-control'])}}
</div>

<div class="input-field form-group">
    <span>Lista de rubros</span>
    @foreach($items as $item)
        <p>
            <label>
                {{ Form::checkbox('items[]', $item->id, null) }}
                <span>{{ $item->name }}</span>
            </label>
        </p>
    @endforeach
</div>

<div class="form-group center-align">
    @if(Route::current()->getName() == 'questions.create')
        <div class="row">
            <div class="col s6 right-align" style="padding-right: 10px">
                <a href="{{ route('questions.index') }}" class="waves-effect waves-light btn unadeca-btn">
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
    @if(Route::current()->getName() == 'questions.edit')
        <div class="row">
            <div class="col s6 right-align" style="padding-right: 10px">
                <a href="{{ route('questions.show', $question->id) }}" class="waves-effect waves-light btn unadeca-btn">
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