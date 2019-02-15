<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $employer->id !!}</p>
</div>

<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{!! $employer->nom !!}</p>
</div>

<!-- Login Field -->
<div class="form-group">
    {!! Form::label('login', 'Login:') !!}
    <p>{!! $employer->login !!}</p>
</div>

<!-- Pw Field -->
<div class="form-group">
    {!! Form::label('pw', 'Pw:') !!}
    <p>{!! $employer->pw !!}</p>
</div>

<!-- Fonction Id Field -->
<div class="form-group">
    {!! Form::label('fonction_id', 'Fonction Id:') !!}
    <p>{!! $employer->fonction_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $employer->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $employer->updated_at !!}</p>
</div>

