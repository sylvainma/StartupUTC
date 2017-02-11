<nav>
  <div class="nav-wrapper">
    <div class="container">
      <a href="{{ route('index') }}" class="brand-logo">
        <img src="{{ asset('assets/img/logo_white_xsmall.png') }}" alt="Open Datalab" />
      </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="{{ route('search') }}">Explorer</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>
