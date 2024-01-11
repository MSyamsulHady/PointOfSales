@extends('layouts.navhed')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card corona-gradient-card">
                        <div class="card-body py-0 px-0 px-sm-3">
                            <div class="row align-items-center">
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Table Pembayaran</h4>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#tambahpembaayaran">
                                                tambah data
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="tambahpembaayaran" tabindex="-1" role="dialog"
                                                aria-labelledby="tambahpembaayaranLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="tambahkatagoriLabel">tambah data
                                                                Pembayaran</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('AddPay') }}" method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="nama_katagori">Metode Pembayaran</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama_katagori" name="metode_pembayaran"
                                                                        placeholder="metode pembayaran">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="nama_katagori">Nomer Pembayaran</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama_katagori" name="nomer_pembayaran"
                                                                        placeholder="nomer pembayaran">
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">simpan</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th> No </th>
                                                            <th>Metode Pembayaran</th>
                                                            <th>Nomer Pembayaran</th>
                                                            <th> Aksi </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($pembayaran as $pay)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $pay->metode_pembayaran }}</td>
                                                                <td>{{ $pay->nomer_pembayaran }}</td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
