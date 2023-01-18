@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="float-start">
                <h2>Update Post</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-secondary" href="{{ route('post.index') }}">Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong> Your post has a updated error!!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
    <form action="{{ route('post.update',$post->id) }}" method="POST">
        @csrf
       
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <label>Title :</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <label>Description :</label>
                    <input type="text" name="content" class="form-control" value="{{ $post->content}}">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
@endsection
