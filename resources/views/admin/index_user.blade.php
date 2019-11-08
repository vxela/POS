@extends('layouts._AdmTempelate')

@section('content')
    <div class="row">
        <div class="col-lg-12">
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">User Setting</h3>
                        <p class="panel-subtitle">User Control Panel</p>
                        <div class="right">
                            <a href="{{'/admin/user/create'}}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah Data </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <h4>List User</h4>
                        <table class="table table-hover">
                            <thead>
                                <th>#</th>
                                <th>Role</th>
                                <th>Divisi</th>
                                <th>Username</th>
                                <th>Input by</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @php
                                    $n=1;
                                @endphp
                                @foreach ($data_user as $user)
                                    <tr>
                                        <td>{{$n++}}</td>
                                        <td>{{$user->user_role}}</td>
                                        <td>{{$user->getPegawai()->getJob()->division_name}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->getUser()->name}}</td>
                                        <td>{{$user->user_status}}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>                        
                    </div>
                </div>
        </div>
    </div>   
@endsection