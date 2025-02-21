@extends('layouts.app', ['pageSlug'=>'index'])

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Lista de Notícias</h4>
            <a href="{{ route('news.create') }}" class="btn btn-primary">Criar Notícia</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Conteúdo</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ Str::limit($item->content, 50) }}</td>
                            <td>
                                <a href="{{ route('news.unique', $item->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('news.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection