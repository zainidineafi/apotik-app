@extends('layouts.main')

@section('container')
<div class="lime-container">
    <div class="lime-body">
        <div class="container">
            <div class="row">
                <div class="col-xl">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title mb-4" style="font-size: 20px;">Tabel Data Pembelian</h2>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <form action="{{ route('pembelian.search') }}" method="GET">
                                        <div class="input-group">
                                            <input type="date" class="form-control" name="search" id="searchInput" placeholder="Masukkan Tanggal Nota" value="" size="30">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex">
                                    <a href="{{ route('pembelian.index') }}" id="refreshPage" class="btn btn-outline-info mr-2" data-toggle="tooltip" data-placement="top" title="Segarkan">
                                        <i class="fas fa-sync-alt mr-1"></i>
                                    </a>                                    
                                    <a href="{{ route('pembelian.create') }}" class="btn btn-outline-success mr-2" data-toggle="tooltip" data-placement="top" title="Tambah">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                    <a href="#" id="deleteAllSelectedRecord" class="btn btn-outline-danger" data-toggle="modal" data-target="#confirmationModal" data-url="{{ route('pembelian.destroy.multi') }}" >
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div id="confirmationModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <!-- Konten modal -->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Peringatan</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                  <p>Apakah Anda yakin ingin menghapus yang dipilih?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                  <button type="button" class="btn btn-danger" id="confirmDelete">Ya, Hapus</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <div id="uptTable" class="table-responsive">
                            <table class="table">
                                <thead >
                                    <tr class="text-center">
                                        <th>
                                            <input type="checkbox" name = "" id="select_all_ids">
                                        </th>                                        
                                        <th>#</th>
                                        <th>Tanggal Nota</th>
                                        <th>Nama Suplier</th>
                                        <th>Diskon</th>
                                        <th>Tanggal Dibuat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pembelian->isEmpty())
                                        <tr>
                                            <td colspan="9" class="text-center">Data kosong atau tidak ada data</td>
                                        </tr>
                                    @else
                                    @foreach($pembelian as $pembelian)
                                    <tr class="text-center" id = "upt_ids{{ $pembelian->id }}">
                                        <td><input type="checkbox" name="ids[]" class="checkbox_ids" id="{{ $pembelian->id }}" value="{{ $pembelian->id }}"></td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pembelian->TglNota }}</td>
                                        <td>{{ $pembelian->suplier->NmSuplier }}</td>
                                        <td>{{ $pembelian->diskon }}</td>
                                        <td>{{ $pembelian->created_at}}</td>

                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('pembelian.detail', $pembelian->id) }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('pembelian.edit', $pembelian->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Ubah">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('detail-pembelian.index', $pembelian->id) }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Ubah">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
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

    
@endsection