<div class="upper-body">

    <div class="logo"></div>
    <div class="header">
        <div class="slider">
            <div class="slider-images">
                <img src="{{ asset('images/image.png') }}" alt="">
                <img src="{{ asset('images/image.png') }}" alt="">
                <img src="{{ asset('images/image.png') }}" alt="">
            </div>
            <div class="slider-buttons">
                <span class="slider-dot"></span>
                <span class="slider-dot"></span>
                <span class="slider-dot"></span>
            </div>
        </div>

        <div class="server">
            <div class="server-info">
                <div class="realm-logo"></div>
                <div class="realm-name">
                    {{ $realm->name ?: 'Placeholder for your realm name' }}
                </div>
                <span class="server-status-badge {{ $realm->status ? 'online' : 'offline' }} ">{{ $realm->status ? 'Online' : 'Offline' }}</span>
            </div>

            <div class="server-details">
                <span class="badge rounded">
                  <span class="light-blue">
                    {{ $online->alliance ?: '0' }}
                  </span>
                  <span style="color:#95989A">/</span>
                  <span class="red">{{ $online->horde ?: '0' }}</span>
                </span>
                <span class="badge rounded {{ $realm->status ? 'green' : 'red' }}">
                  {{ $realm->status ? "$uptime->hours hours $uptime->minutes minutes uptime" : 'Server is offline' }}
                </span>
            </div>

            <div class="server-modes">
                <span class="badge red">
        PvP
      </span>
                <span class="badge yellow">
        PvE
      </span>
                <span class="badge light-blue">
        RP
      </span>
            </div>

            <div class="server-buttons">
                <a href="{{ route('register') }}">Registration</a>
                <a href="{{ route('forum') }}">Forum</a>
                <a href="{{ route('online') }}">Statistic</a>
            </div>
        </div>
    </div>
</div>
