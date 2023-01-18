@extends('layouts.dashboard')

@section('content')

    <div class="row py-lg-2">
        <div class="col-lg-12 mb-2"">
            <div class="float-start">
            <h2>This is user List</h2>
            </div>
       
        <div class="float-end">
            <a href="{{route('users.create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Create New
                User</a>
        </div>
    </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table dataTable table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Permissions</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if (!\Auth::user()->hasRole('Admin') && $user->hasRole('Admin'))
                                @continue;
                            @endif
                            <tr {{ Auth::user()->id == $user->id ? 'bgcolor=#ddd' : '' }}>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->roles->isNotEmpty())
                                        @foreach ($user->roles as $role)
                                            <span class="badge bg-info text-dark">
                                                {{ $role->name }}
                                            </span>
                                        @endforeach
                                    @endif

                                </td>
                                <td>
                                    @if ($user->permissions->isNotEmpty())
                                        @foreach ($user->permissions as $permission)
                                            <span class="badge bg-success">
                                                {{ $permission->name }}
                                            </span>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('users.show',$user->id) }}"><i class="fa fa-eye"></i></a>
                                    <a href="{{route('users.edit',$user->id) }}"><i class="fa fa-edit"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#deleteModal"
                                        data-userid="{{ $user->id }}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
