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
                    <h1 class="m-0">Tambah Buku</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="/buku">Buku</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-8 ">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                Form Buku
                                <a href="/mobil"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="/mobil" method="POST">
                                @csrf
                                    {{-- $table->foreignIdFor(User::class);
                                $table->enum('status_ketersediaan', ['tersedia', 'di pakai']);
                                $table->string('merk');
                                $table->string('model');
                                $table->string('nomor_plat');
                                $table->integer('tarif_perhari'); --}}
                                <div class="row">
                                    <div class="col-md-8 px-4">
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
                                                class="form-control @error('nomor_plat') is-invalid @enderror" id="title"
                                                placeholder="input nomor_plat" autocomplete="off" required
                                                value="{{ old('nomor_plat') }}">
                                            @error('nomor_plat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="title">tarif</label>
                                            <input type="text" name="tarif_perhari"
                                                class="form-control @error('tarif_perhari') is-invalid @enderror" id="title"
                                                placeholder="input tarif_perhari" autocomplete="off" required
                                                value="{{ old('tarif_perhari') }}">
                                            @error('tarif_perhari')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                     
                                        <!-- /.form-group -->
                                        {{-- <div class="form-group">
                                            <label>Pengarang</label>
                                            <select name="pengarang_id"
                                                class="form-control select2 @error('pengarang_id') is-invalid @enderror"
                                                style="width: 100%;">
                                                <option disabled selected="selected"> -- select -- </option>
                                                @foreach ($pengarangs as $item)
                                                    @if (old('pengarang_id') == $item->id)
                                                        <option value="{{ $item->id }}" selected>{{ $item->nama }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('pengarang_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div> --}}
                                  
                                        <!-- /.form-group -->


                                        <button type="submit" class="btn btn-primary float-right">Submit</button>
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
