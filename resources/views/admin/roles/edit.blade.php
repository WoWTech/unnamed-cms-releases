@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Edit Role</h2>
  </header>

  <div class="content-wrapper">
    <form action="{{ route('admin.roles.update', $role) }}" method="POST" class="edit-role-form">
      <div class="role-details">
        <div class="role-attributes">
          {{ csrf_field() }}
          {{ method_field('PATCH') }}
          <div class="input-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ $role->name }}" required>
          </div>
          <div class="input-group">
            <label for="display_name">Display name</label>
            <input id="display_name" type="text" name="display_name" value="{{ $role->display_name }}" required>
          </div>
          <div class="input-group">
            <label for="description">Description</label>
            <input id="description" type="text" name="description" value="{{ $role->description }}" required>
          </div>
        </div>
        <div class="role-permissions">
          <h3>Permissions:</h3>
          @foreach($permissions as $permission)
            <div class="permission">
              <input type="checkbox" name="role_permissions[]" value="{{ $permission->id }}" {{ !$role->hasPermission($permission->name) ?: 'checked' }}>
              <span>{{ $permission->display_name }}</span>
            </div>
          @endforeach
        </div>
      </div>
      <div class="input-group">
        <input type="submit" name="submit" value="Save role" >
      </div>
    </form>
  </div>
@endsection
