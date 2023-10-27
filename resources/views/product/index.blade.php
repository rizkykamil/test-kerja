@include('partials.header')

<body id="page-top">

    <div id="wrapper">

        @include('partials.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                @include('partials.topbar')

                <div class="container-fluid">

                    <div class="d-flex justify-content-between">
                        <div>
                            <h1 class="h3 mb-4 text-gray-800">Product</h1>
                        </div>
                        <div>
                            <a href="{{route('product.create')}}" class="btn btn-primary btn-sm">Add Product</a>
                        </div>
                    </div>
                    @include('partials.alert')
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Description</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>
                                                <a href="{{route('product.edit', $product->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="{{route('product.delete', $product->id)}}" class="btn btn-danger btn-sm" >Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('partials.footer')

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    @include('partials.js')

</body>

</html>
