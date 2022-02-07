<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <title>Alvan School</title>
    @include('layout.head');
    <style>
        .row{
            float: center;
            width: 90%;
        }
    </style>
</head>
<body>
<div class="wrapper">

  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah siswa</h1>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="row">
        <div class="col-lg-10 margin-tb">
            <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>   
        
    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-10">
                <div class="form-group">
                    <strong>Nis:</strong>
                    <input type="text" name="nis" class="form-control" placeholder="NIS">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-10">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Nama">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-10">
                <div class="form-group">
                    <strong>Rombel:</strong>
                    <select class="form-control" name="rombel">
                        @foreach($rombels as $rombel)
                        <option value="{{$rombel->rombel}}">{{$rombel->rombel}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-10">
                <div class="form-group">
                    <strong>Rayon:</strong>
                    <select class="form-control" name="rayon">
                        @foreach($rayons as $rayon)
                        <option value="{{$rayon->rayon}}">{{$rayon->rayon}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- level student -->
                <input type="hidden" name="level" value="student"></input>
            <!-- end level -->
            <div class="col-xs-12 col-sm-12 col-md-10">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="example@gmail.com">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-10">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" class="form-control" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-10">
                <div class="form-group">
                    <strong>Foto:</strong>
                    <input type="file" name="foto" class="form-control" >
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

        
    </form>
</div>
<!-- end content -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('layout.script')

</body>
</html>



