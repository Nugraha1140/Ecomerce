<!DOCTYPE html>
<html lang="en">

<head>
    @include('template.components.startscript')

</head>

<body>
    @include('template.includes.navbar')

    <!-- SECTION -->
    @yield('content')

    <!-- FOOTER -->
    @include('template.includes.footer')
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    @include('template.components.endscript')

</body>

</html>
