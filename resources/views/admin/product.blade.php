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
                                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                                        placeholder="Enter product title"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition @error('title') border-red-500 @enderror" />
                                    @error('title')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="description" class="block text-gray-700 font-semibold mb-2">Product
                                        Description</label>
                                    <textarea id="description" name="description" rows="3" placeholder="Enter product description"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <div>
                                        <label for="price" class="block text-gray-700 font-semibold mb-2">Product
                                            Price</label>
                                        <input type="number" step="0.01" id="price" name="price"
                                            value="{{ old('price') }}" placeholder="Enter product price" min="0"
                                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition @error('price') border-red-500 @enderror" />
                                        @error('price')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="dis_price" class="block text-gray-700 font-semibold mb-2">Discount
                                            Price</label>
                                        <input type="number" step="0.01" id="dis_price" name="dis_price"
                                            value="{{ old('dis_price') }}" placeholder="Enter discount price (optional)"
                                            min="0"
                                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition @error('dis_price') border-red-500 @enderror" />
                                        @error('dis_price')
                                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="quantity" class="block text-gray-700 font-semibold mb-2">Product
                                        Quantity</label>
                                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}"
                                        placeholder="Enter product quantity" min="0" step="1"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition @error('quantity') border-red-500 @enderror" />
                                    @error('quantity')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="category" class="block text-gray-700 font-semibold mb-2">Product
                                        Category</label>
                                    <select id="category" name="category"
                                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition @error('category') border-red-500 @enderror">
                                        <option value="">Select a category...</option>
                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->id }}"
                                                {{ old('category') == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="image" class="block text-gray-700 font-semibold mb-2">Product
                                        Image</label>
                                    <input type="file" id="image" name="image" accept="image/*"
                                        class="w-full rounded-xl border border-gray-300 px-3 py-2 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition @error('image') border-red-500 @enderror"
                                        onchange="previewImage(event)" />
                                    @error('image')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
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
