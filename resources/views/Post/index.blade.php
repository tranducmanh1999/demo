@extends('layouts.dashboard')
@section('content')
    <div class="row py-lg-2">
        <div class="col-lg-12 mb-2">
            <div class="float-start">
                <h2>Post List</h2>
            </div>
            @can('add-post')
                <div class="float-end">
                    <a href="{{ route('post.create') }}"" class="btn btn-primary btn-lg float-md-right" role="button"
                        aria-pressed="true">Create New Post</a>
                </div>
            @endcan
        </div>
    </div>
    <table class="table table-border mt-2">
        <tr>
            <th>STT</th>
            <th>Tittle</th>
            <th>Post User</th>
            <th>Action</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->name }}</td>
                <td>
                    <form action="{{ route('post.delete', $post->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('post.show', $post->id) }}">Show</a>
                        @can('edit-post')
                            <a class="btn btn-warning" href="{{ route('post.edit', $post->id) }}">Edit</a>
                        @endcan
                        @csrf
                        @method('DELETE')
                        @can('delete-post')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
