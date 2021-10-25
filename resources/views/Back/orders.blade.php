@extends('Back.main')
@section('content')
    <div class="page-wrapper">
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">@lang('keywords.orders')</h5>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <table id="zero_config" class="responsive-table display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>@lang('keywords.name') @lang('keywords.surname')</th>
                                            <th>@lang('keywords.adress')</th>
                                            <th>@lang('keywords.total')</th>
                                            <th>@lang('keywords.status')</th>
                                            <th>@lang('keywords.date')</th>
                                            <th>@lang('keywords.event')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allOrders as $order)
                                        <tr>
                                            <td>{{ $order->name }} {{ $order->surname }}</td>
                                            <td>{{ threeDot($order->adress) }}</td>
                                            <td>{{ $order->total }} ₺</td>
                                            <td>
                                            @if ($order->status == 1)
                                                <span style="color: orange; font-weight:bold;">@lang('keywords.order-okey')</span>
                                                @elseif ($order->status == 2)
                                                 <span style="color: orangered; font-weight:bold;">@lang('keywords.wait-ready')</span>
                                                @elseif ($order->status == 3)
                                                 <span style="color:rgb(0, 110, 255); font-weight:bold;"">@lang('keywords.cargo')</span>
                                                @elseif ($order->status == 4)
                                                <span style="color: green; font-weight:bold;"> @lang('keywords.order-user-okey')</span>
                                            @endif 
                                            </td>
                                            <td>{{ $order->created_at->diffForHumans() }}</td>
                                            <td><a href="{{ route('Detail.order', $order->id) }}" class="btn green waves-effect waves-light" type="submit">@lang('keywords.detail')</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection