@extends('component.main')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="http://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Transaksi</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger p-0" role="alert">
                            <ul class="my-2">
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="/transaksi">Sewa mobil sekarang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/transaksi/pengembalianmobil">Kembalikan Mobil</a>
                        </li>
                    </ul>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between" style="width: 100%">
                                <h3 class="card-title">List Mobil</h3>

                                <form action="/transaksi" method="GET">
                                    <div style="width:340px; display: flex">
                                        <input type="text" name="cari" class="form-control mr-2" id="title"
                                            placeholder="Cari berdasarkan merk, model, ketersediaan..." autocomplete="off">
                                        <button
                                            class="btn
                                            btn-primary">cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pemilik</th>
                                        <th>plat</th>
                                        <th>merk</th>
                                        <th>model</th>
                                        <th>status</th>
                                        {{-- <th>nomor_plat</th> --}}
                                        <th>tarif</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->user->nama }}</td>
                                            <td>{{ $item->nomor_plat }}</td>
                                            <td>{{ $item->merk }}</td>
                                            <td>{{ $item->model }}</td>
                                            <td>{{ $item->status_ketersediaan }}</td>
                                            <td>{{ $item->tarif_perhari }}</td>
                                            <td class="d-flex">
                                                @if ($item->status_ketersediaan != 'di pakai')
                                                    <a href="/transaksi/{{ $item->id }}"
                                                        class="btn btn-sm btn-primary mr-2">
                                                        sewa
                                                    </a>
                                                @else
                                                    <span class="badge bg-warning">Sedang di sewa</span>
                                                    <a href="/mobil/{{ $item->id }}" class="btn btn-sm btn-info ml-2">
                                                        show
                                                    </a>
                                                @endif


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->



@endsection


@section('script')
    <!-- DataTables  & Plugins -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        });
    </script>
@endsection
