@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-primary" href="{{route('admin.posts.create')}}">Add new post</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">ID #</th>
                  <th scope="col">Title</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->slug}}</td>
                    <td>
                        <a href="{{route('admin.posts.show', ['post' => $post->id])}}" class="btn btn-primary">View</a>
                        <a href="#" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection