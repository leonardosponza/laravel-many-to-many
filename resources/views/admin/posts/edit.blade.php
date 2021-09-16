@extends('layouts.app')

@section('content')
<div class="container-fluid">    
    <div class="row app-height">
        @include('partials.aside')
        
        <div class="col-md-10 main-content">
            @include('partials.usernav')
            <div class="container-fluid current-container my-5">
                <div class="current-page row justify-content-between">
                    <div class="col-6">
                        <div class="font-mid f-400">Modifica {{$post->title}}</div>
                    </div>
                </div>
            </div>

            <div class="container-fluid records-container-fluid">
                <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-container">
                        <div class="mb-5">
                            <label for="category" class="form-label">Tag</label>
                            {{-- name corrispondente con old (category_id) --}}
                            <select name="category_id" id="category" class="minimal-input form-control">
                                <option value="">-- Seleziona una categoria --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ old('category_id', $category->id) }}"
                                        @if($category->id == old('category_id')) selected @endif>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="title" class="form-label">Titolo</label>
                            <input class="minimal-input form-control edit-text @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="content" class="form-label">Contenuto</label>
                            <textarea rows="7" class="minimal-input form-control edit-text @error('content') is-invalid @enderror" name="content" id="content">
                                {{ old('content', $post->content) }}
                            </textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-login">Modifica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection