<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Login Field -->
<div class="form-group col-sm-6">
    {!! Form::label('login', 'Login:') !!}
    {!! Form::text('login', null, ['class' => 'form-control']) !!}
</div>

<!-- Pw Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pw', 'Pw:') !!}
    {!! Form::password('pw', ['class' => 'form-control']) !!}
</div>

<!-- Fonction Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fonction_id', 'Fonction:') !!}
    {!! Form::select('fonction_id', $fonctions, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('employers.index') !!}" class="btn btn-default">Cancel</a>
</div>
