@extends ('admin.layouts.master')

@section ('title', 'Активный отдых: добавление компании')

@section ('content')
    <div class="container mx-auto mt-3">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">
              Активный отдых: добавление компании
            </p>
          </header>
          <div class="card-content">
            <div class="content">
                <form action="{{ route('admin.active-rest-companies.store') }}" method="post" @keydown.enter.prevent="">
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
                                       placeholder="Название"
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

                        @include('admin.partials.contact-inputs', [ 'model' => null ])

                        <div class="mb-6">
                          @if ($errors->has('activities'))
                              <p class="help is-danger">{{ $errors->first('activities') }}</p>
                          @endif

                          <activity-select-list :items-initial="{{ json_encode($activities) }}"></activity-select-list>
                        </div>

                        @include ('admin.partials.description-input', [ 'model' => null ])
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
