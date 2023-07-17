<!-- webpage's header theme. include the company name and logo and navigation bar -->
<header>
  <myName>
    <div class="header-content">
      <object class="logo" type="image/svg+xml" data="/svg/cooltech.svg"></object>
      <span class="logo-title">Cool Tech</span>
    </div>
  </myName>
  <navbar>
    <nav id="Article"><a href="{{ url('/') }}" >Home</a></nav>
    <nav id="search"><a href="{{ url('/search') }}">Search</a></nav>
    <nav id="legal"><a href="{{ url('/legal') }}">Legal</a></nav>
    <nav id="aboutme"><a href="{{ url('/about-us') }}">About me</a></nav>
  </navbar>
</header>

