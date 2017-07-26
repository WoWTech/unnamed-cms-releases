@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Create Account</h2>
  </header>

  <div class="content-wrapper">
    <form action="{{ route('admin.accounts.store') }}" method="POST">

      @include('layouts.input_errors')

      {{ csrf_field() }}
      <div class="input-group">
        <label for="username">Username</label>
        <input id="username" type="text" name="username" value="{{old('username')}}" required>
      </div>
      <div class="input-group">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{old('email')}}" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
      </div>
      <div class="input-group">
        <label for="password">Confirm password</label>
        <input id="password" type="password" name="password_confirmation" required>
      </div>
      <div class="input-group">
        <input type="submit" name="submit" value="Create Account" >
      </div>
    </form>
  </div>
@endsection
