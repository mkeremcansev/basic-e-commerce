@extends('Back.main')
@section('content')
<div class="page-wrapper">
    <div class="page-titles">
        <h5 class="font-medium m-b-0">@lang('keywords.settings')</h5>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col s12 l12">
                <div class="card">
                    <div class="card-content">
                        <form method="POST" action="{{ route('Update.settings') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">title</i>
                                    <input id="name3" name="title" value="{{ $general->title }}" type="text">
                                    <label for="name3">@lang('keywords.website-title')
                                        @if ($errors->first('title'))
                                        <span class="errorMessage">*{{ $errors->first('title') }}</span>
                                        @endif
                                    </label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">description</i>
                                    <input id="name3" name="description" value="{{ $general->description }}"
                                        type="text">
                                    <label for="name3">@lang('keywords.website-description')
                                        @if ($errors->first('description'))
                                        <span class="errorMessage">*{{ $errors->first('description') }}</span>
                                        @endif
                                    </label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">code</i>
                                    <input id="name3" name="keywords" value="{{ $general->keywords }}" type="text">
                                    <label for="name3">@lang('keywords.website-keywords')
                                        @if ($errors->first('keywords'))
                                        <span class="errorMessage">*{{ $errors->first('keywords') }}</span>
                                        @endif
                                    </label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">payment</i>
                                    <input id="name3" name="footer" value="{{ $general->footer }}" type="text">
                                    <label for="name3">@lang('keywords.website-footer')
                                        @if ($errors->first('footer'))
                                        <span class="errorMessage">*{{ $errors->first('footer') }}</span>
                                        @endif
                                    </label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">home</i>
                                    <input id="name3" name="adress" value="{{ $general->adress }}" type="text">
                                    <label for="name3">@lang('keywords.website-adress')
                                        @if ($errors->first('adress'))
                                        <span class="errorMessage">*{{ $errors->first('adress') }}</span>
                                        @endif
                                    </label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">map</i>
                                    <input id="name3" name="map" value="{{ $general->map }}" type="text">
                                    <label for="name3">@lang('keywords.website-map')
                                        @if ($errors->first('map'))
                                        <span class="errorMessage">*{{ $errors->first('map') }}</span>
                                        @endif
                                    </label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">rss_feed</i>
                                    <input id="name3" name="facebook" value="{{ $general->facebook }}" type="text">
                                    <label for="name3">@lang('keywords.website-facebook')
                                        @if ($errors->first('facebook'))
                                        <span class="errorMessage">*{{ $errors->first('facebook') }}</span>
                                        @endif
                                    </label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">person</i>
                                    <input id="name3" name="instagram" value="{{ $general->instagram }}" type="text">
                                    <label for="name3">@lang('keywords.website-instagram')
                                        @if ($errors->first('instagram'))
                                        <span class="errorMessage">*{{ $errors->first('instagram') }}</span>
                                        @endif
                                    </label>
                                </div>


                                <div class="input-field col s6">
                                    <i class="material-icons prefix">public</i>
                                    <input id="name3" name="twitter" value="{{ $general->twitter }}" type="text">
                                    <label for="name3">@lang('keywords.website-twitter')
                                        @if ($errors->first('twitter'))
                                        <span class="errorMessage">*{{ $errors->first('twitter') }}</span>
                                        @endif
                                    </label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">email</i>
                                    <input id="name3" name="mail" value="{{ $general->mail }}" type="text">
                                    <label for="name3">@lang('keywords.website-mail')
                                        @if ($errors->first('mail'))
                                        <span class="errorMessage">*{{ $errors->first('mail') }}</span>
                                        @endif
                                    </label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">message</i>
                                    <input id="name3" name="whatsapp" value="{{ $general->whatsapp }}" type="text">
                                    <label for="name3">@lang('keywords.website-whatsapp')
                                        @if ($errors->first('whatsapp'))
                                        <span class="errorMessage">*{{ $errors->first('whatsapp') }}</span>
                                        @endif
                                    </label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">phone</i>
                                    <input id="name3" name="phone" value="{{ $general->phone }}" type="text">
                                    <label for="name3">@lang('keywords.website-phone')
                                        @if ($errors->first('phone'))
                                        <span class="errorMessage">*{{ $errors->first('phone') }}</span>
                                        @endif
                                    </label>
                                </div>

                                <div class="col s6">
                                    <div class="file-field input-field">
                                        <div class="btn cyan">
                                            <span>@lang('keywords.logo')</span>
                                            <input name="logo" type="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                        @if ($errors->first('logo'))
                                        <span class="errorMessage">*{{ $errors->first('logo') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col s6">
                                    <div class="file-field input-field">
                                        <div class="btn cyan">
                                            <span>@lang('keywords.favicon')</span>
                                            <input name="favicon" type="file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                        @if ($errors->first('favicon'))
                                        <span class="errorMessage">*{{ $errors->first('favicon') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="input-field col s12">
                                    <button class="btn cyan waves-effect waves-light right"
                                        type="submit">@lang('keywords.save')
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 l6">
                <div class="card">
                    <div class="card-content">
                        <h5>@lang('keywords.updated-logo')</h5>
                        <div class="row">
                            <div class="input-field col s6">
                                <img width="200" src="{{ asset($general->logo) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 l6">
                <div class="card">
                    <div class="card-content">
                        <h5>@lang('keywords.updated-favicon')</h5>
                        <div class="row">
                            <div class="input-field col s6">
                                <img width="70" src="{{ asset($general->favicon) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection