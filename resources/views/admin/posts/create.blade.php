@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{route('admin.posts.store')}}" method="POST">

            @csrf

            <div class="form-group mb-3">
                <label for="titleT">Title:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="titleT" name="title" required max="255" value="{{old('title')}}"> {{-- aggiungo required e max come 'validazioni' semplici: cambiando html da browser possono essere tolti (= metodo insicuro) --}}
                
                @error('title')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="contentC">Content:</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="contentC" name="content" required>{{old('title')}}</textarea>
                
                @error('content')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create post</button>

        </form>
    </div>

@endsection