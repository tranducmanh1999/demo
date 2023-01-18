@extends('layouts.dashboard')

@section('content')

    <h1>Update the Role</h1>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('roles.update', $role->id) }}">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="role_name">Role name</label>
            <input type="text" name="role_name" class="form-control" id="role_name" placeholder="Role name..."
                value="{{ $role->name }}" required>
        </div>
        <div class="form-group">
            <label for="role_slug">Role Slug</label>
            <input type="text" name="role_slug" tag="role_slug" class="form-control" id="role_slug"
                placeholder="Role Slug..." value="{{ $role->slug }}" required>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <label for="roles_permissions">Permissions</label>
            @foreach ($permissions as $permission)
                    <div class="form-check">
                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}" @foreach($role->permissions as $role_permission)
                        {{($permission->id == $role_permission->id) ? 'checked' : ''}}
                        @endforeach
                        >{{ $permission->name }}
                    </div>
            @endforeach
        </div>

        <div class="form-group pt-2">
            <input class="btn btn-primary" type="submit" value="Submit">
        </div>
    </form>


@endsection
