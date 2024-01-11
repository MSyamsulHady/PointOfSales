@extends('frondend.navbar')
@section('contentfrond')
    <section class="py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-header text-center h2">
                        Form Pembayaran
                    </div>
                    <div class="card-body">
                        <h5 class="card-title h3 text-center mt-3">NO PEMBAYARAN</h5>
                        <p class="card-text text-center h4">
                            @foreach ($pesan as $p)
                                {{ $p->pembayaran->nomer_pembayaran }}
                            @endforeach
                        </p>
                        <div class="card-title h4 text-center mt-3">
                            <h3>Total Bayar</h3>
                            Rp . {{ $p->jumlah_bayar }},00
                        </div>
                        <a href="{{ route('updatePembayaran', $p->id_pesanan) }}" class="btn btn-primary ">Bayar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
