<aside class="sidebar">
    @if (Auth::check())
      <div class="block with-border">
          <div class="block-content">
              <div class="user-area">
                  <div class="user-info">
                      <div class="user-avatar">

                      </div>

                      <div class="user-details">
                          <p>{{ Auth::user()->username }}</p>
                          <span class="bonuses">1000 bonuses</span>
                      </div>


                      <a href="{{ route('logout') }}" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                  </div>

              </div>

              <div class="user-buttons">
                @permission('view-dashboard')
                  <a href="{{ route('dashboard') }}" class="btn red-bg">Control panel</a>
                @endpermission
                  <a href="#" class="btn blue-bg">Account settings</a>
              </div>

          </div>
      </div>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
    @else
      <div class="block">

          <div class="block-header">
              Login
          </div>
          <div class="block-content">
            <form action="{{ route('login') }}" method="post">
              {{ csrf_field() }}
              <input type="text" name="username" placeholder="Account" class="{{ $errors->has('username') ? 'has-error' : '' }}" value="{{ old('username') }}">
              <input type="password" name="password" placeholder="Password" class="{{ $errors->has('password') ? 'has-error' : '' }}">
              <input type="submit" value="Submit" class="blue">

            </form>
          </div>

      </div>
    @endif
</aside>
