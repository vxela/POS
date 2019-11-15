@extends('layouts._KsrTempelate')

@section('content')
  
<div class="row">
        <div class="col-md-12">
                <!-- PANEL HEADLINE -->
            <div class="panel panel-headline">
                <form action="{{'/penjualan/kirim/order'}}" method="post">
                    @csrf
                    <div class="panel-heading">
                        <h3 class="panel-title">Setup Pengiriman Data {{Carbon\Carbon::now()->formatLocalized('%A, %d %h %Y')}}</h3>
                        {{-- <div class="right">
                            <a href="{{'/penjualan/create'}}" class="btn btn-default"><i class="fa fa-plus-square"></i> Tambah Data </a>
                        </div> --}}
                    </div>
                    <div class="panel-body">
                        <div class="">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <i class="fa fa-info-circle"></i> {{ session('status') }}
                                </div>
                            @endif
                        </div>
                        <table class="table">
                            <thead>
                                <th>
                                    <input type="checkbox" name="checkall" id="checkall" value="check_all">
                                </th>
                                <th>
                                    #
                                </th>
                                <th>
                                    Nama
                                </th>
                                <th>
                                    Alamat
                                </th>
                                <th>
                                    Pick Up
                                </th>
                                <th>
                                    -
                                </th>
                            </thead>
                            <tbody class="dropzone"
                                @php
                                $n =1; 
                                @endphp
                                @foreach ($data_order as $order)
                                    <tr class="dragable">
                                        <td>
                                            <input type="checkbox" name="id_faktur[]" value="{{$order->id}}">
                                        </td>
                                        <td>
                                            {{$n++}}
                                        </td>
                                        <td>
                                            {{$order->getCustomer()->ctm_name}}
                                        </td>
                                        <td>
                                            {{$order->getCustomer()->ctm_org_address}}
                                        </td>
                                        <td>
                                            <select name="carlist" class="form-control">
                                                <option value="">Pilih</option>
                                                @foreach ($data_tool as $tool)
                                                    <option value="{{$tool->id}}">{{$tool->tool_name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                                {{$order->id}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <select name="id_tool" class="form-control" required>
                                            <option value="">Pilih Pick Up</option>
                                            @foreach ($data_tool as $tool)
                                                <option value="{{$tool->id}}">{{$tool->tool_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select name="id_driver" class="form-control" required>
                                            <option value="">Pilih Driver</option>
                                            @foreach ($data_tool as $tool)
                                                <option value="{{$tool->id}}">{{$tool->tool_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select name="id_helper" class="form-control" required>
                                            <option value="volvo">Pilih Helper</option>
                                            @foreach ($data_tool as $tool)
                                                <option value="{{$tool->id}}">{{$tool->tool_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 text-right">
                                <Button class="btn btn-primary" type="submit">Simpan</Button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-lg-6" style="min-height: 200px;">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Order</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                        Alamat
                                    </th>
                                    <th>
                                        Pick Up
                                    </th>
                                    <th>
                                        -
                                    </th>
                                </thead>
                                <tbody class="dropzone">
                                    @php
                                        $n =1; 
                                    @endphp
                                    @foreach ($data_order as $order)
                                        <tr class="dragable">
                                            <td>
                                                {{$n++}}
                                            </td>
                                            <td>
                                                {{$order->getCustomer()->ctm_name}}
                                            </td>
                                            <td>
                                                {{$order->getCustomer()->ctm_org_address}}
                                            </td>
                                            <td>
                                                {{$order->id_pengiriman}}
                                            </td>
                                            <td>
                                                    {{$order->id}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" style="min-height: 200px;">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Left</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                        Alamat
                                    </th>
                                    <th>
                                        Pick Up
                                    </th>
                                    <th>
                                        -
                                    </th>
                                </thead>
                                <tbody class="dropzone">
                                    @php
                                        $n =1; 
                                    @endphp
                                    @foreach ($data_order as $order)
                                        <div class="dragable" draggable="true">
                                            <tr>
                                                <td>
                                                    {{$n++}}
                                                </td>
                                                <td>
                                                    {{$order->getCustomer()->ctm_name}}
                                                </td>
                                                <td>
                                                    {{$order->getCustomer()->ctm_org_address}}
                                                </td>
                                                <td>
                                                    {{$order->id_pengiriman}}
                                                </td>
                                                <td>
                                                        {{$order->id}}
                                                </td>
                                            </tr>                                            
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PANEL HEADLINE -->
        </div> 
</div>  
@endsection