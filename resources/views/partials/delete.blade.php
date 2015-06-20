{!! Form::open(['route' => ['admin.campus.destroy', $campus], 'method' => 'DELETE', 'role' => 'form']) !!}
    <button type="submit" class="btn btn-danger" onclick="return confirm('Desea eliminar el campus ?')">Eliminar</button>
{!! Form::close() !!}