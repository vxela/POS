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
                            <form action="{{route('pegawai.store')}}" method="post">
                                <div class="form-group row">
                                    <label for="" class="col-lg-4 col-form-label">Nomor Pegawai <small class="text-red">*</small></label>
                                        <div class="col-lg-8">
                                            @csrf
                                            <input type="text" class="form-control" id="emp_number" name="emp_number" placeholder="ex : 038" required>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 col-form-label">Nama Pegawai <small class="text-red">*</small></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Nama Lengkap Gelar" required>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 col-form-label">NIK <small class="text-red">*</small></label>
                                        <div class="col-lg-8">
                                            <input type="number" class="form-control" id="emp_nik" name="emp_nik" placeholder="Nomor KTP" required>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 col-form-label">Jenis Kelamin <small class="text-red">*</small></label>
                                        <div class="col-lg-8">
                                            <label class="radio-inline">
                                                <input type="radio" name="emp_sex" id="emp_sex" value="L" checked> Laki-laki
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="emp_sex" id="emp_sex" value="P"> Perempuan
                                            </label>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 col-form-label">Alamat <small class="text-red">*</small></label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" rows="2" id="emp_address" name="emp_address" style="resize: vertical; max-height: 100px" placeholder="Alamat" required></textarea>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 col-form-label">Nomor Kontak  <small class="text-red">*</small></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="emp_contact" name="emp_contact" placeholder="No HP" required>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 col-form-label">Agama <small class="text-red">*</small></label>
                                        <div class="col-lg-8">
                                            <select id="emp_agama" name="emp_agama" class="form-control">
                                                <option value="Islam" selected>Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghuchu">Konghuchu</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-lg-4 col-form-label">Tanggal Masuk <small class="text-red">*</small></label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control datepicker" id="emp_date_in" name="emp_date_in" placeholder="Tanggal Masuk">
                                        </div>
                                </div>
                                <div class="form-group row">
                                        <label for="staticEmail" class="col-lg-4 col-form-label">Division<small class="text-red">*</small></label>
                                            <div class="col-lg-8">
                                                <select id="emp_job_field" name="emp_job_field" class="form-control">
                                                    <option value="">-- Pilih Divisi dan Posisi --</option>
                                                    @foreach ($data_jobf as $jobf)
                                                        <option value="{{$jobf->id}}">{{$jobf->division_name.' - '.$jobf->position}}</option>   
                                                    @endforeach
                                                </select>
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