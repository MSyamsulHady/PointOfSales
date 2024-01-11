@extends('frondend.navbar')
@section('contentfrond')
<section class="py-5 mt-5">
    <div class="container">
        <div class="row">
            <h2 class="text-center">Pesanan Anda</h2>
            @foreach ($pesanan as $pesan)
            <div class="col-4">
                {{-- @if($pesan->jumlah_pesanan !=0)
                <a href="{{ route('frondcatagori') }}" class="btn btn-primary">Pesan Lagi</a>
                @else
                <p>Anda tidak ada pesanan</p>
                <a href="{{ route('frondcatagori') }}" class="btn btn-primary">silahkan pesan</a>

                @endif --}}
                <div class="card mt-3">
                    @foreach ($pesan->produk as $pro)
                    <div class="card-body"><img src="{{ asset('imageproduk/' . $pro->image) }}" alt="" style="width: 325px" height="170px">
                        @endforeach
                        <h3 class="text-center">{{ $pesan->produk[0]->nama_produk }}</h3>
                        <p><b>Kurir :</b> {{ $pesan->kurir->nama_kurir }}</p>
                        @if ($pesan->pembayaran->metode_pembayaran !== 'COD')
                        @if ($pesan->status == 'pending')
                        <p><a href="{{ route('bayar') }}" {{-- <p><a href="{{ route('updatePembayaran', $pesan->id_pesanan) }}" --}} class="btn btn-info"><i class="bi bi-credit-card"></i> bayar sekarang</a>
                            @else
                            <p><b>No. Pembayaran : </b> {{ $pesan->pembayaran->nomer_pembayaran }}</p>
                            <a href="{{ route('deletePesananfrond', $pesan->id_pesanan) }}" class="btn btn-danger"><i class="bi bi-credit-card"></i> batalkan
                                pesanan</a>
                        </p>
                        @endif
                        @endif
                        @if ($pesan->pembayaran->metode_pembayaran == 'COD')
                        <a href="{{ route('deletePesananfrond', $pesan->id_pesanan) }}" class="btn btn-danger"><i class="bi bi-credit-card"></i> batalkan
                            pesanan</a>
                        @endif

                        <p><b>Metode Pembayaran :</b> {{ $pesan->pembayaran->metode_pembayaran }}</p>
                        <p><b>jumlah pesanan:</b> {{ $pesan->jumlah_pesanan }}</p>
                        <p><b>Total Bayar :</b> Rp . {{ $pesan->produk[0]->harga_produk * $pesan->jumlah_pesanan }}</p>
                        <p><b>Status Pembayaran :</b>
                            @if ($pesan->status == 'selesai')
                            <span class="badge bg-success">{{ $pesan->status }}</span>
                            @elseif ($pesan->status == 'ditolak')
                            <span class="badge bg-danger">{{ $pesan->status }}</span>
                            @elseif($pesan->status == 'pending')
                            <span class="badge bg-primary">{{ $pesan->status }}</span>
                            @endif
                        </p>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    </div>
</section>
@endsection
