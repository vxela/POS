@extends('layouts._KsrTempelate')

@section('content')
  
<div class="row">
        <div class="col-md-12">
                <!-- PANEL HEADLINE -->
            <div class="panel panel-headline">
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
                                <input type="checkbox" id="checkall">
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
                        <tbody>
                            @php
                               $n =1; 
                            @endphp
                            @foreach ($data_order as $order)
                                <tr class="dragable">
                                    <td>
                                        <input type="checkbox" name="id_faktur" value="">
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
                                        <select name="carlist" form="carform">
                                            <option value="volvo">Pilih</option>
                                            @foreach ($data_tool as $tool)
                                                <option value="{{$tool->id}}">{{$tool->tool_name}}</option>
                                            @endforeach
                                        </select>
                                        {{-- <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Pick Up
                                            <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Carry</a></li>
                                                <li><a href="#">Tata</a></li>
                                            </ul>
                                        </div> --}}
                                        {{-- {{$order->id_pengiriman}} --}}
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
                        <div class="col-lg-6">
                                <select name="carlist" form="carform">
                                    <option value="volvo">Pilih</option>
                                    @foreach ($data_tool as $tool)
                                        <option value="{{$tool->id}}">{{$tool->tool_name}}</option>
                                    @endforeach
                                </select>
                            <Button class="btn btn-primary">Simpan</Button>
                        </div>
                    </div>
                </div>
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
                                <tbody>
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
                                <tbody>
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
            </div>
            <!-- END PANEL HEADLINE -->
        </div> 
</div>  
@endsection