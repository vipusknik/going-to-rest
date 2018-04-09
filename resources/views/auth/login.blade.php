<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Free Bulma template</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <!-- Bulma Version 0.6.0 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css" integrity="sha256-HEtF7HLJZSC3Le1HcsWbz1hDYFPZCqDhZa9QsCgVUdw=" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="/css/login.css">
</head>
<body>
  <section class="hero is-success is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
          <h3 class="title has-text-grey">Вход</h3>
          <div class="box">
            <figure class="avatar">
              <img src="https://placehold.it/128x128">
            </figure>
            <form action="{{ route('login') }}" method="post">
              @csrf
              <div class="field">
                <div class="control">
                  <input class="input is-large" type="email" name="email" placeholder="email" autofocus="true">
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <input class="input is-large" type="password" name="password" placeholder="пароль">
                </div>
              </div>
              {{-- <div class="field">
                <label class="checkbox">
                  <input type="checkbox">
                  Запомнить меня
                </label>
              </div> --}}
              <button class="button is-block is-info is-large is-fullwidth">Войти</button>
            </form>
          </div>
          <p class="has-text-grey">
            <a href="../">Зарегистрироваться</a>
          </p>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
