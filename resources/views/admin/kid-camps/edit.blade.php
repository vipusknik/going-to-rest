@extends ('admin.layouts.master')

@section ('title', $kidCamp->name . ": редактирование")

@section ('content')
    <div class="container mx-auto mt-3">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">
              {{ $kidCamp->name }}: редактирование
            </p>
          </header>
          <div class="card-content">
            <div class="content">
                <form action="{{ route('admin.kid-camps.update', $kidCamp) }}" method="post" @keydown.enter.prevent="">
                    @csrf
                    @method('patch')

                    <div class="mb-6 pb-6 border-b border-grey-light">
                        <div class="field-body flex mb-4">
                            <div class="field w-1/3">
                              <label class="label">Название</label>
                              <div class="control">
                                <input class="input {{ $errors->has('name') ? ' is-danger' : '' }}"
                                       type="text"
                                       name="name"
                                       value="{{ old('name', $kidCamp->name) }}"
                                       placeholder="Детский лагерь"
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
                                       value="{{ old('location', $kidCamp->location) }}"
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
                                       value="{{ old('distribution_address', $kidCamp->distribution_address) }}"
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
                                     value="{{ old('contacts', $kidCamp->contacts) }}"
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
                                     value="{{ old('email', $kidCamp->email) }}"
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
                                     value="{{ old('site_link', $kidCamp->site_link) }}"
                                     placeholder="Ссылка на сайт">
                            </div>
                          </div>
                        </div>

                        <div class="mb-6">
                            @include ('admin.social-media.inputs', [ 'socialMedia' => $kidCamp->social_media_sites ])
                        </div>

                        <features-attach :features="{{ json_encode($features) }}"
                                         :features-attached="{{ json_encode($kidCamp->features) }}"
                                         class="mb-6">
                        </features-attach>

                        <div class="field mb-6">
                          <label class="label">Стоимость</label>
                          <div class="control">
                            <input class="input" type="text" name="cost" value="{{ old('cost', $kidCamp->cost) }}" placeholder="Стимость">
                          </div>
                        </div>

                        <div class="field mb-6">
                          <label class="label">Проживание</label>
                          <div class="control">
                            <wysiwig name="accomodation" value="{{ old('accomodation', $kidCamp->accomodation) }}" placeholder="Проживание" :min-height="100">
                            </wysiwig>
                          </div>
                        </div>

                        <div class="field">
                          <label class="label">Описание</label>
                          <div class="control">
                            <wysiwig name="description"
                                     value="{{ old('description', $kidCamp->description) }}"
                                     placeholder="Описание лагеря">
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
