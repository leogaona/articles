<!-- resources/views/articles/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Articles</h2>
        <button class="btn btn-primary my-2" onclick="toggleForm()">Create</button>

        {{-- FORMULARIO CREATE --}}
        <div id="createForm" style="display: none;">
            <h2>Create Article</h2>
            <form action="{{ route('articles.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>slug</th>
                    <th>Edit</th>
                    <!-- Agrega más columnas según tus necesidades -->
                </tr>
            </thead>
            <tbody>
                @if(count($articles) > 0)
                    
                
                     @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->content }}</td>
                        <td>{{ $article->slug }}</td>
                        <td>
                            <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-info">View</a>
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <p>Opps..No Articles found!</p>
                @endif
                
            </tbody>
        </table>
    </div>

    <script>
        ///_MOSTRAR FORM
        function toggleForm() {
            var form = document.getElementById('createForm');
            form.style.display = (form.style.display === 'none') ? 'block' : 'none';
        }
    </script>
@endsection
