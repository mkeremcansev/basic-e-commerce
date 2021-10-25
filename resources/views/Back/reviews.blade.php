@extends('Back.main')
@section('content')
    <div class="page-wrapper">

            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">@lang('keywords.review-list')</h5>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <table id="zero_config" class="responsive-table display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>@lang('keywords.title')</th>
                                            <th>@lang('keywords.status')</th>
                                            <th>@lang('keywords.user')</th>
                                            <th>@lang('keywords.product')</th>
                                            <th>@lang('keywords.date')</th>
                                            <th>@lang('keywords.event')</th>
                                            <th>@lang('keywords.event')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                        <tr>
                                            <td>{{ $review->title }}</td>
                                            <td>@if ($review->status == 1)
                                                @lang('keywords.active')
                                                @else
                                                @lang('keywords.passive')
                                                @endif
                                            </td>
                                            <td>
                                                {{ $review->getUser->username }}</td>
                                            <td><a target="_blank" href="{{ route('Front.single', [$review->getProduct->getCategory->slug, $review->getProduct->slug]) }}">{{ threeDot($review->getProduct->title) }}</a></td>
                                            <td>{{ $review->created_at->diffForHumans() }}</td>
                                            <td><a href="{{ route('Delete.review', $review->id) }}" class="btn red waves-effect waves-light" type="submit">@lang('keywords.delete')</a></td>
                                            <td><a href="{{ route('Detail.review', $review->id) }}" class="btn green waves-effect waves-light" type="submit">@lang('keywords.detail')</a></td>
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