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
                                        <h4 class="card-title">Table kurir</h4>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahsuppler">
                                            <i class="mdi mdi-credit-card-multiple"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="tambahsuppler" tabindex="-1" role="dialog" aria-labelledby="tambahsupplerLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="tambahsupplerLabel">tambah data
                                                            suppler</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('AddKurir') }}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="nama_kurir">Nama kurir</label>
                                                                <input type="text" class="form-control" id="nama_kurir" name="nama_kurir" placeholder="masukan supplier">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="no_hp">No HP</label>
                                                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="masukan No Hp">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jenis_kurir">Jenis kurir</label>
                                                                <input type="text" class="form-control" id="jenis_kurir" name="jenis_kurir" placeholder="masukan jenis_kurir">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th> No </th>
                                                        <th>Nama kurir</th>
                                                        <th>No Hp</th>
                                                        <th>Jenis_Kurir</th>
                                                        <th> Aksi </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($kurir as $kr)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td> {{ $kr->nama_kurir }}</td>
                                                        <td> {{ $kr->no_hp }}</td>
                                                        <td> {{ $kr->jenis_kurir }}</td>
                                                        <td>
                                                        <td>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updatekurir{{ $kr->id_kurir }}">
                                                                <i class="mdi mdi-credit-card-multiple"></i>
                                                            </button>
                                                            <!-- Modal -->
                                                            @foreach ($kurir as $kr)
                                                            <div class="modal fade" id="updatekurir{{ $kr->id_kurir }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                edit kurir</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{ route('updatekurir', $kr->id_kurir) }}" method="post">
                                                                                @csrf
                                                                                @method('put')
                                                                                <div class="form-group">
                                                                                    <label for="nama_katagori">Nama
                                                                                        Kurir</label>
                                                                                    <input type="text" class="form-control" id="nama_kurir" name="nama_kurir" value="{{ $kr->nama_kurir }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="nama_katagori">No Hp</label>
                                                                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $kr->no_hp }}">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label for="nama_katagori">Jenis Kurir</label>
                                                                                    <input type="text" class="form-control" id="jenis" name="jenis_kurir" value="{{ $kr->jenis_kurir }}">
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">simpan</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach

                                                                {{-- modal hapus katagori --}}
                                                                {{-- <button type="button" class="btn btn-danger"
                                                                        data-toggle="modal"
                                                                        data-target="#deletekatagori{{ $kr->id_katagori }}">
                                                                <i class="mdi mdi-delete"></i>
                                                                </button>

                                                                <!-- Modal -->
                                                                @foreach ($katagori as $kr)
                                                                <div class="modal fade" id="deletekatagori{{ $kr->id_katagori }}" tabindex="-1" role="dialog" aria-labelledby="deletekatagoriLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">hapus
                                                                                    katagori</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="{{ route('deletekatagori', $kr->id_katagori) }}" method="POST">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                    Apakah anda yakin menghapus
                                                                                    {{ $kr->nama_katagori }}
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-danger">hapus</button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach --}}
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
