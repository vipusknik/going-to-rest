@extends ('admin.layouts.master')

@section ('title', $medicalCenter->name . ": редактирование")

@section ('content')
    <div class="container mx-auto mt-3">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">
              {{ $medicalCenter->name }}: редактирование
            </p>
          </header>
          <div class="card-content">
            <div class="content">
                <form action="{{ route('admin.medical-centers.update', $medicalCenter) }}" method="post" @keydown.enter.prevent="">
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
                                       value="{{ old('name', $medicalCenter->name) }}"
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
                                       value="{{ old('location', $medicalCenter->location) }}"
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
                                       value="{{ old('distribution_address', $medicalCenter->distribution_address) }}"
                                       placeholder="Адреса распространения">
                              </div>
                            </div>
                        </div>

                        <div class="field-body flex mb-4">
                          <div class="field w-1/3">
                            <label class="label">Город</label>
                            <div class="control">
                              <div class="select w-full {{ $errors->has('city_id') ? ' is-danger' : '' }}">
                                <select name="city_id" class="w-full">
                                  <option value="">Не выбран</option>
                                  @foreach ($cities as $city)
                                      <option value="{{ $city->id }}"
                                              {{ (old('city_id', $medicalCenter->city_id) == $city->id) ? 'selected' : '' }}>
                                          {{ $city->name }}
                                      </option>
                                  @endforeach
                                </select>
                              </div>
                            </div>

                            @if ($errors->has('city_id'))
                              <p class="help is-danger">{{ $errors->first('city_id') }}</p>
                            @endif
                          </div>

                          <div class="field w-1/3">
                            <label class="label">Район</label>
                            <div class="control">
                              <div class="select w-full {{ $errors->has('region_id') ? ' is-danger' : '' }}">
                                <select name="region_id" class="w-full">
                                  <option value="">Не выбран</option>
                                  @foreach ($regions as $region)
                                      <option value="{{ $region->id }}"
                                              {{ (old('region_id', $medicalCenter->region_id) == $region->id) ? 'selected' : '' }}>
                                          {{ $region->name }}
                                      </option>
                                  @endforeach
                                </select>
                              </div>
                            </div>

                            @if ($errors->has('region_id'))
                              <p class="help is-danger">{{ $errors->first('region_id') }}</p>
                            @endif
                          </div>
                        </div>

                        @include('admin.partials.contact-inputs', [ 'model' => $medicalCenter ])

                        <features-attach :features="{{ json_encode($features) }}"
                                         :features-attached="{{ json_encode($medicalCenter->features) }}"
                                         class="mb-6">
                        </features-attach>

                        @include ('admin.partials.description-input', [ 'model' => $medicalCenter ])
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
