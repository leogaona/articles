<!-- resources/views/articles/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        
        <h2>{{ $article->title }}</h2>
        <p>{{ $article->content }}</p>
        <a href="{{ route('articles.index') }}" class="btn btn-primary">
            <i class="bi bi-house-door"></i> Back to Home
        </a>
    </div>
@endsection
