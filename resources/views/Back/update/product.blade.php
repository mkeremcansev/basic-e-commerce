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
                                <form action="{{ route('Update.product', $product->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-field col s6">
                                    <i class="material-icons prefix">title</i>
                                    <input id="title" value="{{ $product->title }}" name="title" type="text">
                                    <label for="title">@lang('keywords.product-title')
                                        <span class="errorMessage">{{ $errors->first('title') }}</span>
                                    </label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">description</i>
                                    <select name="category">
                                        <option value="" disabled selected hidden>@lang('keywords.product-category')</option>
                                        @foreach ($categorys as $category)
                                        <option @if($product->category==$category->id) selected @endif   value="{{$category->id}}"> {{$category->title}} </option>
                                        @endforeach
                                    </select>
                                    <label>
                                        <span class="errorMessage">{{ $errors->first('category') }}</span>
                                    </label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">title</i>
                                    <input id="fiyat" value="{{ $product->price }}" name="price" type="text">
                                    <label for="fiyat">@lang('keywords.product-price')
                                        <span class="errorMessage">{{ $errors->first('price') }}</span>
                                    </label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">description</i>
                                    <input id="indirim" value="{{ $product->discount }}" name="discount" type="text">
                                    <label for="indirim">@lang('keywords.product-discount')
                                    
                                    </label>
                                </div>

                                <div class="input-field col s6">
                                    <i class="material-icons prefix">description</i>
                                        <select class="js-example-basic-multiple" name="color[]" multiple="multiple">
                                            <option value="" disabled selected hidden>@lang('keywords.product-color')</option>
                                            @foreach ($colors as $color)
                                                <option {{ in_array($color->title, allItems($product->color))?'selected':null }} value="{{ $color->title }}">{{ $color->title }}</option>
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
                                                <option {{ in_array($size->title, allItems($product->size))?'selected':null }} value="{{ $size->title }}">{{ $size->title }}</option>
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
                                        <option @if($product->brand==$brand->id) selected @endif   value="{{$brand->id}}"> {{$brand->title}} </option>
                                        @endforeach
                                    </select>
                                    <label>
                                        <span class="errorMessage">{{ $errors->first('brand') }}</span>
                                    </label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">title</i>
                                    <input id="kod" value="{{ $product->code }}" name="code" type="text">
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
                                        <option @if($product->best==1) selected @endif  value="1"> @lang('keywords.yes') </option>
                                        <option @if($product->best==0) selected @endif  value="0"> @lang('keywords.no') </option>
                                    </select>
                                    <label>
                                        <span class="errorMessage">{{ $errors->first('best') }}</span>
                                    </label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">description</i>
                                    <select name="popular">
                                        <option value="" disabled selected hidden>@lang('keywords.popular-products')</option>
                                        <option @if($product->popular==1) selected @endif  value="1"> @lang('keywords.yes') </option>
                                        <option @if($product->popular==0) selected @endif  value="0"> @lang('keywords.no') </option>
                                    </select>
                                    <label>
                                        <span class="errorMessage">{{ $errors->first('popular') }}</span>
                                    </label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">description</i>
                                    <select name="featured">
                                        <option value="" disabled selected hidden>@lang('keywords.opportunity-products')</option>
                                        <option @if($product->featured==1) selected @endif  value="1"> @lang('keywords.yes') </option>
                                        <option @if($product->featured==0) selected @endif  value="0"> @lang('keywords.no') </option>
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
                                                        <textarea name="description" id="ckeditor" cols="50" rows="15" class="ckeditor">{{ $product->description }}</textarea>
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
                
    @if ($product->images != "")      
        <div class="row">
            <div class="col s12 l12">
                <div class="card">
                    <div class="card-content">
                        <h5>@lang('keywords.product-images')</h5>
                <div class="row el-element-overlay">
                    @foreach (allItems($product->images) as $image)
                    <div class="col m6 l3">
                        <div class="card">
                            
                            <div class="card-image">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img src="{{ asset($image) }}" /></div>
                                </div>
                            </div>
                        </div>
                        <div class="el-overlay">
                        <ul class="el-info">
                            <form action="{{ route('Update.product.image', $product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="image" value="{{ $image }}">
                            <center>
                                <li>
                                    <button class="btn-floating image-popup-vertical-fit" type="submit"><i class="material-icons">delete</i></button>
                                </li>
                            </center>

                            </form>
                        </ul>
                    </div>
                </div>
                    @endforeach
            </div>
                            </div>
            </div>
        </div>
        </div>
            @else
        <h1>resim yok</h1>
    @endif 



            </div>
        </div>
@endsection