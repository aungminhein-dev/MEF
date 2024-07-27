@extends('auth.layout.app')
@section('title','Create Role')

@section('content')
<div class="container">
    <h1>Create Role</h1>
    <form action="{{ route('manage-roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Role Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group mt-4">
            <h3>Assign Permissions:</h3>
            <div class="row">
                @foreach($permissions as $permissionGroup => $permissionList)
                    <div class="col-md-3">
                        <h4>{{ ucfirst($permissionGroup) }}</h4>
                        @foreach($permissionList as $permission)
                            <div class="form-check">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="permission-{{ $permission->id }}" class="form-check-input">
                                <label for="permission-{{ $permission->id }}" class="form-check-label">
                                    {{ ucfirst($permission->name) }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Create Role</button>
    </form>
</div>

@endsection
