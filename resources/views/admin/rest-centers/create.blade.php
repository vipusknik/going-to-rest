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

                    <div class="border-b-2 pb-6 border-grey-light">
                        <div class="field-body flex mb-4">
                            <div class="field w-1/3">
                              <label class="label">Название</label>
                              <div class="control">
                                <input class="input" type="text" name="name" placeholder="База отдыха">
                              </div>
                            </div>

                            <div class="field w-1/3">
                              <label class="label">Водоем</label>
                              <div class="control">
                                <div class="select w-full">
                                  <select name="reservoir_id" class="w-full">
                                    @foreach ($reservoirs as $reservoir)
                                        <option value="{{ $reservoir->id }}">
                                            {{ $reservoir->name }}
                                        </option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="field w-1/3">
                              <label class="label">Расположение</label>
                              <div class="control">
                                <input class="input" type="text" name="location" placeholder="Расположение">
                              </div>
                            </div>
                        </div>

                        <div class="field mb-6">
                          <label class="label">
                            Контакты <span class="text-sm text-grey-dark">(укажите через запятую)</span>
                          </label>

                          <div class="control">
                            <input class="input" type="text" name="contacts" placeholder="Контакты">
                          </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-base text-black font-bold">Удобства</h3>
                            <div class="p-4 border border-grey-light rounded">
                                @foreach ($features->where('belongs_to', 'rest_center')->where('category', 'facilities') as $feature)
                                    <div class="field flex">
                                      <label class="block text-indigo-light label w-1/5">{{ $feature->name }}</label>
                                      <div class="control w-1/5 mr-6">
                                        <div class="select w-full">
                                          <select name="reservoir_id" class="w-full">
                                            <option value="">выбрать</option>
                                            @foreach ($feature->options as $option)
                                                <option value="{{ '' }}">
                                                    {{ $option }}
                                                </option>
                                            @endforeach
                                          </select>
                                        </div>

                                      </div>

                                      <div class="control w-1/5">
                                        <input class="input" type="text" name="contacts" placeholder="другая опция">
                                      </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="field">
                          <label class="label">Описание</label>
                          <div class="control">
                            <textarea class="textarea h-64" name="description" placeholder="Описание базы"></textarea>
                          </div>
                        </div>
                    </div>

                    <div class="field">
                      <label class="label">Username</label>
                      <div class="control has-icons-left has-icons-right">
                        <input class="input is-success" type="text" placeholder="Text input" value="bulma">
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                        <span class="icon is-small is-right">
                          <i class="fas fa-check"></i>
                        </span>
                      </div>
                      <p class="help is-success">This username is available</p>
                    </div>

                    <div class="field">
                      <label class="label">Email</label>
                      <div class="control has-icons-left has-icons-right">
                        <input class="input is-danger" type="email" placeholder="Email input" value="hello@">
                        <span class="icon is-small is-left">
                          <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                          <i class="fas fa-exclamation-triangle"></i>
                        </span>
                      </div>
                      <p class="help is-danger">This email is invalid</p>
                    </div>

                    <div class="field">
                      <label class="label">Message</label>
                      <div class="control">
                        <textarea class="textarea" placeholder="Textarea"></textarea>
                      </div>
                    </div>

                    <div class="field">
                      <div class="control">
                        <label class="checkbox">
                          <input type="checkbox">
                          I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>

                    <div class="field">
                      <div class="control">
                        <label class="radio">
                          <input type="radio" name="question">
                          Yes
                        </label>
                        <label class="radio">
                          <input type="radio" name="question">
                          No
                        </label>
                      </div>
                    </div>

                    <div class="field is-grouped">
                      <div class="control">
                        <button class="button is-link">Submit</button>
                      </div>
                      <div class="control">
                        <button class="button is-text">Cancel</button>
                      </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>

@endsection
