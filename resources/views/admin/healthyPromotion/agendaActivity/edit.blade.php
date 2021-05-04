@extends('admin.template.master')

@section('page_title', 'Edit Agenda Kegiatan')

@section('breadcrumb')
    <li class="breadcrumb-item active">Promosi Kesehatan</li>
    <li class="breadcrumb-item active"><a href="{{ route('admin.healthyPromotion.healthyInfo.index') }}">Agenda
            Kegiatan</a></li>
    <li class="breadcrumb-item active">Edit</li>

@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Agenda Kegiatan</h3>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <form enctype="multipart/form-data"
                            action="{{ route('admin.healthyPromotion.agendaActivity.edit.post', [$data['item']->id]) }}"
                            method="POST" id="main_form">
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
                                    <label>Judul <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Judul" name="judul" required
                                        value="{{ $data['item']->title }}">
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <img id="blah" class="img-fluid" alt="your image"
                                            src="{{ asset($data['item']->image) }}" />
                                    </div>
                                    <div class="col-md-8 d-flex">
                                        <div class="form-group col-md-12 my-auto">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="imgInp" name="foto">
                                                <label class="custom-file-label" for="imgInp" id="label_foto">Pilih
                                                    Untuk Merubah Foto</label>
                                                <small class="form-text text-muted">- Ukuran max 256KB</small>
                                                <small class="form-text text-muted">- Harus berupa gambar (format: jpg,
                                                    jpeg, svg,
                                                    png , dll)</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <label for="">Deskripsi</label>
                                <textarea id="summernote" name="deskripsi">{{ $data['item']->description }}</textarea>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer d-flex">
                                <a class="btn btn-warning text-light"
                                    href="{{ route('admin.healthyPromotion.agendaActivity.index') }}"><i
                                        class="fas fa-arrow-left"></i> Kembali</a>
                                <button class="ml-auto btn btn-primary" type="submit"><i class="fas fa-save"></i>
                                    Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css_after')
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/summernote/summernote-bs4.min.css">

@endsection

@section('js_after')
    <script src="{{ asset('admin') }}/plugins/summernote/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Masukkan Deskripsi disini (Opsional)',
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                }
            }

            $("#imgInp").change(function() {
                readURL(this);
            });
        });

    </script>
@endsection
