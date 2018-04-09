<nav class="navbar is-white m-0">
  <div class="container">
    <div class="navbar-brand">
      <a class="navbar-item brand-text" href="../">
        {{ config('app.name') }}
      </a>
      <div class="navbar-burger burger" data-target="navMenu">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div id="navMenu" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="admin.html">
          Главная
        </a>
        <a class="navbar-item" href="{{ route('admin.rest-centers.index') }}">
          Пляж
        </a>
      </div>
    </div>
  </div>
</nav>
