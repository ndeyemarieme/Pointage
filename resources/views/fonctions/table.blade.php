<table class="table table-responsive" id="fonctions-table">
    <thead>
        <th>Libelle</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($fonctions as $fonction)
        <tr>
            <td>{!! $fonction->libelle !!}</td>
            <td>
                {!! Form::open(['route' => ['fonctions.destroy', $fonction->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('fonctions.show', [$fonction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('fonctions.edit', [$fonction->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>