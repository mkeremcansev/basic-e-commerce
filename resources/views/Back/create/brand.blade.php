@extends('Back.main')
@section('content')
        <div class="page-wrapper">
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">@lang('keywords.brand-create')</h5>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form action="{{ route('Create.brand') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">title</i>
                                            <input id="name" name="title" type="text">
                                            <span class="errorMessage">{{ $errors->first('title') }}</span>
                                            <label for="name">@lang('keywords.brand-title')</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                            <div class="col s12">
                                                <div class="file-field input-field">
                                                    <div class="btn cyan">
                                                        <span>@lang('keywords.brand-image')</span>
                                                        <input type="file" name="image">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text">
                                                    </div>
                                                    <span class="errorMessage">{{ $errors->first('image') }}</span>
                                                </div>
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