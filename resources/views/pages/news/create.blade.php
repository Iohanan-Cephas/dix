@extends('layouts.app', ['pageSlug' => 'create'])

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Criar Nova Notícia</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="content">Conteúdo</label>
                    <textarea name="content" class="form-control" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
            </form>
        </div>
    </div>
</div>
@endsection