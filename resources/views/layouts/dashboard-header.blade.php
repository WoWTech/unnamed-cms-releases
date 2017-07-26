<header>
  <div class="logo">
    {{ config('app.name', 'Unnamed-CMS')}}
  </div>

  <div class="user-panel">
    <img src="{{ asset('images/user_avatar.png') }}" alt="">
    <span>{{ Auth::user()->username }}</span>
  </div>
</header>
