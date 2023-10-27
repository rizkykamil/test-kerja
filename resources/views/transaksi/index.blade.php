@include('partials.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('partials.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('partials.topbar')

                <div class="container-fluid">

                    <div>
                        <h1 class="h3 mb-4 text-gray-800">Transaction</h1>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Reference no</th>
                                            <th>Price</th>
                                            <th>quantity</th>
                                            <th>payment_amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_transaksis as $data_transaksi)
                                        <tr>
                                            <td>{{ $data_transaksi->reference_no }}</td>
                                            <td>{{ $data_transaksi->price }}</td>
                                            <td>{{ $data_transaksi->quantity }}</td>
                                            <td>{{ $data_transaksi->payment_amount }}</td>
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
