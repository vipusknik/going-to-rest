<div class="field-body flex mb-4">
  <div class="field w-1/3 mr-3">
    <label class="label">
      Телефоны <span class="text-sm text-grey-dark">(укажите через запятую)</span>
    </label>

    <div class="control">
      <input class="input {{ $errors->has('contacts') ? ' is-danger' : '' }}"
             type="text"
             name="contacts"
             value="{{ old('contacts', optional($model)->contacts) }}"
             placeholder="Телефоны">
    </div>

    @if ($errors->has('contacts'))
      <p class="help is-danger">{{ $errors->first('contacts') }}</p>
    @endif
  </div>

  <div class="field w-1/3 mr-3">
    <label class="label">Email</label>

    <div class="control">
      <input class="input {{ $errors->has('email') ? ' is-danger' : '' }}"
             type="email"
             name="email"
             value="{{ old('email', optional($model)->email) }}"
             placeholder="Email">
    </div>

    @if ($errors->has('email'))
      <p class="help is-danger">{{ $errors->first('email') }}</p>
    @endif
  </div>

  <div class="field w-1/3">
    <label class="label">Ссылка на сайт</label>

    <div class="control">
      <input class="input"
             type="text"
             name="site_link"
             value="{{ old('site_link', optional($model)->site_link) }}"
             placeholder="Ссылка на сайт">
    </div>
  </div>
</div>

<div class="mb-6">
    @include ('admin.partials.social-media-inputs', [ 'socialMedia' => $model ? $model->socialMedia() : null  ])
</div>
