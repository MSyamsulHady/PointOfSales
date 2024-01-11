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
                        <h4 class="card-title">Table Katagori</h4>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahkatagori">
                            tambah data
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="tambahkatagori" tabindex="-1" role="dialog" aria-labelledby="tambahkatagoriLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="tambahkatagoriLabel">tambah data katagori</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('store') }}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <label for="image" class="mt-3">Upload Image</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input">
                                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_katagori">Nama Katagori</label>
                                    <input type="text" class="form-control" id="nama_katagori" name="nama_katagori" placeholder="masukan katagori">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                <th>Katagori</th>
                                <th> Aksi </th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($katagori as $kt )
                              <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td><img src="{{ asset('imagekatagori/' . $kt->image) }}" alt=""
                                style="width: 40px"></td>

                                <td> {{ $kt->nama_katagori }}</td>

                                <td>  <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updatekatagori{{ $kt->id_katagori }}">
                                        <i class="mdi mdi-credit-card-multiple"></i>
                                    </button>
                                    <!-- Modal -->
                                    @foreach ($katagori as $kt )
                                    <div class="modal fade" id="updatekatagori{{ $kt->id_katagori }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">editkatagori</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{ route('updatekatagori', $kt->id_katagori) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <label for="nama_katagori">Nama Katagori</label>
                                                <input type="text" class="form-control" id="nama_katagori" name="nama_katagori" value="{{ $kt->nama_katagori }}">
                                              </div>
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
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletekatagori{{ $kt->id_katagori }}">
                                        <i class="mdi mdi-delete"></i>
                                    </button>

                                    <!-- Modal -->
                                    @foreach ($katagori as $kt )
                                    <div class="modal fade" id="deletekatagori{{ $kt->id_katagori }}" tabindex="-1" role="dialog" aria-labelledby="deletekatagoriLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">hapus katagori</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('deletekatagori',$kt->id_katagori) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    Apakah anda yakin menghapus  {{ $kt->nama_katagori }}
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">hapus</button>
                                                </div>
                                                </form>
                                        </div>
                                        </div>
                                    </div>
                                    @endforeach

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
