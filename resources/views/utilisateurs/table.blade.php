<table class="table table-responsive" id="utilisateurs-table">
    <thead>
        <th>Login</th>
        <th>Pw</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($utilisateurs as $utilisateur)
        <tr>
            <td>{!! $utilisateur->login !!}</td>
            <td>{!! $utilisateur->pw !!}</td>
            <td>
                {!! Form::open(['route' => ['utilisateurs.destroy', $utilisateur->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('utilisateurs.show', [$utilisateur->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('utilisateurs.edit', [$utilisateur->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>