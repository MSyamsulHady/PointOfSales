@extends('frondend.navbar')
@section('contentfrond')
    <section class="py-5">
        <div class="container mt-3">
            <div class="row">
                <section class="py-5">
                    <h1 class="text-center">{{ $katagoriall[0]->katagori->nama_katagori }}</h1>
                    <div class="container mt-3">
                        <div class="row">
                            @foreach ($katagoriall as $ct)
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset('imageproduk/' . $ct->image) }}" alt=""
                                            style="width: 250px" height="120px">
                                        <div class="card-body">
                                            <h6 class="card-title text-center">{{ $ct->nama_produk }}</h6>
                                            <h6 class="card-title text-center">Rp. {{ $ct->harga_produk }}</h6>
                                            <h6 class="card-title text-center"> stok {{ $ct->stok_produk }}</h6>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $ct->id_produk }}">
                                                beli sekarang
                                            </button>
                                            @foreach ($produk as $pro)
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $pro->id_produk }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('tambahpesanan', $pro->id_produk) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-7">
                                                                            <img src="{{ asset('imageproduk/' . $pro->image) }}"
                                                                                alt="" class="img-fluid">
                                                                        </div>
                                                                        <div class="col-5">
                                                                            <h2 class="text-center">{{ $pro->nama_produk }}
                                                                            </h2>
                                                                            <ul class="list-group">
                                                                                <li class="list-group-item"><b>Harga</b> :
                                                                                    <span class="float-end">Rp.
                                                                                        {{ $ct->harga_produk }}</span>
                                                                                </li>
                                                                                <li class="list-group-item"><b>Stok</b> :
                                                                                    <span
                                                                                        class="float-end">{{ $ct->stok_produk }}</span>
                                                                                </li>
                                                                            </ul>

                                                                            <div>
                                                                                <label for="jumlah_pesanan"><b>Jumlah
                                                                                    </b></label>
                                                                                <input type="number" placeholder="1"
                                                                                    name="jumlah_pesanan">
                                                                            </div>
                                                                            <div class="input-group mb-3 mt-3">
                                                                                <label for="">
                                                                                    <b>Expedisi</b></label>
                                                                                <select class="custom-select"
                                                                                    id="inputGroupSelect02" name="id_kurir">
                                                                                    <option selected>--pilih Expedisi---
                                                                                    </option>
                                                                                    @foreach ($kurir as $kr)
                                                                                        <option
                                                                                            value="{{ $kr->id_kurir }}">
                                                                                            {{ $kr->jenis_kurir }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="input-group mb-3" d-inline>
                                                                                <label for="">
                                                                                    <b>Moetode Pembayaran</b></label>
                                                                                <select class="custom-select"
                                                                                    id="inputGroupSelect02"
                                                                                    name="id_pembayaran">
                                                                                    <option selected>--Metode Pembayaran---
                                                                                    </option>
                                                                                    @foreach ($metode as $mt)
                                                                                        <option
                                                                                            value="{{ $mt->id_pembayaran }}">
                                                                                            {{ $mt->metode_pembayaran }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">bayar</button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                            @endforeach
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
        </div>
    </section>
    </div>
    </div>
    </section>
    @include('frondend.footer')
@endsection
