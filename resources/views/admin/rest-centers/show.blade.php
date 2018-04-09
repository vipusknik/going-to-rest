@extends ('admin.layouts.master')

@section ('title', $restCenter->name)

@section ('content')
    <div>
        <section class="hero is-info welcome is-small">
          <div class="hero-body">
            <div class="container">
              <h1 class="title">
                {{ $restCenter->name }}
              </h1>
              <h2 class="subtitle">
                {{ $restCenter->reservoir->name }}, {{ $restCenter->location }}
              </h2>
            </div>
          </div>
        </section>

        <div>

        </div>
    </div>
@endsection
