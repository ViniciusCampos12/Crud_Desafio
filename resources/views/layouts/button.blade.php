<form action="{{route('contato.destroy', [$contato->id])}}" method="post">
@csrf
@method('DELETE')
 <button type="button" class="btn btn-primary "" onclick=" location.href='{{route('contato.edit', [$contato->id])}}'">Editar</button>
 <button type="submit" class="btn btn-danger">Deletar</button>
</form>
