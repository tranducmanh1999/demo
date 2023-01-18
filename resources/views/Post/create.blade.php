@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="float-start">
                <h2>Create Post</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-secondary" href="{{route('post.index')}}">Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong> Your post is not created!!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <label>Title :</label>
                    <input type="text" name="title" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <label>Content :</label>
                    <textarea name="content" class="form-control" row="3"></textarea>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
            <button type="submit" class="btn btn-success">Create</button>
            <input type="hidden" name="user_id" value="{{$user}}">
            <input type="hidden" name="created_at" value="{{$created_at}}">
            <input type="hidden" name="updated_at" value="{{$updated_at}}">
        </div>
    </form>

@endsection
