@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 mt-4">
            <div class="float-start">
                <h2>Create Role</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-secondary" href="{{ route('roles.index') }}">Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong> Your role is not created!!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <label>Role :</label>
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <label>Slug :</label>
                    <input type="text" name="slug" class="form-control">
                </div>
            </div>
            @foreach($permissions as $permission)
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-check">
                    <input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}
                </div>
            </div>
            @endforeach
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </div>
    </form>
@endsection
