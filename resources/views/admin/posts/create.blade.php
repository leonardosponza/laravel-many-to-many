@extends('layouts.app')

@section('content')
<div class="container-fluid">    
    <div class="row app-height">
        @include('partials.aside')
        
        <div class="col-md-10 main-content">
            {{-- upper common navbar --}}
            @include('partials.usernav')
            {{-- upper common navbar --}}

            {{-- current page start --}}
            <div class="container-fluid current-container my-5">
                <div class="current-page row justify-content-between">
                    <div class="col-3">
                        <div class="font-mid f-400">Crea un post</div>
                    </div>
                </div>
            </div>
            {{-- current page end --}}
            
            {{-- main content start --}}
            <div class="container-fluid records-container-fluid">
                <form action="{{ route('admin.posts.store') }}" method="post">
                    @csrf

                    <div class="form-container">
                        <div class="mb-5">
                            <label for="category" class="form-label">Tag</label>
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
                            <input class="minimal-input form-control edit-text @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title') }}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="content" class="form-label">Contenuto</label>
                            <textarea rows="7" class="minimal-input form-control edit-text @error('content') is-invalid @enderror" name="content" id="content">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-login">Invia</button>
                    </div>
                </form>
            </div>
            {{-- main content end --}}
        </div>
    </div>
</div>
@endsection