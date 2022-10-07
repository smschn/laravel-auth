@extends('layouts.app')

@section('content')

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">ID #</th>
                  <th scope="col">Titolo</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->slug}}</td>
                    <td>
                        <a href="#" class="btn btn-primary">Mostra</a>
                        <a href="#" class="btn btn-warning">Modifica</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection