<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin - Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets/img/kaiadmin/logo_light.svg" type="image/x-icon" />

    <!-- Fonts and icons -->
    @include('admin.css')
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('admin.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    @include('admin.logodark')
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                @include('admin.navbar')
                <!-- End Navbar -->
            </div>

            {{-- @include('admin.body') --}}

            @include('admin.footer')
        </div>

        <!-- Custom template | don't include it in your project! -->

        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    @include('admin.script')
</body>

</html>
