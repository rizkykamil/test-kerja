@include('partials.header')

<body id="page-top">

    <div id="wrapper">
        @include('partials.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('partials.topbar')
                <div class="container-fluid">
                    @include('partials.alert')
                    <div class="card">
                        <div class="card-header">
                            <h3>Add Product</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('product.store')}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput">Name</label>
                                    <input class="form-control" id="exampleFormControlInput" type="text" name="name" placeholder="Name">
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput">Price</label>
                                    <input class="form-control" id="exampleFormControlInput" type="number" name="price" placeholder="Price">
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput">Stock</label>
                                    <input class="form-control" id="exampleFormControlInput" type="number" name="stock" placeholder="Stock">
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label" for="exampleFormControlInput">Description</label>
                                    <input class="form-control" id="exampleFormControlInput" type="text" name="description" placeholder="Description">
                                </div>
                                
                                <div class="mb-3 float-right">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>

                            </form>

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
