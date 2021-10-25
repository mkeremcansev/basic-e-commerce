@extends('Back.main')
@section('content')
        <div class="page-wrapper">
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">@lang('keywords.product-create')</h5>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s12 l12">
                        <div class="card">
                            <div class="card-content">
                            <div class="row">
                                <form action="{{ route('Create.product') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-field col s6">
                                    <i class="material-icons prefix">title</i>
                                    <input id="title" name="title" type="text">
                                    <label for="title">@lang('keywords.product-title')
                                        <span class="errorMessage">{{ $errors->first('title') }}</span>
                                    </label>
                                </div>
                                <div class="input-field col s6">
                                    
                                    <i class="material-icons prefix">description</i>
                                    <select name="category">
                                        <option value="" disabled selected hidden>@lang('keywords.product-category')</option>
                                        @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    <label>
                                        <span class="errorMessage">{{ $errors->first('category') }}</span>
                                    </label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">title</i>
                                    <input id="fiyat" name="price" type="text">
                                    <label for="fiyat">@lang('keywords.product-price')
                                            <span class="errorMessage">{{ $errors->first('price') }}</span>
                                    </label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">description</i>
                                    <input id="indirim" name="discount" type="text">
                                    <label for="indirim">@lang('keywords.product-discount')</label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">description</i>
                                        <select class="js-example-basic-multiple" name="color[]" multiple="multiple">
                                            <option value="" disabled selected hidden>@lang('keywords.product-color')</option>
                                            @foreach ($colors as $color)
                                            <option value="{{ $color->title }}">{{ $color->title }}</option>
                                            @endforeach
                                        </select>
                                        <label>
                                            <span class="errorMessage">{{ $errors->first('color') }}</span>
                                        </label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">description</i>
                                        <select class="js-example-basic-multiple1" name="size[]" multiple="multiple">
                                            <option value="" disabled selected hidden>@lang('keywords.product-size')</option>
                                            @foreach ($sizes as $size)
                                            <option value="{{ $size->title }}">{{ $size->title }}</option>
                                            @endforeach
                                        </select>
                                        <label>
                                            <span class="errorMessage">{{ $errors->first('size') }}</span>
                                        </label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">description</i>
                                    <select name="brand">
                                        <option value="" disabled selected hidden>@lang('keywords.product-brand')</option>
                                        @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                        @endforeach
                                    </select>
                                    <label>
                                        <span class="errorMessage">{{ $errors->first('brand') }}</span>
                                    </label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">title</i>
                                    <input id="kod" name="code" type="text">
                                    <label for="kod">@lang('keywords.product-code')
                                        <span class="errorMessage">{{ $errors->first('code') }}</span>
                                    </label>
                                </div>
                                            <div class="col s6">
                                                <div class="file-field input-field">
                                                    <div class="btn cyan">
                                                        <span>@lang('keywords.product-image')</span>
                                                        <input type="file" multiple name="images[]">
                                                        <span class="errorMessage">{{ $errors->first('images') }}</span>
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="file-path validate" type="text">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="input-field col s6">
                                    <i class="material-icons prefix">description</i>
                                    <select name="best">
                                        <option value="" disabled selected hidden>@lang('keywords.top-selling')</option>
                                        <option value="1">@lang('keywords.yes')</option>
                                        <option value="0">@lang('keywords.no')</option>
                                    </select>
                                    <label>
                                        <span class="errorMessage">{{ $errors->first('best') }}</span>
                                    </label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">description</i>
                                    <select name="popular">
                                        <option value="" disabled selected hidden>@lang('keywords.popular-products')</option>
                                        <option value="1">@lang('keywords.yes')</option>
                                        <option value="0">@lang('keywords.no')</option>
                                    </select>
                                    <label>
                                        <span class="errorMessage">{{ $errors->first('popular') }}</span>
                                    </label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">description</i>
                                    <select name="featured">
                                        <option value="" disabled selected hidden>@lang('keywords.opportunity-products')</option>
                                        <option value="1">@lang('keywords.yes')</option>
                                        <option value="0">@lang('keywords.no')</option>
                                    </select>
                                    <label>
                                        <span class="errorMessage">{{ $errors->first('featured') }}</span>
                                    </label>
                                </div>
                                
                                        <div class="col s12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <h4 class="card-title">@lang('keywords.product-description') <span class="errorMessage">{{ $errors->first('description') }}</span></h4>
                                                    <div class="form-group">
                                                        <textarea name="description" id="ckeditor" cols="50" rows="15" class="ckeditor"></textarea>
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
        </div>
@endsection