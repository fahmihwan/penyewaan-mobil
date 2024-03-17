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
                    <h1 class="m-0">Sewa Mobil</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <a href="/transaksi"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="/transaksi" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tgl mulai</label>
                                                            <div class="input-group">
                                                                <input type="date" name="tglmulai"
                                                                    class="form-control float-right" id="tglmulai">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tgl Selesai</label>
                                                            <div class="input-group">
                                                                <input type="date" name="tglselesai"
                                                                    class="form-control float-right" id="tglselesai">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        Rentan hari : <span id='periode'></span><label for="">
                                                            hari</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        Tarif : <span id='tarif'></span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" value="" id="post-range-hari"
                                                            name="periode">
                                                        <input type="text" value="{{ $mobil->id }}" name="mobil_id">
                                                    </div>
                                                    <div>
                                                        <button class="btn btn-primary" type="submit">sewa
                                                            sekarang</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card" style="width: 28rem;">
                                        <div class="card-body">
                                            <h2 class="card-title">merk : {{ $mobil->merk }}</h2>
                                            <br>
                                            <table>
                                                <tr>
                                                    <td>Model </td>
                                                    <td> : {{ $mobil->model }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Plat </td>
                                                    <td> : {{ $mobil->nomor_plat }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tarif </td>
                                                    <td> : <input type="text"
                                                            id="get-tarif"value="{{ $mobil->tarif_perhari }}"></td>
                                                    {{-- <td>{{ $mobil->tarif_perhari }} / perhari</td> --}}
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



                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection


@section('script')
    <script>
        $('document').ready(function() {
            // var periode = 0;
            var tglmulai = null;
            var tglselesai = null;
            $('#tglmulai').change(function() {
                tglmulai = $('#tglmulai').val();
                loadDate()
            });


            $('#tglselesai').change(function() {
                tglselesai = $('#tglselesai').val();
                loadDate()
            });

            function loadDate() {
                if (tglmulai != null && tglselesai != null) {
                    let formatToDateStart = new Date(tglmulai)
                    let formatToDateEnd = new Date(tglselesai)
                    let periode = (formatToDateEnd.getTime() - formatToDateStart.getTime()) / (1000 * 60 * 60 * 24);
                    // console.log(periode);
                    $('#periode').html(periode)
                    $('#post-range-hari').val(periode)
                    $('#tarif').html($('#get-tarif').val() * periode);

                    // var jarakHari = Math.abs(tglselesai - tglmulai);

                    // Mengubah milidetik menjadi hari
                    // var jumlahHari = Math.ceil(jarakHari / (1000 * 60 * 60 * 24));


                    // console.log(jumlahHari);
                }
                // Menghitung jarak antara dua tanggal dalam milidetik

                // console.log(tglselesai);
            }


        })
    </script>
@endsection
