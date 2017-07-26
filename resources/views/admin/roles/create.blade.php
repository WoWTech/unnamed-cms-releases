@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Create Role</h2>
  </header>

  <div class="content-wrapper">
    <form action="{{ route('admin.roles.store') }}" method="POST" class="edit-role-form">
      <div class="role-details">
        <div class="role-attributes">
          {{ csrf_field() }}
          @include('layouts.input_errors')
          <div class="input-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="" required>
          </div>
          <div class="input-group">
            <label for="display_name">Display name</label>
            <input id="display_name" type="text" name="display_name" value="" required>
          </div>
          <div class="input-group">
            <label for="description">Description</label>
            <input id="description" type="text" name="description" value="" required>
          </div>
        </div>
        <div class="role-permissions">
          <h3>Permissions:</h3>
          @foreach($permissions as $permission)
            <div class="permission">
              <input type="checkbox" name="role_permissions[]" value="{{ $permission->id }}">
              <span>{{ $permission->display_name }}</span>
            </div>
          @endforeach
        </div>
      </div>
      <div class="input-group">
        <input type="submit" name="submit" value="Create role" >
      </div>
    </form>
  </div>
@endsection
