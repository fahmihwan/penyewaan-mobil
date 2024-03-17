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
                    <h1 class="m-0">Detail Mobil</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-10 ">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                Edit Mobil
                                <a href="/mobil"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card" style="width: 28rem;">

                                <div class="card-body">
                                  <h2 class="card-title">merk : {{$mobil->merk}}</h2>
                                  <br>
                                  <table>
                                    <tr>
                                        <td>Model : </td>
                                        <td>{{$mobil->model}}</td>
                                    </tr>
                                    <tr>
                                        <td>Plat : </td>
                                        <td>{{$mobil->nomor_plat}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tarif : </td>
                                        <td>{{$mobil->tarif_perhari}}</td>
                                    </tr>

                                  </table>
                                  {{-- <ul>
                                    <li>{{$mobil->model}}</li>
                                    <li>{{$mobil->nomor_plat}}</li>
                                    <li>{{$mobil->tarif_perhari}}</li>
                                  </ul> --}}
                                  {{-- <p class="card-text">Model : {{$mobil->model}}</p> --}}
                                  {{-- <p class="card-text">Model : {{$mobil->nomor_plat}}</p> --}}
                                  {{-- <p class="card-text">Model : {{$mobil->tarif_perhari}}</p> --}}
                                </div>
                              </div>

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
