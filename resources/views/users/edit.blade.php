@extends('layout')

@section('content')

    <h2>Edit User</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
        @csrf()
        @method('POST')

        <div class="form-group">
            <label for="name">User name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Name..."
                value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email..."
                value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password..."
                minlength="4">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Password Confirm</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Password..."
                id="password_confirmation">
        </div>

        <div class="form-group">
            <label for="role">Select Role</label>
            <select class="role form-control" name="role" id="role">
                <option value="">Select Role...</option>
                @foreach ($roles as $role)
                    <option data-role-id="{{ $role->id }}" data-role-slug="{{ $role->slug }}"
                        value="{{ $role->id }}"
                        {{ $user->roles->isEmpty() || $role->name != $userRole->name ? '' : 'selected' }}>
                        {{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <label for="roles_permissions">Permissions</label>
            @foreach ($permissions as $permission)
                <div class="form-check">
                    <input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                        @foreach ($user->permissions as $role_permission)
                    {{ $permission->id == $role_permission->id ? 'checked' : '' }} @endforeach>{{ $permission->name }}
                </div>
            @endforeach
        </div>


        <div class="form-group pt-2">
            <input class="btn btn-primary" type="submit" value="Submit">
        </div>
    </form>

@endsection
