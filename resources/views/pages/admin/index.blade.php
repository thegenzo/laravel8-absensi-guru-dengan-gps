@extends('layout.app')

@section('title', 'Admin')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Admin</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Admin</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <th class="text-center">No</th>
                                        <th>Nama</th>
                                        <th class="text-center">NIP</th>
                                        <th>Alamat</th>
                                        <th>Nomor Handphone</th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        @forelse($admin as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $data->user->name }}</td>
                                            <td class="text-center">{{ $data->nip }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>{{ $data->no_hp }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.edit', $data->id) }}" class="btn btn-warning d-inline"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.destroy', $data->id) }}" method="POST" class="d-inline" onclick="return confirm('Apa yakin ingin menghapus data ini? Data yang terkait juga akan ikut terhapus')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" data-id="{{ $data->id }}" class="btn btn-danger d-inline"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Data Kosong. Klik "Tambahkan Admin" untuk tambah data</td>
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
</div>
@endsection

@push('addon-script')
<!-- Datatables -->
<script src="{{ asset('/assets/js/plugin/datatables/datatables.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#basic-datatables').DataTable();

        // $('.swal-confirm').click(function(event) {
        //     var form =  $(this).closest("form");
        //     var id = $(this).data("id");
        //     event.preventDefault();
        //     swal({
        //         title: `Yakin Hapus Data?`,
        //         text: "Menghapus dokter ini akan menghapus data pasien masuk yang terkait",
        //         icon: "warning",
        //         buttons: true,
        //         dangerMode: true,
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Ya, Hapus',
        //     })
        //     .then((willDelete) => {
        //         if (willDelete) {
        //             form.submit();
                    
        //         }
        //     });
        // });

        // $('.swal-confirm').click(function(e) {
        //     var form =  $(this).closest("form");
        //     var id = $(this).data("id");
        //     event.preventDefault();
        //     swal({
        //         title: 'Are you sure?',
        //         text: "You won't be able to revert this!",
        //         type: 'warning',
        //         buttons:{
        //             confirm: {
        //                 text : 'Yes, delete it!',
        //                 className : 'btn btn-success'
        //             },
        //             cancel: {
        //                 visible: true,
        //                 className: 'btn btn-danger'
        //             }
        //         }
        //     }).then((Delete) => {
        //         if (Delete) {
        //             swal({
        //                 title: 'Deleted!',
        //                 text: 'Your file has been deleted.',
        //                 type: 'success',
        //                 buttons : {
        //                     confirm: {
        //                         className : 'btn btn-success'
        //                     }
        //                 }
        //             });
        //         } else {
        //             swal.close();
        //         }
        //     });
        // });
    });
</script>
@endpush