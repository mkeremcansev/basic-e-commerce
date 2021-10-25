@extends('Back.main')
@section('content')
    <div class="page-wrapper">

            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">@lang('keywords.slider-list')</h5>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <a class="btn green waves-effect waves-light" href="{{ route('Create.brand') }}">@lang('keywords.brand-create')</a>
                                <table id="zero_config" class="responsive-table display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>@lang('keywords.image')</th>
                                            <th>@lang('keywords.title')</th>
                                            <th>@lang('keywords.date')</th>
                                            <th>@lang('keywords.event')</th>
                                            <th>@lang('keywords.event')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                        <tr>
                                            <td><img width="100" src="{{ asset($brand->image) }}"></td>
                                            <td>{{ $brand->title }}</td>
                                            <td>{{ $brand->created_at->diffForHumans() }}</td>
                                            <td><a href="{{ route('Delete.brand', $brand->id) }}" class="btn red waves-effect waves-light" type="submit">@lang('keywords.delete')</a></td>
                                            <td><a href="{{ route('Update.brand.get', $brand->id) }}" class="btn orange waves-effect waves-light" type="submit">@lang('keywords.edit')</a></td>
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