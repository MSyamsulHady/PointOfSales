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
                                            <h4 class="card-title">Table User</h4>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#tambahsuppler">
                                                <i class="mdi mdi-credit-card-multiple"></i>
                                            </button>
                                            <!-- Modal -->
                                            {{-- <div class="modal fade" id="tambahsuppler" tabindex="-1" role="dialog" aria-labelledby="tambahsupplerLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="tambahsupplerLabel">tambah data suppler</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('AddKurir') }}" method="post" >
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
                        </div> --}}
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th> No</th>
                                                            <th>Nama</th>
                                                            <th>email</th>
                                                            <th>Password</th>
                                                            <th>Role</th>
                                                            <th> Aksi </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($showUser as $us)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td> {{ $us->name }}</td>
                                                                <td> {{ $us->email }}</td>
                                                                <td> {{ $us->password }}</td>
                                                                <td> {{ $us->role }}</td>
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
