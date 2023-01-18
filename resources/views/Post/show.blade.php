@extends('layout')
@section('content')
    <div class="jumbotron text-center">
        <h1>Showing {{ $post->title }}</h1>
        <h2>{{ $post->title }}</h2>
        <p>
            <strong>Content:</strong> {{ $post->content }}<br>
            <strong>Created_at:</strong> {{ $post->created_at }}<br>
            <strong>Total Like:</strong> {{ $countLike->count() }}<br>
            <strong>Like:</strong><br>
            @foreach ($post->like as $like)
                <th>
                    {{ $like->user->name }}<br>
                </th>
            @endforeach
            <strong>Total Share:</strong> {{ $countShare->count() }}<br>
            <strong>Shares:</strong><br>
            @foreach ($post->share as $share)
                <th>
                    {{ $share->user->name }}<br>
                </th>
            @endforeach
            <strong>Comment:</strong><br>
            @foreach ($post->comment as $comment)
                <th>
                    {{ $comment->body }}<br>
                </th>
            @endforeach
            <strong>Reply:</strong>
            @foreach ($post->comment_replies as $replies)
                <th>
                    {{ $replies->reply }}<br>
                </th>
            @endforeach
        </p>
    </div>

    </div>
@endsection
