@extends('layouts.app')

@section('content')
  <section class="page-content">
    <header>
      <h2>Registration</h2>
    </header>
    <form action="{{ route('register') }}" method="POST">

      @include('layouts.input_errors')

      {{ csrf_field() }}
      <div class="input-group">
        <label for="username">Login</label>
        <input id="username"  type="text" name="username" placeholder="AlexBuddy01" required>
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" placeholder="*************" required>
      </div>

      <div class="input-group">
        <label for="password-confirm">Password confirmation</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
      </div>

      <div class="input-group">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" placeholder="myemail@mail.com" required>
      </div>

      <div class="input-group">
        <input type="submit" value="Register">
      </div>
    </form>
  </section>
@endsection
