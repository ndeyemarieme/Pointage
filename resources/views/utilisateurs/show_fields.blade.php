<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $utilisateur->id !!}</p>
</div>

<!-- Login Field -->
<div class="form-group">
    {!! Form::label('login', 'Login:') !!}
    <p>{!! $utilisateur->login !!}</p>
</div>

<!-- Pw Field -->
<div class="form-group">
    {!! Form::label('pw', 'Pw:') !!}
    <p>{!! $utilisateur->pw !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $utilisateur->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $utilisateur->updated_at !!}</p>
</div>

