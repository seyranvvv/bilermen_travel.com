@extends('admin.layouts.app')
@section('title') @lang('transAdmin.admin-panel') @endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="h3 mb-0">@lang('transAdmin.admin-panel')</div>
        <div class="d-inline-flex">
            <div class="dropdown mr-2">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dmb1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    {!! $api ? trans('transAdmin.api') : trans('transAdmin.web') !!}
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dmb1">
                    <a class="dropdown-item"
                       href="{!! route('admin.admin-panel', ['api' => 1, 'robot' => $robot]) !!}">
                        @lang('transAdmin.api')
                    </a>
                    <a class="dropdown-item"
                       href="{!! route('admin.admin-panel', ['api' => 0, 'robot' => $robot]) !!}">
                        @lang('transAdmin.web')
                    </a>
                </div>
            </div>
            <div class="dropdown">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dmb2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    {!! $robot ? trans('transAdmin.robot') : trans('transAdmin.human') !!}
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dmb2">
                    <a class="dropdown-item"
                       href="{!! route('admin.admin-panel', ['api' => $api, 'robot' => 0]) !!}">
                        @lang('transAdmin.human')
                    </a>
                    <a class="dropdown-item"
                       href="{!! route('admin.admin-panel', ['api' => $api, 'robot' => 1]) !!}">
                        @lang('transAdmin.robot')
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-2">
        <div class="col-md-8">
            <div class="card shadow my-3">
                <div class="card-header py-3">
                    <div class="h6 mb-0">
                        @lang('transAdmin.recent-visitors')
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                            <tr class="font-weight-bold">
                                <td>@lang('transAdmin.ip-address')</td>
                                <td>@lang('transAdmin.datetime')</td>
                                <td>@lang('transAdmin.platform')</td>
                                <td>@lang('transAdmin.hits')</td>
                            </tr>
                            @forelse($visitors as $visitor)
                                <tr class="{{ $visitor->suspect_hits > 20 ? 'text-danger':'' }}">
                                    <td>
                                        @if($visitor->ipAddress->country_code)
                                            <img src="{{ asset('admin/flags/'.$visitor->ipAddress->country_code.'.png') }}"
                                                 alt="{{ $visitor->ipAddress->country_name }}"
                                                 class="border mr-1">
                                        @else
                                            <img src="{{ asset('admin/flags/flag.png') }}"
                                                 alt="{{ $visitor->ipAddress->ip_address }}" class="border mr-1">
                                        @endif
                                        {{ $visitor->ipAddress->ip_address }}
                                    </td>
                                    <td>{!! date('d.m H:i', strtotime($visitor->updated_at)) !!}</td>
                                    <td>{{ $visitor->userAgent->ua() }}</td>
                                    <td>{{ $visitor->hits }} / <span
                                                class="{!! $visitor->suspect_hits > 0 ? 'text-danger':'' !!}">{{ $visitor->suspect_hits }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center bg-light text-secondary">
                                        <i class="fas fa-exclamation-circle"></i> @lang('transAdmin.visitor') @lang('transAdmin.not-found')
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow my-3">
                <div class="card-header py-3">
                    <div class="h6 mb-0">
                        @lang('transAdmin.countries')
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                            <tr class="font-weight-bold">
                                <td>@lang('transAdmin.country')</td>
                                <td>@lang('transAdmin.hits')</td>
                            </tr>
                            @forelse($countries as $country)
                                <tr>
                                    <td>
                                        @if($country->country_code)
                                            <img src="{{ asset('admin/flags/'.$country->country_code.'.png') }}"
                                                 alt="{{ $country->country_code }}" class="border mr-1">
                                        @else
                                            <img src="{{ asset('admin/flags/flag.png') }}"
                                                 alt="{{ $country->count }}"
                                                 class="border mr-1">
                                        @endif
                                        {{ $country->country_name }}
                                    </td>
                                    <td>{{ $country->count }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center bg-light text-secondary">
                                        <i class="fas fa-exclamation-circle"></i> @lang('transAdmin.visitor') @lang('transAdmin.not-found')
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow my-3">
                <div class="card-header py-3">
                    <div class="h6 mb-0">
                        @lang('transAdmin.recent-suspicious-visitors')
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                            <tr class="font-weight-bold">
                                <td>@lang('transAdmin.ip-address')</td>
                                <td>@lang('transAdmin.datetime')</td>
                                <td>@lang('transAdmin.platform')</td>
                                <td>@lang('transAdmin.hits')</td>
                            </tr>
                            @forelse($suspectVisitors as $suspectVisitor)
                                <tr>
                                    <td>
                                        @if($suspectVisitor->ipAddress->country_code)
                                            <img src="{{ asset('admin/flags/'.$suspectVisitor->ipAddress->country_code.'.png') }}"
                                                 alt="{{ $suspectVisitor->ipAddress->country_name }}"
                                                 class="border mr-1">
                                        @else
                                            <img src="{{ asset('admin/flags/flag.png') }}"
                                                 alt="{{ $suspectVisitor->ipAddress->ip_address }}"
                                                 class="border mr-1">
                                        @endif
                                        {{ $suspectVisitor->ipAddress->ip_address }}
                                    </td>
                                    <td>{!! date('d.m H:i', strtotime($suspectVisitor->updated_at)) !!}</td>
                                    <td>{{ $suspectVisitor->userAgent->ua() }}</td>
                                    <td>{{ $suspectVisitor->hits }} / <span
                                                class="{!! $suspectVisitor->suspect_hits > 0 ? 'text-danger':'' !!}">{{ $suspectVisitor->suspect_hits }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center bg-light text-secondary">
                                        <i class="fas fa-exclamation-circle"></i> @lang('transAdmin.visitor') @lang('transAdmin.not-found')
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow my-3">
                <div class="card-header py-3">
                    <div class="h6 mb-0">
                        @lang('transAdmin.suspicious-countries')
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                            <tr class="font-weight-bold">
                                <td>@lang('transAdmin.country')</td>
                                <td>@lang('transAdmin.hits')</td>
                            </tr>
                            @forelse($suspectCountries as $suspectCountry)
                                <tr>
                                    <td>
                                        @if($suspectCountry->country_code)
                                            <img src="{{ asset('admin/flags/'.$suspectCountry->country_code.'.png') }}"
                                                 alt="{{ $suspectCountry->country_code }}" class="border mr-1">
                                        @else
                                            <img src="{{ asset('admin/flags/flag.png') }}"
                                                 alt="{{ $suspectCountry->count }}"
                                                 class="border mr-1">
                                        @endif
                                        {{ $suspectCountry->country_name }}
                                    </td>
                                    <td>{{ $suspectCountry->count }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center bg-light text-secondary">
                                        <i class="fas fa-exclamation-circle"></i> @lang('transAdmin.visitor') @lang('transAdmin.not-found')
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection