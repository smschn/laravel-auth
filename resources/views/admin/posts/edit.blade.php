@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{route('admin.posts.update', ['post' => $post->id])}}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="titleT">Title:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="titleT" name="title" required max="255" value="{{old('title', $post->title)}}">

                @error('title')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="contentC">Content:</label>
                <textarea class="form-control @error('title') is-invalid @enderror" id="contentC" name="content" required>{{old('content', $post->content)}}</textarea>

                @error('content')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Edit post</button>

        </form>
    </div>

@endsection