@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dokumen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Dokumen</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Create Dokumen</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                          <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Enter judul">
                          </div>
                          <div class="form-group">
                            <label for="foto">Foto</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="foto">Choose file</label>
                              </div>
                            </div>
                          </div>                  
                          <div class="form-group">
                            <label for="url_pdf">URL PDF</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="url_pdf" name="url_pdf">
                                <label class="custom-file-label" for="url_pdf">Choose file</label>
                              </div>
                            </div>
                          </div>                  
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <a href="{{ route('dokumen.index') }}" class="btn btn-danger">Back</a>
                    </div>
                  </form>
              </div>
              <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection