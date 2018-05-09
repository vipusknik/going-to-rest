@extends ('admin.layouts.master')

@section ('title', $company->name . ": редактирование")

@section ('content')
    <div class="container mx-auto mt-3">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">
              {{ $company->name }}: редактирование
            </p>
          </header>
          <div class="card-content">
            <div class="content">
                <form action="{{ route('admin.active-rest-companies.update', $company) }}" method="post" @keydown.enter.prevent="">
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
                                       value="{{ old('name', $company->name) }}"
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
                                       value="{{ old('location', $company->location) }}"
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
                                       value="{{ old('distribution_address', $company->distribution_address) }}"
                                       placeholder="Адреса распространения">
                              </div>
                            </div>
                        </div>

                        @include('admin.partials.contact-inputs', [ 'model' => $company ])

                        @if ($errors->has('activities'))
                            <p class="help is-danger">{{ $errors->first('activities') }}</p>
                        @endif

                        <activity-select-list heading="Виды отдыха"
                                              :items-initial="{{ json_encode($activities) }}"
                                              :items-selected-initial="{{ json_encode($company->activities) }}"
                                              endpoint="/admin/activities"
                                              description-input-name="activities"
                                              description-input-placeholder="Цена"
                                              description-field="cost"
                                              modal-heading="Виды отдыха"
                                              class="mb-6">
                          </activity-select-list>

                        @include ('admin.partials.description-input', [ 'model' => $company ])
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
