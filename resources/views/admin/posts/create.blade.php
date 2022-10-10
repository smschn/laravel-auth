@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="titleT">Title:</label>
                <input type="text" class="form-control" id="titleT" name="title" required max="255"> {{-- aggiungo required e max come 'validazioni' semplici --}}
            </div>
            <div class="form-group mb-3">
                <label for="contentC">Content:</label>
                <textarea class="form-control" id="contentC" name="content" required></textarea> {{-- aggiungo required come 'validazione' semplice --}}
            </div>
            <button type="submit" class="btn btn-primary">Create post</button>
        </form>
    </div>

@endsection