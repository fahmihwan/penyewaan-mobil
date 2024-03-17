@extends('component.main')

@section('style')
    <!-- DataTables -->
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Mobil</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                Form Mobil
                                <a href="/mobil"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="/mobil" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 px-4">
                                        <div class="form-group">
                                            <label for="title">Merk</label>
                                            <input type="text" name="merk"
                                                class="form-control @error('merk') is-invalid @enderror" id="title"
                                                placeholder="input merk" autocomplete="off" required
                                                value="{{ old('merk') }}">
                                            @error('merk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="title">model</label>
                                            <input type="text" name="model"
                                                class="form-control @error('model') is-invalid @enderror" id="title"
                                                placeholder="input model" autocomplete="off" required
                                                value="{{ old('model') }}">
                                            @error('model')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="title">plat nomor</label>
                                            <input type="text" name="nomor_plat"
                                                class="form-control @error('nomor_plat') is-invalid @enderror"
                                                id="title" placeholder="input nomor plat" autocomplete="off" required
                                                value="{{ old('nomor_plat') }}">
                                            @error('nomor_plat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="title">tarif perhari</label>
                                            <input type="number" name="tarif_perhari"
                                                class="form-control @error('tarif_perhari') is-invalid @enderror"
                                                id="title" placeholder="input tarif perhari" autocomplete="off" required
                                                value="{{ old('tarif_perhari') }}">
                                            @error('tarif_perhari')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary float-right ml-2">Submit</button>
                                        <button type="reset" class="btn btn-warning float-right">Clear</button>
                                    </div>
                                </div>
                            </form>

                        </div>
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
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2()
        });

        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });
    </script>
@endsection
