@extends('layouts.app', ['page' => 'books'])

@section('title',  trans('crud.books.create_title') )
@section('styles')
<link rel="stylesheet" href="..\stars.css">

@endsection
@section('content')

<div class="container-xl">
    <div class="page-header d-print-none">
        <h2 class="page-title">@lang('crud.books.show_title')</h2>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            @lang('crud.books.create_title')
                        </h4>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="{{ route('books.index') }}" class="mr-4"
                            ><i class="ti ti-arrow-back"></i
                                ></a>
                                @lang('crud.books.show_title')
                            </h4>
                            <div class="mt-3">
                                <div class="mb-3">
                                    <h5>@lang('crud.books.inputs.title')</h5>
                                    <span>{{ $book->title ?? '-' }}</span>
                                </div>
                                <div class="mb-3">
                                    <h5>@lang('crud.books.inputs.author')</h5>
                                    <span>{{ $book->author ?? '-' }}</span>
                                </div>
                                <div class="mb-3">
                                    <h5>@lang('crud.books.inputs.published_at')</h5>
                                    <span>{{ $book->published_at ?? '-' }}</span>
                                </div>
                                <div class="mb-3">
                                    <h5>@lang('crud.books.inputs.publisher')</h5>
                                    <span>{{ $book->publisher ?? '-' }}</span>
                                </div>
                                <div class="mb-3">
                                    <h5>@lang('crud.books.inputs.downloads')</h5>
                                    <span>{{ $book->downloads ?? '-' }}</span>
                                </div>
                                <div class="mb-3">
                                    <h5>
                                        @lang('crud.books.inputs.department_id')
                                    </h5>
                                    <span
                                    >{{ optional($book->department)->name ?? '-'}}</span
                                    >
                                </div>
                                <div class="mb-3">
                                    <h5>@lang('crud.books.inputs.section_id')</h5>
                                    <span
                                    >{{ optional($book->section)->name ?? '-'}}</span
                                    >
                                </div>
                                <div class="mb-3">
                                    <h5>@lang('crud.books.inputs.file')</h5>
                                    <span> <div class="mt-2">
                                        <a href="{{ route('book.download', ['book' => $book]) }}" target="_blank"
                                            ><i class="icon ion-md-download"></i>&nbsp;تحميل</a
                                            >
                                        </div></span
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <div class="mt-3">
                                    <a href="{{ route('books.index') }}" class="btn btn-light" >
                                        <i class="icon ion-md-return-left"></i>
                                        @lang('crud.common.back')
                                    </a>
                                    
                                    @can('create', App\Models\Book::class)
                                    <a href="{{ route('books.create') }}" class="btn btn-light" >
                                        <i class="icon ion-md-add"></i>
                                        @lang('crud.common.create')
                                    </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            @auth
                                
                            <form action="{{ route('comments.store',['book'=>$book->id]) }}" method="post" class="col-12">
                                @csrf
                                <p class="font-weight-bold ">Review</p>
                                <div class="form-group row">
                                    <div class="col">
                                        <div class="rate">
                                            <input type="radio" {{round($book->comments->avg('star_rating')) == 5 ? 'checked': ''}} id="star5" class="rate" name="rating" value="5"/>
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" {{round($book->comments->avg('star_rating')) == 4 ? 'checked': ''}} id="star4" class="rate" name="rating" value="4"/>
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" {{round($book->comments->avg('star_rating')) == 3 ? 'checked': ''}} id="star3" class="rate" name="rating" value="3"/>
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" {{round($book->comments->avg('star_rating')) == 2 ? 'checked': ''}} id="star2" class="rate" name="rating" value="2">
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" {{round($book->comments->avg('star_rating')) == 1 ? 'checked': ''}} id="star1" class="rate" name="rating" value="1"/>
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <textarea type="text" name="comment"  lines="3" aria-multiline="true" class="form-control" placeholder="اكتب تعليق" ></textarea>
                                    <span class="input-group-btn">
                                        <button type="submit"  class="btn btn-primary btn-flat" style="height: -webkit-fill-available;">إرسال</button>
                                    </span>
                                </div>
                            </form>
                            @endauth
                        </div>
                        <div class="card-body">
                            @forelse ($book->comments as $comment)
                            <div class="card mt-3">
                                <div class="row g-0">
                                    <div class="col-auto">
                                        <div class="card-body">
                                            <div class="avatar avatar-md" style="background-image: url(./static/jobs/job-1.jpg)"></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card-body ps-0">
                                            <div class="row">
                                                <div class="col">
                                                    <h3 class="mb-0">{{$comment->user->name}}</h3>
                                                </div>
                                                <div class="col-auto fs-3 text-green">
                                                    <div class="rated">
                                                        @for($i=1; $i<=$comment->star_rating; $i++)
                                                        <input type="radio" id="star{{$i}}" class="rate" name="rating" value="5"/>
                                                        <label class="star-rating-complete" title="text">{{$i}} stars</label>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                        
                                                    <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                                        <div class="list-inline-item">
                                                            <p>{{$comment->text}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endsection
    @section('scripts')
    <script src="..\stars.js" ></script>
    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function () {
            const rating = new StarRating('#rating-default', {
                tooltip: false,
                clearable: false,
                stars: function (el, item, index) {
                    el.innerHTML = `<!-- Download SVG icon from http://tabler-icons.io/i/star-filled --><svg xmlns="http://www.w3.org/2000/svg" class="icon gl-star-full icon-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" stroke-width="0" fill="currentColor" /></svg>`;
                },
            })
        })
        // @formatter:on
        </script>
    @endsection
