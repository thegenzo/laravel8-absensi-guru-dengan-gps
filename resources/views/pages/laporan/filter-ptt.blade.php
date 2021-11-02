@extends('layout.app')

@section('title', 'Laporan Absensi Guru GTT')

@push('addon-style')
<link rel="stylesheet" href="{{ asset('assets/css/datepicker.css') }}">
@endpush

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Laporan Absensi Guru GTT</h4>
                <div class="btn-group btn-group-page-header ml-auto">
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-md-10 pl-md-0">
                    <div class="card card-round">
                        <div class="card-header bg-success">
                            <div class="card-title text-white">
                                Lihat Data
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="label">Tanggal Awal</label>
                                        <input type="date" name="tglawal" id="tglawal" class="form-control" data-date-format="yyyy-mm-dd" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="label">Tanggal Akhir</label>
                                        <input type="date" name="tglakhir" id="tglakhir" class="form-control" data-date-format="yyyy-mm-dd" />
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <a href="" onclick="this.href='/filter-pns/'+ document.getElementById('tglawal').value +
                                    '/' + document.getElementById('tglakhir').value " class="btn btn-info">Lihat <i class="fas fa-print"></i></a>
                                    <a href="/cetak-ptt/{{ $data1 }}/{{ $data2 }}" class="btn btn-danger">Cetak PDF <i class="fas fa-file-pdf"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <table id="basic-datatables" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Tanggal</td>
                                        <td>Nama Guru GTT</td>
                                        <td>Jam Masuk</td>
                                        <td>Jam Keluar</td>
                                        <td>Jumlah Jam Kerja</td>
                                        <td>Keterangan Masuk</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($absen_ptt as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->tgl)->locale('id')->isoFormat('LL') }}</td>
                                        <td>{{ $data->guru_ptt->user->name }}</td>
                                        <td>{{ $data->jam_masuk }}</td>
                                        <td>{{ $data->jam_keluar }}</td>
                                        <td>{{ $data->jam_kerja }}</td>
                                        @if($data->jam_masuk > ('08:15:00'))
                                        <td class="text-danger">Terlambat</td>
                                        @else
                                        <td class="text-success">Tepat Waktu</td>
                                        @endif
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Data Kosong</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<!-- Datatables -->
<script src="{{ asset('/assets/js/plugin/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('/assets/js/plugin/bootstrap-datepicker/bootstrap-datepicker.id.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#basic-datatables').DataTable();
    });
</script>
@endpush