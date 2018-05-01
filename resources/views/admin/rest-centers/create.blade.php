@extends ('admin.layouts.master')

@section ('title', 'Добавление базы отдыха')

@section ('content')
    <div class="container mx-auto mt-3">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">
              Добавление базы отдыха
            </p>
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
                                       placeholder="База отдыха"
                                       required="true">
                              </div>
                              @if ($errors->has('name'))
                                <p class="help is-danger">{{ $errors->first('name') }}</p>
                              @endif
                            </div>

                            <div class="field w-1/3">
                              <label class="label">Водоем</label>
                              <div class="control">
                                <div class="select w-full {{ $errors->has('reservoir_id') ? ' is-danger' : '' }}">
                                  <select name="reservoir_id" class="w-full" required="true">
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
                                       placeholder="Расположение"
                                       required="true">
                              </div>

                              @if ($errors->has('location'))
                                <p class="help is-danger">{{ $errors->first('location') }}</p>
                              @endif
                            </div>
                        </div>

                        @include('admin.partials.contact-inputs', [ 'model' => null ])

                        <features-attach :features="{{ json_encode($features) }}"></features-attach>

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
