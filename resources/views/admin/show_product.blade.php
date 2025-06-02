<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin - All Products</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets/img/kaiadmin/logo_light.svg" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts and icons -->

    @include('admin.css')


    <style>
        .header {
            color: white;
            padding: 20px;
            text-align: center;
        }

        /*
        .container {
            size: 10cm;
            margin-top: 5px;
        } */

        .alert {
            margin-bottom: 10px;
        }

        .font-size {
            font-size: 40px;
            margin-top: 20px;
            font-weight: bold;
        }

        .image_size {
            width: 100px;
            height: 100px;
            border-radius: 5px;
            object-fit: cover;
        }

        /* .table {
            margin-top: 10px;
            margin-left: 10px;
        } */
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

                    <h2 class="font-size text-center mb-4">All Products</h2>

                    <table class="table table-bordered table-striped mt-4">
                        <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Discount Price</th>
                                <th>Product Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $product)
                                <tr>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>{{ number_format($product->price, 2) }}</td>
                                    <td>{{ number_format($product->discount_price, 2) }}</td>
                                    <td>
                                        <img class="image_size" src="/product/{{ $product->image }}"
                                            alt="{{ $product->title }}">
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-success">Edit</a>
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Are you sure you want to delete {{ $product->title }} from the list?')"
                                            href="{{ url('delete_product', $product->id) }}"
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
