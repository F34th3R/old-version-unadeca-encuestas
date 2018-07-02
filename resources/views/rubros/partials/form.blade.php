<div class="input-field form-group">
    <label for="name" class="mat-label">
        <span class="black-text">Nombre del rubro</span>
    </label>
    {{ Form::text('name', null, ['class' => 'active validate form-control'])}}
</div>

<div class="input-field form-group">
    <span>Añadir preguntas</span>
    @foreach($questions as $question)
        <p>
            <label>
                {{ Form::checkbox('questions[]', $question->id, null) }}
                <span>{{ $question->question }}</span>
            </label>
        </p>
    @endforeach
</div>

<div class="form-group center-align">
    @if(Route::current()->getName() == 'rubros.create')
        <div class="row">
            <div class="col s6 right-align" style="padding-right: 10px">
                <a href="{{ route('rubros.index') }}" class="waves-effect waves-light btn unadeca-btn">
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
    @if(Route::current()->getName() == 'rubros.edit')
        <div class="row">
            <div class="col s6 right-align" style="padding-right: 10px">
                <a href="{{ route('rubros.show', $item->id) }}" class="waves-effect waves-light btn unadeca-btn">
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