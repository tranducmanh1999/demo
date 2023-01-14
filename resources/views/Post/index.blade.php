@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-2">
            <div class="float-star">
                <h2>Post</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="#"> Create a New Post</a>
            </div>
        </div>
    </div>
    <table class="table table-border mt-2">
        <tr>
            <th>STT</th>
            <th>Tittle</th>
            <th>Post User</th>
            <th>Like</th>
            <th>Share</th>
            <th>Comment</th>
            <th>Action</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $like }}</td>
                <td>{{ $post->share->count() }}</td>
                <td>@php($total = $post->comment->count() + $post->comment_replies->count()) {{ $total }}</td>
                <td>
                    {{-- <form action="#" method="POST"> --}}
                        <a class="btn btn-info" href="#">Show</a>
                        <a class="btn btn-warning" href="#">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    {{-- </form> --}}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
