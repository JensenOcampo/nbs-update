<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin - Add Product</title>
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

        .font_size {
            font-size: 50px;
            /* padding-top: 40px; */
            font-weight: bold;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
        }

        .image-preview {
            display: none;
            margin-top: 10px;
            max-width: 100%;
            border-radius: 0.5rem;
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
                    <div class="bg-white min-h-screen flex items-center justify-center p-6 rounded-lg shadow-lg">
                        <div class="w-full max-w-lg">
                            <h1 class="font_size text-4xl mb-8 text-center">Add Product</h1>
                            <form action="{{ url('/add_product') }}" method="post" enctype="multipart/form-data"
                                class="space-y-6">
                                @csrf
                                <div>
                                    <label for="title" class="block text-gray-700 font-semibold mb-2">Product
                                        Title</label>
                                    <input type="text" id="title" name="title" placeholder="Write a title..."
                                        required
                                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
                                </div>
                                <div>
                                    <label for="description" class="block text-gray-700 font-semibold mb-2">Product
                                        Description</label>
                                    <input type="text" id="description" name="description"
                                        placeholder="Write a description..." required
                                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <div>
                                        <label for="price" class="block text-gray-700 font-semibold mb-2">Product
                                            Price</label>
                                        <input type="number" id="price" name="price"
                                            placeholder="Write a price..." required min="0" step="0.01"
                                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
                                    </div>
                                    <div>
                                        <label for="dis_price" class="block text-gray-700 font-semibold mb-2">Discount
                                            Price</label>
                                        <input type="number" id="dis_price" name="dis_price"
                                            placeholder="Write a discount if applied..." min="0" step="0.01"
                                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
                                    </div>
                                </div>
                                <div>
                                    <label for="quantity" class="block text-gray-700 font-semibold mb-2">Product
                                        Quantity</label>
                                    <input type="number" id="quantity" name="quantity"
                                        placeholder="Write a quantity..." required min="0"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
                                </div>
                                <div>
                                    <label for="category" class="block text-gray-700 font-semibold mb-2">Product
                                        Category</label>
                                    <select id="category" name="category" required
                                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                                        <option value="" disabled selected>Select a category...</option>
                                        @foreach ($category as $category)
                                            <option value="{{ $category->category_name }}">
                                                {{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="image" class="block text-gray-700 font-semibold mb-2">Product
                                        Image</label>
                                    <input type="file" id="image" name="image" accept="image/*" required
                                        class="w-full rounded-xl border border-gray-300 px-3 py-2 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                                        onchange="previewImage(event)" />
                                    <img id="imagePreview" class="image-preview" alt="Image Preview" />
                                </div>
                                <div>
                                    <button type="submit"
                                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl py-3 transition focus:outline-none focus:ring-4 focus:ring-indigo-300">
                                        <i class="fas fa-plus mr-2"></i> Add Product
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>


        <!-- Custom template | don't include it in your project! -->


        <!-- End Custom template -->

    </div>

    <!--   Core JS Files   -->

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
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function() {
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none';
            }
        }

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
