<table class="table table-responsive" id="pointers-table">
    <thead>
        <th>Hrdep</th>
        <th>Hrfin</th>
        <th>Latitude</th>
        <th>Logitude</th>
        <th>Employer Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($pointers as $pointer)
        <tr>
            <td>{!! $pointer->hrdep !!}</td>
            <td>{!! $pointer->hrfin !!}</td>
            <td>{!! $pointer->latitude !!}</td>
            <td>{!! $pointer->logitude !!}</td>
            <td>{!! $pointer->employer_id !!}</td>
            <td>
                {!! Form::open(['route' => ['pointers.destroy', $pointer->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pointers.show', [$pointer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pointers.edit', [$pointer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>