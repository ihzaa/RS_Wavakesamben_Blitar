@extends('admin.template.master')

@section('page_title', 'Tambah Artikel Profil')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.profile.index') }}">Profil</a></li>
    <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('css_after')
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Artikel Profil Baru</h3>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <form action="{{ route('admin.profile.add.post') }}" method="POST">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" placeholder="Judul" value="{{ old('judul') }}"
                                        name="judul">
                                    <small class="form-text text-muted">Disarankan kurang dari 100 karakter.</small>
                                </div>
                                <label for="">Deskripsi</label>
                                <textarea id="summernote" name="deskripsi">{{ old('deskripsi') }}</textarea>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer d-flex">
                                <a class="btn btn-warning text-light"
                                    href="{{ route('admin.profile.index') }}">Kembali</a>
                                <button class="ml-auto btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js_after')
    <script src="{{ asset('admin') }}/plugins/summernote/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Masukkan Deskripsi disini',
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
            });
        });

    </script>
@endsection
