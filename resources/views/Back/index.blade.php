@extends('Back.main')
@section('content')
<div class="page-wrapper">
    <div class="page-titles"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col l3 m6 s12">
                <div class="card danger-gradient card-hover">
                    <div class="card-content">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h2 class="white-text m-b-5">{{ $products->count() }}</h2>
                                <h6 class="white-text op-5 light-blue-text">@lang('keywords.product-all')</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="white-text display-6"><i class="material-icons">assignment</i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l3 m6 s12">
                <div class="card success-gradient card-hover">
                    <div class="card-content">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h2 class="white-text m-b-5">{{ $reviews->count() }}</h2>
                                <h6 class="white-text op-5 text-darken-2">@lang('keywords.review-all')</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="white-text display-6"><i class="material-icons">equalizer</i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col l3 m6 s12">
                <div class="card warning-gradient card-hover">
                    <div class="card-content">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h2 class="white-text m-b-5">{{ $allOrders->sum('total') }} ₺</h2>
                                <h6 class="white-text op-5">@lang('keywords.all-price')</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="white-text display-6"><i class="material-icons">work</i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col l3 m6 s12">
                <div class="card info-gradient card-hover">
                    <div class="card-content">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h2 class="white-text m-b-5">{{ $users->count() }}</h2>
                                <h6 class="white-text op-5">@lang('keywords.user-all')</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="white-text display-6"><i class="material-icons">perm_identity</i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">@lang('keywords.contact-list')</h5>
                </div>
            </div>
        <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <table id="zero_config" class="responsive-table display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>@lang('keywords.name') / @lang('keywords.surname')</th>
                                            <th>@lang('keywords.title')</th>
                                            <th>@lang('keywords.content')</th>
                                            <th>@lang('keywords.date')</th>
                                            <th>@lang('keywords.event')</th>
                                            <th>@lang('keywords.event')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->name}} {{ $contact->surname }}</td>
                                            <td>{{ $contact->title}}</td>
                                            <td>{{ threeDot($contact->content) }}</td>
                                            <td>{{ $contact->created_at->diffForHumans() }}</td>
                                            <td><a href="{{ route('Delete.contact', $contact->id) }}" class="btn red waves-effect waves-light" type="submit">@lang('keywords.delete')</a></td>
                                            <td><a href="{{ route('Detail.contact', $contact->id) }}" class="btn green waves-effect waves-light" type="submit">@lang('keywords.detail')</a></td>
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