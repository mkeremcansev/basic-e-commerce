@extends('Back.main')
@section('content')
        <div class="page-wrapper">
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">@lang('keywords.review-detail')</h5>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form action="{{ route('Update.review', $review->id) }}" method="POST">
                                    @csrf
                                <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">perm_identity</i>
                                            <input disabled id="name" value="{{ $review->getUser->name }} {{ $review->getUser->surname }}" type="text">
                                            <label for="name">@lang('keywords.name') / @lang('keywords.surname')</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">title</i>
                                            <input disabled id="name" value="{{ $review->title }}" type="text">
                                            <label for="name">@lang('keywords.title')</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">payment</i>
                                            <input id="email" type="text" value="{{ $review->description }}" disabled>
                                            <label for="email">@lang('keywords.content')</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">check</i>
                                            <input id="email" type="text" value="{{ $review->rating }}" disabled>
                                            <label for="email">@lang('keywords.star')</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">update</i>
                                            <input id="email" type="text" value="{{ $review->created_at->diffForHumans() }}" disabled>
                                            <label for="email">@lang('keywords.date')</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                        <i class="material-icons prefix">description</i>
                                        <select name="status">
                                            <option value="" disabled selected hidden>@lang('keywords.status')</option>
                                            <option @if ($review->status == 1) selected @endif value="1">@lang('keywords.active')</option>
                                            <option @if ($review->status == 0) selected @endif value="0">@lang('keywords.passive')</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <a href="{{ route('Delete.review', $review->id) }}" class="btn red waves-effect waves-light right marginLeft">@lang('keywords.delete')</a>
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