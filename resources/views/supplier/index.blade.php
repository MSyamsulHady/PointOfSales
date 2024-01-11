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
                        <h4 class="card-title">Table Supplier</h4>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahsuppler">
                            tambah data
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="tambahsuppler" tabindex="-1" role="dialog" aria-labelledby="tambahsupplerLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="tambahsupplerLabel">tambah data suppler</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('AddSuplier') }}" method="post" >
                                @csrf
                                <div class="form-group">
                                    <label for="nama_supplier">Nama Supplier</label>
                                    <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="masukan supplier">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="masukan Alamat">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="masukan contact">
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
                                  <th>Nama Suplier</th>
                                  <th>Alamat</th>
                                  <th>Contact</th>
                                  <th> Aksi </th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($supplier as $sp )
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $sp->nama_supplier }}</td>
                                <td> {{ $sp->alamat }}</td>
                                <td> {{ $sp->contact }}</td>
                                <td> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateSupplier{{ $sp->id_supplier }}">
                                    <i class="mdi mdi-credit-card-multiple"></i>
                                </button>
                                <!-- Modal -->
                                @foreach ($supplier as $sp )
                                <div class="modal fade" id="updateSupplier{{ $sp->id_supplier }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">edit Suplier</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{ route('updatekatagori', $sp->id_supplier) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="nama_katagori">Nama Katagori</label>
                                            <input type="text" class="form-control" id="nama_katagori" name="nama_katagori" value="{{ $sp->nama_supplier }}">
                                          </div>
                                        <div class="form-group">
                                            <label for="nama_katagori">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $sp->alamat }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_katagori">Contak</label>
                                            <input type="text" class="form-control" id="contact" name="contact" value="{{ $sp->contact }}">
                                          </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                                @endforeach</td>
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
