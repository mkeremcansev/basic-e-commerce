@extends('Back.main')
@section('content')
        <div class="page-wrapper">
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">@lang('keywords.contact-detail')</h5>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s12 l12">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">perm_identity</i>
                                            <input disabled id="name" name="title" value="{{ $contact->name }} {{ $contact->surname }}" type="text">
                                            <label for="name">@lang('keywords.name') / @lang('keywords.surname')</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">title</i>
                                            <input disabled id="name" name="title" value="{{ $contact->title }}" type="text">
                                            <label for="name">@lang('keywords.title')</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">payment</i>
                                            <input id="email" name="description" type="text" value="{{ $contact->content }}" disabled>
                                            <label for="email">@lang('keywords.content')</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">swap_horizontal_circle</i>
                                            <input id="email" name="description" type="text" value="{{ $contact->ip }}" disabled>
                                            <label for="email">@lang('keywords.ip')</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">info</i>
                                            <input id="email" name="description" type="text" value="{{ $contact->info }}" disabled>
                                            <label for="email">@lang('keywords.browser')</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">update</i>
                                            <input id="email" name="description" type="text" value="{{ $contact->created_at->diffForHumans() }}" disabled>
                                            <label for="email">@lang('keywords.date')</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <a href="{{ route('Delete.contact', $contact->id) }}" class="btn red waves-effect waves-light right">@lang('keywords.delete')</a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection