@extends('layouts._AdmTempelate')

@section('content')
    <div class="row">
        <div class="col-lg-12">
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pegawai Setting</h3>
                        <p class="panel-subtitle">Pegawai Control Panel</p>
                        <div class="right">
                            <a href="{{'/admin/pegawai/create'}}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah Data </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <h4>List Pegawai</h4>
                        <table class="table table-hover">
                            <thead>
                                <th>#</th>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Jabatan</th>
                                <th>No HP</th>
                                <th>Tgl Masuk</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @php
                                    $n=1;
                                @endphp
                                @foreach ($data_emp as $emp)
                                    <tr>
                                        <td>{{$n++}}</td>
                                        <td>{{$emp->emp_code}}</td>
                                        <td>{{$emp->emp_name}}</td>
                                        <td>{{$emp->getJob()->division_name}}</td>
                                        <td>{{$emp->getJob()->position}}</td>
                                        <td>{{$emp->emp_phone_number}}</td>
                                        <td>{{$emp->emp_date_in}}</td>
                                        <td>{{$emp->emp_status}}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>   
@endsection