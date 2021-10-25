@extends('Back.main')
@section('content')
        <div class="page-wrapper">
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">@lang('keywords.iyzico')</h5>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form action="{{ route('Update.payment') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">done_outline</i>
                                            <input id="name" name="key" value="{{ $payment->key }}" type="text">
                                            <label for="name">@lang('keywords.iyzico-key')
                                            <span class="errorMessage">{{ $errors->first('key') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">done_outline</i>
                                            <input id="name" name="secret" value="{{ $payment->secret }}" type="text">
                                            <label for="name">@lang('keywords.iyzico-secret')
                                            <span class="errorMessage">{{ $errors->first('secret') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">done_outline</i>
                                            <input id="name" name="url" value="{{ $payment->url }}" type="text">
                                            <label for="name">@lang('keywords.iyzico-url')
                                             <span class="errorMessage">{{ $errors->first('url') }}</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn cyan waves-effect waves-light right" type="submit">@lang('keywords.save')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection