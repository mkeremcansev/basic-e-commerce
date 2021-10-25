@extends('Back.main')
@section('content')
    <div class="page-wrapper">

            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">@lang('keywords.contract-list')</h5>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s12">
                        <div class="card"> 
                            <div class="card-content">
                                <a class="btn green waves-effect waves-light" href="{{ route('Create.contract') }}">@lang('keywords.contract-create')</a>
                                <table id="zero_config" class="responsive-table display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>@lang('keywords.title')</th>
                                            <th>@lang('keywords.content')</th>
                                            <th>@lang('keywords.date')</th>
                                            <th>@lang('keywords.event')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contracts as $contract)
                                        <tr>
                                            <td>{{ $contract->title }}</td>
                                            <td>{!! substr($contract->content, 0, 25) !!}...</td>
                                            <td>{{ $contract->created_at->diffForHumans() }}</td>
                                            <td><a href="{{ route('Update.contract.get', $contract->id) }}" class="btn orange waves-effect waves-light" type="submit">@lang('keywords.edit')</a></td>
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