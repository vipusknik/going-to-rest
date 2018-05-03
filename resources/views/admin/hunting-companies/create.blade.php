@extends ('admin.layouts.master')

@section ('title', 'Добавление места охоты и рыбалки')

@section ('content')
    <div class="container mx-auto mt-3">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">
              Добавление места охоты и рыбалки
            </p>
          </header>
          <div class="card-content">
            <div class="content">
                <form action="{{ route('admin.hunting-companies.store') }}" method="post" @keydown.enter.prevent="">
                    @csrf

                    <div class="mb-6 pb-6 border-b border-grey-light">

                        <div class="flex mb-4">
                            <div class="w-1/2 mr-2">
                              <label for="name" class="label">Название</label>
                              <div class="control">
                                <input type="text" name="name" id="name" class="input" placeholder="Название">
                              </div>
                            </div>

                            <div class="w-1/2 flex">
                              <div class="w-1/2">
                                <label for="hunting" class="label">Охота</label>
                                <input type="checkbox" name="hunting" id="hunting" class="control" checked>
                              </div>

                              <div class="w-1/2">
                                <label for="fishing" class="label">Рыбалка</label>
                                <input type="checkbox" name="fishing" id="fishing" class="control" checked>
                              </div>
                            </div>
                        </div>

                        <div class="flex mb-4">
                            <div class="w-1/3 mr-1">
                              <hunting-region-select :regions-initial="{{ json_encode($regions) }}"></hunting-region-select>
                            </div>

                            <div class="w-1/3 mr-1">
                               <hunting-place-select :places-initial="{{ json_encode($places) }}"></hunting-place-select>
                            </div>

                            <div class="w-1/3">
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

                          {{-- <activities-attach :activities-initial="{{ json_encode($activities) }}"></activities-attach> --}}
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
