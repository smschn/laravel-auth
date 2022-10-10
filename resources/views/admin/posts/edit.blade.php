@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{route('admin.posts.update', ['post' => $post->id])}}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="titleT">Title:</label>
                <input type="text" class="form-control" id="titleT" name="title" required max="255" value="{{old('title', $post->title)}}"> {{-- aggiungo required e max come 'validazioni' semplici --}}
            </div>

            <div class="form-group mb-3">
                <label for="contentC">Content:</label>
                <textarea class="form-control" id="contentC" name="content" required>{{old('content', $post->content)}}</textarea> {{-- aggiungo required come 'validazione' semplice --}}
            </div>

            <button type="submit" class="btn btn-primary">Edit post</button>

        </form>
    </div>

@endsection