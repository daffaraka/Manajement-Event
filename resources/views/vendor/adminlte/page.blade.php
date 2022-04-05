@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        {{-- Top Navbar --}}
        @if ($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if (!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        @empty($iFrameEnabled)
            @include('adminlte::partials.cwrapper.cwrapper-default')
        @else
            @include('adminlte::partials.cwrapper.cwrapper-iframe')
        @endempty

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if (config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
    <x-notification-component />
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
    <script>
        function onlyNumberKey(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>

    <script>
        // when country dropdown changes
        $('#state').change(function() {

            var stateID = $(this).val();

            if (stateID) {

                $.ajax({
                    type: "GET",
                    url: "{{ url('getCity') }}?state_id=" + stateID,
                    success: function(res) {

                        if (res) {

                            $("#city").empty();
                            $("#city").append('<option>Pilih Kota</option>');
                            $.each(res, function(key, value) {
                                $("#city").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });

                        } else {

                            $("#city").empty();
                        }
                    }
                });
            } else {

                $("#city").empty();
            }
        });
    </script>
@stop
