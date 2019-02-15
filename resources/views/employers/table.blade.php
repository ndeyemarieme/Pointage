<table class="table table-responsive" id="employers-table">
    <thead>
        <th>Nom</th>
        <th>Login</th>
        <th>Pw</th>
        <th>Fonction Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($employers as $employer)
        <tr>
            <td>{!! $employer->nom !!}</td>
            <td>{!! $employer->login !!}</td>
            <td>{!! $employer->pw !!}</td>
            <td>{!! $employer->fonction_id !!}</td>
            <td>
                {!! Form::open(['route' => ['employers.destroy', $employer->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('employers.show', [$employer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('employers.edit', [$employer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>