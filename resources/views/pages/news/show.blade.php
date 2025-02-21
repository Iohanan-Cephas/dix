@extends('layouts.app', ['pageSlug'=>'show'])

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{ $news->title }}</h4>
        </div>
        <div class="card-body">
            <p class="mt-3">{{ $news->content }}</p>
            <a href="{{ route('news.show') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
@endsection