@extends ('admin.layouts.master')

@section ('title', 'Добавление базы отдыха')

@section ('content')
    <div>
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
                <form action="{{ route('admin.rest-centers.store') }}" method="post">
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

                        <div class="field mb-6">
                          <label class="label">
                            Контакты <span class="text-sm text-grey-dark">(укажите через запятую)</span>
                          </label>

                          <div class="control">
                            <input class="input {{ $errors->has('contacts') ? ' is-danger' : '' }}"
                                   type="text"
                                   name="contacts"
                                   value="{{ old('contacts') }}"
                                   placeholder="Контакты">
                          </div>

                          @if ($errors->has('location'))
                            <p class="help is-danger">{{ $errors->first('contacts') }}</p>
                          @endif
                        </div>

                        <div class="mb-6">
                            <h3 class="text-base text-black font-bold">Удобства</h3>
                            <div class="p-4 border border-grey-light rounded">
                                @foreach ($features->where('belongs_to', 'rest_center')->where('category', 'facilities') as $feature)
                                    <div class="field flex">
                                      <label class="block text-indigo-light label w-1/5">{{ $feature->name }}</label>
                                      <div class="control w-1/5 mr-6">
                                        <div class="select w-full">
                                          <select name="features[{{ $feature->id }}]" class="w-full">
                                            <option value="">не выбрано</option>
                                            @foreach ($feature->options as $option)
                                                <option value="{{ $option }}"
                                                        {{ (old("features.{$feature->id}") == $option) ? 'selected' : '' }}>
                                                    {{ $option }}
                                                </option>
                                            @endforeach
                                          </select>
                                        </div>

                                      </div>

                                      {{-- <div class="control w-1/5">
                                        <input class="input" type="text" name="contacts" placeholder="другая опция">
                                      </div> --}}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="field">
                          <label class="label">Описание</label>
                          <div class="control">
                            <textarea class="textarea h-64"
                                      name="description"
                                      placeholder="Описание базы">{{ old('description') }}</textarea>
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
