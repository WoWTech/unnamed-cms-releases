@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Roles</h2>
    <a href="{{ route('admin.roles.create') }}" class="action-badge">+Create new</a>
  </header>

  <div class="content-wrapper">
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Display Name</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($roles as $role)
          <tr>
            <td>{{ $role->name }}</td>
            <td>{{ $role->display_name }}</td>
            <td>{{ $role->description }}</td>
            <td>
              @permission('update-role')
                <a href="{{ route('admin.roles.edit', $role) }}">Edit</a>
              @endpermission
              @permission('delete-role')
              <a href="{{ route('admin.roles.destroy', $role) }}" data-method="DELETE" class="method-link">Delete</a>
              @endpermission
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        setActiveLink('roles');
    </script>
@endsection
