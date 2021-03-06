@extends('admin.template.master')

@section('page_title', 'Profil')

@section('css_after')
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active">Profil</li>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Artikel Menu Profil</h3>
                            <div class="card-tools">
                                <!-- Buttons, labels, and many other things can be placed here! -->
                                <!-- Here is a label for example -->
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.profile.add') }}"><i
                                        class="fas fa-plus"></i> Tambah</a>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="main_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['list'] as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td class="d-flex">
                                                <a class="btn btn-sm btn-success mx-auto"
                                                    href="{{ route('admin.profile.edit', ['id' => $item->id]) }}"
                                                    data-toggle="tooltip" data-placement="top" title="Lihat atau Edit"><i
                                                        class="far fa-eye"></i></a>
                                                <button class="btn btn-sm btn-danger btn-hapus mx-auto"
                                                    data-id="{{ $item->id }}" data-name="{{ $item->title }}"
                                                    data-toggle="tooltip" data-placement="top" title="Hapus Artikel"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>aksi</th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

@section('js_after')
    <script src="{{ asset('admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script>
        $('#main_table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        const url = {
            hapus: "{{ route('admin.profile.delete', ['id' => 'sementara']) }}"
        };

        //Sweet Alert Hapus Artikel
        $(document).on('click', '.btn-hapus',
            function() {
                let parent = $(this).parent().parent().find(".jumlah").html();
                Swal.fire({
                    title: 'Yakin ingin menghapus Artikel ' + $(this).data('name') + '?',
                    text: "Anda tidak dapat mengembalikan setelah dihapus!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: `Ya`,
                    cancelButtonText: `Tidak`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        let temp = url.hapus
                        window.location.replace(temp.replace('sementara', $(this).data('id')))
                    }
                })
            }
        )

    </script>
@endsection
