@extends('layouts.dashboard')
@section('content')
    <div class="row py-lg-2">
        <div class="col-lg-12 mb-2">
            <div class="float-start">
                 <h2>Role List</h2>
            </div>
            <div class="float-end">
                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-lg float-md-right" role="button"
                    aria-pressed="true">Create New Role</a>
            </div>
        </div>
    </div>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table dataTable table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Role</th>
                            <th>Slug</th>
                            <th>Permissions</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->slug }}</td>
                                <td>
                                    @if ($role->permissions != null)
                                        @foreach ($role->permissions as $permission)
                                            <span class="badge bg-info text-dark">
                                                {{ $permission->name }}
                                            </span>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('roles.show', $role->id) }}"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('roles.edit', $role->id) }}"><i class="fa fa-edit"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#deleteModal"
                                        data-roleid="{{ $role->id }}"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
