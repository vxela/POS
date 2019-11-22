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
                        <tbody class="dropzone">
                            @php
                            $n =1; 
                            @endphp
                            @foreach ($data_shipment as $order)
                                <tr class="dragable">
                                    <td>
                                        <input type="checkbox" name="id_faktur[]" value="{{$order->id}}">
                                    </td>
                                    <td>
                                        {{$n++}}
                                    </td>
                                    <td>
                                        {{$order->getCustomer()->name}}
                                    </td>
                                    <td>
                                        {{$order->getCustomer()->address}}
                                    </td>
                                    <td>
                                        <select name="carlist" id="carlist" data-id="{{$order->id}}" data-route="{{'/penjualan/kirim/order/ajaxUpdate/'.$order->id}}" class="form-control carlist">
                                            <option value="">Pilih</option>
                                            @foreach ($data_tool as $tool)
                                                @if ($order->tool_id == $tool->id)
                                                    <option value="{{$tool->id}}" selected>{{$tool->tool_name}}</option>
                                                @else
                                                    <option value="{{$tool->id}}">{{$tool->tool_name}}</option>
                                                @endif
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
            </form>
        </div>
        <!-- END PANEL HEADLINE -->
    </div> 
</div>  
@endsection