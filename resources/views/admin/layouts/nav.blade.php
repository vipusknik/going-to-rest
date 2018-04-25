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
        <a class="navbar-item text-black font-semibold" href="{{ route('admin.rest-centers.index') }}">
          Пляж
        </a>

        <a class="navbar-item text-black font-semibold" href="{{ route('admin.medical-centers.index') }}">
          Медицинский туризм
        </a>

        <a class="navbar-item text-black font-semibold" href="{{ route('admin.kid-camps.index') }}">
          Детский отдых
        </a>

        <a class="navbar-item text-black font-semibold" href="{{ route('admin.active-rest-companies.index') }}">
          Активный отдых
        </a>
      </div>

      <div class="navbar-end">
        <a class="navbar-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Выйти
        </a>

        <form action="/logout" method="post" id="logout-form">
          @csrf
        </form>
      </div>
    </div>
  </div>
</nav>
