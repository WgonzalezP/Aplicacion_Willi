<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body>
    <!-- Cabecera -->
    @include('partials.header')

    <!-- Contenido principal -->
    <div class="">
        @yield('content')
    </div>

    <!-- Pie de página -->
    @include('partials.footer')

    <!-- Scripts -->
    @stack('scripts')

</body>
</html>
