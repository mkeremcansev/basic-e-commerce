@extends('Back.main')
@section('content')
        <div class="page-wrapper">
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">@lang('keywords.about-create')</h5>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form action="{{ route('Update.about', $about->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">title</i>
                                            <input id="name" name="title" value="{{ $about->title }}" type="text">
                                            <span class="errorMessage">{{ $errors->first('title') }}</span>
                                            <label for="name">@lang('keywords.about-title')</label>
                                        </div>
                                    </div>  

                                <div class="row">
                                    <div class="col s12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <h4 class="card-title">@lang('keywords.about-content') <span class="errorMessage">{{ $errors->first('content') }}</span></h4>
                                                    <div class="form-group">
                                                        <textarea name="content" id="ckeditor" cols="50" rows="15" class="ckeditor">{{ $about->content }}</textarea>
                                                    </div>
                                                </div>
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