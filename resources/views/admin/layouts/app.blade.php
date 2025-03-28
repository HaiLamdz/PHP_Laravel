@include('admin.layouts.require.header')

@include('admin.layouts.require.nav')
@include('admin.layouts.require.sidebar')



  <div class="content-wrapper">
    <div class="content-header">
        @yield('content')
    </div>
  </div>

  @include('admin.layouts.require.footer')
  