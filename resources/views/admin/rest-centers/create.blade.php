@extends ('admin.layouts.master')

@section ('title', 'Добавление базы отдыха')

@section ('content')
    <div class="container mx-auto mt-3">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">
              Добавление базы отдыха
            </p>
            <a href="#" class="card-header-icon" aria-label="more options">
              <span class="icon">
                <i class="fa fa-angle-down" aria-hidden="true"></i>
              </span>
            </a>
          </header>
          <div class="card-content">
            <div class="content">
                <form action="{{ route('admin.rest-centers.store') }}" method="post" @keydown.enter.prevent="">
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
                                       placeholder="База отдыха">
                              </div>
                              @if ($errors->has('name'))
                                <p class="help is-danger">{{ $errors->first('name') }}</p>
                              @endif
                            </div>

                            <div class="field w-1/3">
                              <label class="label">Водоем</label>
                              <div class="control">
                                <div class="select w-full {{ $errors->has('reservoir_id') ? ' is-danger' : '' }}">
                                  <select name="reservoir_id" class="w-full">
                                    @foreach ($reservoirs as $reservoir)
                                        <option value="{{ $reservoir->id }}"
                                                {{ (old('reservoir_id') == $reservoir->id) ? 'selected' : '' }}>
                                            {{ $reservoir->name }}
                                        </option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>

                              @if ($errors->has('reservoir_id'))
                                <p class="help is-danger">{{ $errors->first('reservoir_id') }}</p>
                              @endif
                            </div>

                            <div class="field w-1/3">
                              <label class="label">Расположение</label>
                              <div class="control">
                                <input class="input {{ $errors->has('location') ? ' is-danger' : '' }}"
                                       type="text"
                                       name="location"
                                       value="{{ old('location') }}"
                                       placeholder="Расположение">
                              </div>

                              @if ($errors->has('location'))
                                <p class="help is-danger">{{ $errors->first('location') }}</p>
                              @endif
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

                        <attach-features :features-initial="{{ json_encode($features) }}"
                                         heading="Выберите удобства и варианты досуга"
                                         belongs-to="{{ \App\Feature::OF_REST_CENTER }}"
                                         :categories="{{ json_encode($featureCategories) }}"
                                         class="mb-6">
                        </attach-features>

                        <div class="field mb-6">
                          <label class="label">Размещения</label>
                          <div class="control">
                            <wysiwig name="accomodation"
                                     value="{{ old('accomodation') }}"
                                     placeholder="Размещения"
                                     :min-height="100">
                            </wysiwig>
                          </div>
                        </div>

                        <div class="field">
                          <label class="label">Описание</label>
                          <div class="control">
                            <wysiwig name="description"
                                     value="{{ old('description') }}"
                                     placeholder="Описание базы">
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
