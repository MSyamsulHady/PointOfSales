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
                                        <h4 class="card-title">Table Produk</h4>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Tambah Data
                                        </button>

                                        <!-- Modal tambah data-->
                                        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('insert') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="nama_produk" class="text">Nama Produk</label>
                                                <input type="text" name="nama_produk" class="form-control" placeholder="masukan produk">
                                            </div>
                                            <label for="image" class="mt-3">Upload Image</label>
                                            <div class="input-group mb-3">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input">
                                                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="form-line">
                                                <label for="harga_produk" class="text">Harga Produk</label>
                                                <input type="text" name="harga_produk" class="form-control" placeholder="input data">
                                            </div>
                                            <div class="form-line mt-3">
                                                <label for="stok_produk" class="text mb-3">Stok Produk</label>
                                                <input type="text" name="stok_produk" class="form-control" placeholder="input data">
                                            </div>
                                            <label for="jenis_kelamin" class="text-dark">Katagori</label>
                                            <div class="input-group mb-3">
                                                <select class="custom-select" id="inputGroupSelect02" name="id_katagori">
                                                    <option selected>--pilih katagori---</option>
                                                    @foreach ($katagori as $kt)
                                                    <option value="{{ $kt->id_katagori }}">
                                                        {{ $kt->nama_katagori }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <select class="custom-select" id="inputGroupSelect02" name="id_supplier">
                                                    <option selected>--pilih Supplier---</option>
                                                    @foreach ($supplier as $sp)
                                                    <option value="{{ $sp->id_supplier }}">
                                                        {{ $sp->nama_supplier }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary waves-effect">Simpan</button>
                                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th>Nama Pembeli</th>
                                        <th>Pembayaran</th>
                                        <th>kurir</th>
                                        <th>barang</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Bayak barang</th>
                                        <th>jumlah bayar</th>
                                        <th>Status</th>
                                        <th> Aksi </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($pesanan as $pes)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pes->user->name }}</td>
                                        <td>{{ $pes->pembayaran->metode_pembayaran }}</td>
                                        <td>{{ $pes->kurir->jenis_kurir }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($pes->produk as $produk)
                                                <li>{{ $produk->nama_produk }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ $pes->tanggal_pesanan }}</td>
                                        <td>{{ $pes->jumlah_pesanan }}</td>
                                        <td>{{ $pes->jumlah_bayar }}</td>
                                        <td>{{ $pes->status }}</td>
                                        <td> {{-- delete --}}
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteproduk{{ $pes->id_pesanan }}">
                                                <i class="mdi mdi-delete"></i>
                                            </button>

                                            {{-- modal delete --}}
                                            @foreach ($pesanan as $pes)
                                            <div class="modal fade" id="deleteproduk{{ $pes->produk[0]->id_produk }}" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="defaultModalLabel">Hapus
                                                            </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('deletePesanan', $pes->id_pesanan) }}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <div class="form-group">
                                                                    <div class="form-line">
                                                                        apakah kamu yakin ingin
                                                                        menghapus <strong>
                                                                            {{ $pes->id_pesanan }}
                                                                        </strong>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-danger waves-effect">Hapus</button>
                                                                    <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <a href="{{ route('detailpes') }}"><i class="bi bi-ticket-detailed"></i> detail</a>
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
    </div>
</div>
</div>
</div>
</div>
@include('layouts.footer')
</div>
@endsection
