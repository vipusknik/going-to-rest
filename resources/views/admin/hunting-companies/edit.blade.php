@extends ('admin.layouts.master')

@section ('title', $huntingCompany->name . ': редактирование')

@section ('content')
    <div class="container mx-auto mt-3">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">
              {{ $huntingCompany->name . ': редактирование' }}
            </p>
          </header>
          <div class="card-content">
            <div class="content">
                <form action="{{ route('admin.hunting-companies.update', $huntingCompany) }}" method="post" @keydown.enter.prevent="">
                    @csrf
                    @method ('PATCH')

                    <div class="mb-6 pb-6 border-b border-grey-light">

                        <div class="flex mb-6">
                            <div class="w-1/2 mr-2">
                              <label for="name" class="label">Название</label>
                              <div class="control">
                                <input type="text"
                                       name="name"
                                       id="name"
                                       value="{{ old('name', $huntingCompany->name) }}"
                                       class="h-10 input {{ $errors->has('name') ? ' is-danger' : '' }}"
                                       placeholder="Название"
                                       required>
                              </div>

                              @if ($errors->has('name'))
                                <p class="help is-danger">{{ $errors->first('name') }}</p>
                              @endif
                            </div>

                            <div class="w-1/2 flex">
                              <div class="w-1/2 mr-3 flex flex-col items-center">
                                <label for="hunting" class="label">Охота</label>
                                <div class="w-full h-10 border rounded flex items-center justify-center">
                                  <input type="checkbox"
                                       name="hunting"
                                       id="hunting"
                                       class="control"
                                       {{ old('hunting') == 'off' ? '' : 'checked' }}>
                                </div>
                              </div>

                              <div class="w-1/2 flex flex-col items-center">
                                <label for="fishing" class="label">Рыбалка</label>
                                <div class="w-full h-10 border rounded flex items-center justify-center">
                                  <input type="checkbox"
                                         name="fishing"
                                         id="fishing"
                                         class="control"
                                         {{ old('fishing') == 'off' ? '' : 'checked' }}>
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="flex mb-6">
                            <div class="w-1/3 mr-3">
                              {{-- <editable-select select-label="Регион"
                                               select-name="hunting_region_id"
                                               :select-options-initial="{{ json_encode($regions) }}"
                                               selected-option-id="{{ old('hunting_region_id', $huntingCompany->hunting_region_id) }}"
                                               modal-heading="Регионы"
                                               endpoint="/admin/hunting-places"
                                               :attach-request-data="{ type: 'region' }">
                              </editable-select> --}}
                            </div>

                            <div class="w-1/3 mr-3">
                              {{-- <editable-select select-label="Место"
                                               select-name="hunting_place_id"
                                               :select-options-initial="{{ json_encode($places) }}"
                                               selected-option-id="{{ old('hunting_place_id', $huntingCompany->hunting_place_id) }}"
                                               modal-heading="Места"
                                               endpoint="/admin/hunting-places"
                                               :attach-request-data="{ type: 'place' }">
                              </editable-select> --}}
                            </div>

                            <div class="w-1/3">
                              <label class="label">Адреса распространения</label>
                              <div class="control">
                                <input class="input"
                                       type="text"
                                       name="distribution_address"
                                       value="{{ old('distribution_address', $huntingCompany->distribution_address) }}"
                                       placeholder="Адреса распространения">
                              </div>
                            </div>
                        </div>

                        @include('admin.partials.contact-inputs', [ 'model' => $huntingCompany ])

                        <div class="mb-6">
                          @if ($errors->has('animals'))
                              <p class="help is-danger">{{ $errors->first('animals') }}</p>
                          @endif

                          <animals-select-list heading="Кого ловить"
                                               :items-initial="{{ json_encode($animals) }}"
                                               :items-selected-initial="{{ json_encode($huntingCompany->animals) }}"
                                               endpoint="/admin/animals"
                                               description-input-name="animals"
                                               modal-heading="Животные и рыбы"
                                               class="mb-6">
                          </animals-select-list>
                        </div>

                        @include ('admin.partials.description-input', [ 'model' => $huntingCompany ])
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
