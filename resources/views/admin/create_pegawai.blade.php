@extends('layouts._AdmTempelate')

@section('content')
    <div class="row">
        <div class="col-lg-12">
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tambah Pegawai</h3>
                        <p class="panel-subtitle">Pegawai Control Panel</p>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-8 col-lg-offset-2">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 col-form-label">Nomor Pegawai</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="emp_number" name="emp_number" placeholder="ex : 038">
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 col-form-label">Nama Pegawau</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Nama Lengkap Gelar">
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 col-form-label">NIK</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="emp_nik" name="emp_nik" placeholder="Username">
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 col-form-label">Jenis Kelamin</label>
                                        <div class="col-lg-8">
                                            <label class="radio-inline">
                                                <input type="radio" name="emp_sex" id="emp_sex" value="L"> Laki-laki
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="emp_sex" id="emp_sex" value="P"> Perempuan
                                            </label>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 col-form-label">Alamat</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 col-form-label">Nomor Kontak</label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 col-form-label">Agama</label>
                                        <div class="col-lg-8">
                                            <select id="nama_pegawai" name="nama_pegawai" class="form-control">
                                                <option selected>-- Pilih Pegawai --</option>
                                                <option>...</option>
                                            </select>
                                            <input type="hidden" class="form-control" id="id_pegawai" name="id_pegawai" value="">
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 col-form-label">Tanggal Masuk</label>
                                        <div class="col-lg-8">
                                            <input type="date" class="form-control" id="username" name="username" placeholder="Username">
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 col-form-label"></label>
                                        <div class="col-lg-8">
                                            <button type="reset" class="btn btn-default">Reset</button>
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                </div>                                
                                <div class="row">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>   
@endsection