@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Accounts</h2>
    <a href="{{ route('admin.accounts.create') }}" class="action-badge">+Create new</a>
  </header>

  <form action="{{ route('admin.accounts.index') }}" method="get">
    <input type="text" name="keywords" class="search-bar" placeholder="Search" value="{{ old('keywords') }}">
  </form>

  <div class="content-wrapper">
    <table>
      <thead>
        <tr>
          <th>Username</th>
          <th>Email</th>
          <th>Join date</th>
          <th>Last IP</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($accounts as $account)
          <tr>
            <td>{{ $account->username }}</td>
            <td>{{ $account->email }}</td>
            <td>{{ $account->joindate->toFormattedDateString() }}</td>
            <td>{{ $account->last_ip }}</td>
            <td>
              @permission('update-user')
                <a href="{{ route('admin.accounts.edit', $account) }}">Edit</a>
              @endpermission
              @permission('delete-user')
              <a href="{{ route('admin.accounts.destroy', $account) }}" data-method="DELETE" class="method-link">Delete</a>
              @endpermission
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $accounts->appends(request()->except('page'))->links() }}
  </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        setActiveLink('accounts');
    </script>
@endsection
