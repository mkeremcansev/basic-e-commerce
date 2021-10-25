@extends('Back.main')
@section('content')
    <div class="page-wrapper">
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">@lang('keywords.users')</h5>
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
                                            <th>@lang('keywords.name') @lang('keywords.surname')</th>
                                            <th>@lang('keywords.authority')</th>
                                            <th>@lang('keywords.user')</th>
                                            <th>@lang('keywords.e-mail')</th>
                                            <th>@lang('keywords.date')</th>
                                            <th>@lang('keywords.event')</th>
                                            <th>@lang('keywords.event')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }} {{ $user->surname }}</td>
                                            <td>
                                                @if ($user->isAdmin == 0)
                                                <span class="userColor">@lang('keywords.user')</span>
                                                @else
                                                <span class="adminColor">@lang('keywords.admin')</span>
                                                @endif
                                            </td>
                                            <td>{{ $user->username }}</td>
                                            <td>
                                                @if ($user->verify == 0)
                                                <span class="errorMessage">@lang('keywords.not-verify')</span>
                                                @else
                                                <span class="successMessage">@lang('keywords.yes-verify')</span>
                                                @endif
                                            </td>
                                            <td>{{ $user->created_at->diffForHumans() }}</td>
                                            <td><a href="{{ route('Delete.user', $user->id) }}" class="btn red waves-effect waves-light" type="submit">@lang('keywords.delete')</a></td>
                                            <td><a href="{{ route('Detail.user', $user->id) }}" class="btn green waves-effect waves-light" type="submit">@lang('keywords.detail')</a></td>
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