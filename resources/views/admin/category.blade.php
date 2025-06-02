<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin - Category</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets/img/kaiadmin/logo_light.svg" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts and icons -->

    @include('admin.css')


    <style>
        .div_center {

            text-align: center;

            padding-top: 40px;

        }


        /* .h2font {

            font-size: 40px;

            padding-bottom: 40px;

        } */

        .table {
            margin-top: 20px;
        }


        .center {

            margin: auto;

            width: 50%;

            text-align: center;

            margin-top: 30px;

            border: 3px solid burlywood;

        }
    </style>

</head>

<body>
    <div class="wrapper"> <!-- Sidebar --> @include('admin.sidebar') <!-- End Sidebar -->

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



            {{-- Body Body Body --}}

            <div class="container">

                <div class="page-inner">
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <h2 class="text-center mb-4" style="font-size: 50px; font-weight:bold;">Add Category</h2>

                    <form action="{{ url('/add_category') }}" method="post">
                        @csrf
                        <input type="text" name="category" class="form-control" placeholder="Write a category..."
                            required>
                        <input type="submit" name="submit" value="Add Category" class="btn btn-dark w-100">
                    </form>

                    <table class="table table-bordered table-striped mt-4">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                                <tr>
                                    <td>{{ $data->category_name }}</td>
                                    <td>
                                        <a onclick="return confirm('Are you sure you want to delete {{ $data->category_name }} on your category?')"
                                            href="{{ url('delete_category', $data->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>


        <!-- Custom template | don't include it in your project! -->


        <!-- End Custom template -->

    </div>

    <!--   Core JS Files   -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <!-- Additional JS Files -->
    <script src="assets/js/core/jquery.scrollbar.min.js"></script>
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>
    <script src="assets/js/kaiadmin.min.js"></script>
    <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script>

    <script src="assets/js/core/jquery-3.7.1.min.js"></script>

    <script src="assets/js/core/popper.min.js"></script>

    <script src="assets/js/core/bootstrap.min.js"></script>


    <!-- jQuery Scrollbar -->

    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


    <!-- Chart JS -->

    <script src="assets/js/plugin/chart.js/chart.min.js"></script>


    <!-- jQuery Sparkline -->

    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>


    <!-- Chart Circle -->

    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>


    <!-- Datatables -->

    <script src="assets/js/plugin/datatables/datatables.min.js"></script>


    <!-- Bootstrap Notify -->

    {{-- <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> --}}


    <!-- jQuery Vector Maps -->

    <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>

    <script src="assets/js/plugin/jsvectormap/world.js"></script>


    <!-- Sweet Alert -->

    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>


    <!-- Kaiadmin JS -->

    <script src="assets/js/kaiadmin.min.js"></script>


    <!-- Kaiadmin DEMO methods, don't include it in your project! -->

    <script src="assets/js/setting-demo.js"></script>

    <script src="assets/js/demo.js"></script>

    <script>
        $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {

            type: "line",

            height: "70",

            width: "100%",

            lineWidth: "2",

            lineColor: "#177dff",

            fillColor: "rgba(23, 125, 255, 0.14)",

        });


        $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {

            type: "line",

            height: "70",

            width: "100%",

            lineWidth: "2",

            lineColor: "#f3545d",

            fillColor: "rgba(243, 84, 93, .14)",

        });


        $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {

            type: "line",

            height: "70",

            width: "100%",

            lineWidth: "2",

            lineColor: "#ffa534",

            fillColor: "rgba(255, 165, 52, .14)",

        });
    </script>

</body>

</html>
