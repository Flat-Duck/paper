@extends('layouts.app', ['page' => 'papers'])

@section('title',  trans('crud.papers.create_title') )
@section('content')

<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.papers.show_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.papers.create_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('papers.index') }}" class="mr-4"
                                ><i class="ti ti-arrow-back"></i
                            ></a>
                            @lang('crud.papers.show_title')
                        </h4>
                        <div class="mt-3">
                            <div class="mb-3">
                                <h5>@lang('crud.papers.inputs.title')</h5>
                                <span>{{ $paper->title ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.papers.inputs.author')</h5>
                                <span>{{ $paper->author ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>
                                    @lang('crud.papers.inputs.published_at')
                                </h5>
                                <span>{{ $paper->published_at ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.papers.inputs.downloads')</h5>
                                <span>{{ $paper->downloads ?? '-' }}</span>
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.papers.inputs.section_id')</h5>
                                <span
                                    >{{ optional($paper->section)->name ?? '-'
                                    }}</span
                                >
                            </div>
                            <div class="mb-3">
                                <h5>
                                    @lang('crud.papers.inputs.department_id')
                                </h5>
                                <span
                                    >{{ optional($paper->department)->name ??
                                    '-' }}</span
                                >
                            </div>
                            <div class="mb-3">
                                <h5>@lang('crud.papers.inputs.file')</h5>
                                <span> <div class="mt-2">
                                        <a href="{{ route('paper.download', ['paper' => $paper]) }}" target="_blank"
                                            ><i class="icon ion-md-download"></i>&nbsp;تحميل</a
                                        >
                                    </div></span
                                >
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <div class="mt-3">
                                <a
                                    href="{{ route('papers.index') }}"
                                    class="btn btn-light"
                                >
                                    <i class="icon ion-md-return-left"></i>
                                    @lang('crud.common.back')
                                </a>

                                @can('create', App\Models\Paper::class)
                                <a
                                    href="{{ route('papers.create') }}"
                                    class="btn btn-light"
                                >
                                    <i class="icon ion-md-add"></i>
                                    @lang('crud.common.create')
                                </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
        </div>
    </div>
</div>
