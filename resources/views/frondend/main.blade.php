@extends('frondend.navbar')
@section('contentfrond')
@include('frondend.header')
<!-- Section-->
<section class="py-5">
    <h1 class="text-center">katagori</h1>

    <div class="container mt-3">
        <div class="row">
            @foreach ($catagori as $ct )

            <div class="col-md-2">
                <div class="card">
                    <img src="{{ asset('imagekatagori/' . $ct->image) }}" alt="" style="width: 150px" height="120px">
                    <div class="card-body">
                        <h6 class="card-title text-center">{{ $ct->nama_katagori }}</h6>
                        <p>
                            <a class="btn btn-primary justify-content-center" href="{{ route('produkCatagori',$ct->id_katagori) }}">cari</a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
</section>
@include('frondend.footer')
@endsection
