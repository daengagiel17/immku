@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Berita</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Berita</li>
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
                <h3 class="card-title">Edit Berita</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('berita.update', ['id' => $berita->id] ) }}" method="POST">
                @csrf @method('PUT')
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Enter Judul" value="{{$berita->judul}}">
                      </div>
                      <div class="form-group">
                        <label for="sumber">Sumber</label>
                        <input type="text" class="form-control" id="sumber" name="sumber" placeholder="Enter Sumber" value="{{$berita->sumber}}">
                      </div>
                      <div class="form-group">
                        <label for="star_name">Star Name</label>
                        <input type="text" class="form-control" id="star_name" name="star_name" placeholder="Enter Star Name" value="{{$berita->star_name}}">
                      </div>
                      <div class="form-group">
                        <label for="url">URL</label>
                        <input type="url" class="form-control" id="url" name="url" placeholder="Enter url" value="{{$berita->url}}">
                      </div>
                      <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="url" class="form-control" id="foto" name="foto" placeholder="Enter foto" value="{{$berita->foto}}">
                      </div>            
                    </div>
                    <div class="col-8">
                      <div class="form-group">
                        <label for="detail">Detail</label>
                        <textarea class="form-control" id="detail" name="detail" rows="15" placeholder="Enter Detail">{{$berita->detail}}</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('berita.index') }}" class="btn btn-danger">Back</a>
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