<!-- Hrdep Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hrdep', 'Hrdep:') !!}
    {!! Form::text('hrdep', null, ['class' => 'form-control']) !!}
</div>

<!-- Hrfin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hrfin', 'Hrfin:') !!}
    {!! Form::text('hrfin', null, ['class' => 'form-control']) !!}
</div>

<!-- Latitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitude', 'Latitude:') !!}
    {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Logitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logitude', 'Logitude:') !!}
    {!! Form::text('logitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Employer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employer_id', 'Employer Id:') !!}
    {!! Form::select('employer_id',$employers, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pointers.index') !!}" class="btn btn-default">Cancel</a>
</div>
