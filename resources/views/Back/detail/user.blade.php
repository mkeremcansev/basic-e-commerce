@extends('Back.main')
@section('content')
        <div class="page-wrapper">
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">@lang('keywords.user-detail')</h5>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form action="{{ route('Update.user', $user->id) }}" method="POST">
                                    @csrf
                                <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">perm_identity</i>
                                            <input disabled id="name" value="{{ $user->name." ".$user->surname }}" type="text">
                                            <label for="name">@lang('keywords.name') / @lang('keywords.surname')</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">title</i>
                                            <input disabled id="name" value="{{ $user->phone }}" type="text">
                                            <label for="name">@lang('keywords.phone-number')</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">payment</i>
                                            <input id="email" type="text" value="{{ $user->email }}" disabled>
                                            <label for="email">@lang('keywords.email')</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">update</i>
                                            <input id="email" type="text" value="{{ $user->created_at->diffForHumans() }}" disabled>
                                            <label for="email">@lang('keywords.date')</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                        <i class="material-icons prefix">description</i>
                                        <select name="isAdmin">
                                            <option value="" disabled selected hidden>@lang('keywords.authority')</option>
                                            <option @if ($user->isAdmin == 1) selected @endif value="1">@lang('keywords.admin')</option>
                                            <option @if ($user->isAdmin == 0) selected @endif value="0">@lang('keywords.user')</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <a href="{{ route('Delete.user', $user->id) }}" class="btn red waves-effect waves-light right marginLeft">@lang('keywords.delete')</a>
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