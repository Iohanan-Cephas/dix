@extends('layouts.app', ['pageSlug'=>'edit'])

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Editar Notícia</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" name="title" class="form-control" value="{{ $news->title }}" required>
                </div>

                <div class="form-group">
                    <label for="content">Conteúdo</label>
                    <textarea name="content" class="form-control" rows="5" required>{{ $news->content }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Atualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection