@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Edit Account</h2>
  </header>

  <div class="content-wrapper">
    <form action="{{ route('admin.accounts.update', $account) }}" method="POST">

      @include('layouts.input_errors')

      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <div class="input-group">
        <label for="username">Username</label>
        <input id="username" type="text" name="username" value="{{ $account->username }}" required>
      </div>
      <div class="input-group">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ $account->email }}" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" rows="18" value="{{ $account->password }}">
      </div>
      <div class="input-group">
        <label for="expansion">Expansion</label>
        <input id="expansion" type="number" name="expansion" min="1" max="6" value="{{ $account->expansion }}">
      </div>
      <div class="input-group">
        <label for="expansion">Site roles</label>
        <div class="roles-array">
          @foreach ($roles as $role)
            <div class="role-block">
              <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ !$account->hasRole($role->name) ?: 'checked' }}>
              <span class="role-caption">{{ $role->display_name }}</span>
            </div>
          @endforeach
        </div>
      </div>
      <div class="input-group">
        <input type="submit" name="submit" value="Save account" >
      </div>
    </form>
  </div>
@endsection
