@extends ('admin.layouts.master')

@section ('title', 'Добавление медицинского центра')

@section ('content')
    <div class="container mx-auto mt-3">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">
              Добавление медицинского центра
            </p>
          </header>
          <div class="card-content">
            <div class="content">
                <form action="{{ route('admin.medical-centers.store') }}" method="post" @keydown.enter.prevent="">
                    @csrf

                    <div class="mb-6 pb-6 border-b border-grey-light">
                        <div class="field-body flex mb-4">
                            <div class="field w-1/3">
                              <label class="label">Название</label>
                              <div class="control">
                                <input class="input {{ $errors->has('name') ? ' is-danger' : '' }}"
                                       type="text"
                                       name="name"
                                       value="{{ old('name') }}"
                                       placeholder="Медицинский центр"
                                       required="true">
                              </div>
                              @if ($errors->has('name'))
                                <p class="help is-danger">{{ $errors->first('name') }}</p>
                              @endif
                            </div>

                            <div class="field w-1/3">
                              <label class="label">Расположение</label>
                              <div class="control">
                                <input class="input {{ $errors->has('location') ? ' is-danger' : '' }}"
                                       type="text"
                                       name="location"
                                       value="{{ old('location') }}"
                                       placeholder="Расположение"
                                       required="true">
                              </div>

                              @if ($errors->has('location'))
                                <p class="help is-danger">{{ $errors->first('location') }}</p>
                              @endif
                            </div>

                            <div class="field w-1/3">
                              <label class="label">Адреса распространения</label>
                              <div class="control">
                                <input class="input"
                                       type="text"
                                       name="distribution_address"
                                       value="{{ old('distribution_address') }}"
                                       placeholder="Адреса распространения">
                              </div>
                            </div>
                        </div>

                        <div class="field-body flex mb-4">
                          <div class="field w-1/3 mr-3">
                            <label class="label">
                              Телефоны <span class="text-sm text-grey-dark">(укажите через запятую)</span>
                            </label>

                            <div class="control">
                              <input class="input {{ $errors->has('contacts') ? ' is-danger' : '' }}"
                                     type="text"
                                     name="contacts"
                                     value="{{ old('contacts') }}"
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
                                     value="{{ old('email') }}"
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
                                     value="{{ old('site_link') }}"
                                     placeholder="Ссылка на сайт">
                            </div>
                          </div>
                        </div>

                        <div class="mb-6">
                            @include ('admin.social-media.inputs', [ 'socialMedia' => null ])
                        </div>

                        <features-attach :features="{{ json_encode($features) }}" class="mb-6"></features-attach>

                        <div class="field">
                          <label class="label">Описание</label>
                          <div class="control">
                            <wysiwig name="description"
                                     value="{{ old('description') }}"
                                     placeholder="Описание медицинского центра">
                            </wysiwig>
                          </div>
                        </div>
                    </div>

                    <div class="field is-grouped">
                      <div class="control">
                        <button class="button is-link">Сохранить</button>
                      </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>

@endsection
