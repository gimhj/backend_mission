@extends('layouts.app')

@section('title', '게시판')

@section('content')
<section class="t-border-b t-py-8">
    <div class="t-container t-mx-auto t-flex t-flex-wrap t-pt-4 t-pb-12">
        <h1 class="t-w-full t-my-2 t-text-4xl t-font-bold t-leading-tight t-text-center t-text-gray-800">
            게시판
        </h1>
        <div class="t-w-full t-mb-4">
            <div class="t-h-1 t-mx-auto t-w-64 t-my-0 t-py-0 t-rounded-t t-bg-[#F7D9D9]"></div>
        </div>
        @auth
            <div class="t-w-full t-px-6 t-text-right t-text-gray-800">
                <button class="t-mx-auto t-mx-0 hover:t-no-underline t-font-bold t-rounded-full t-my-4 t-py-4 t-px-8 t-shadow-lg focus:t-outline-none focus:t-shadow-outline t-transform t-transition hover:t-scale-105 t-bg-[#F7D9D9]">
                    <a class="t-no-underline hover:t-text-black" href="{{ route('articles.create') }}">작성하기</a>
                </button>
            </div>
        @endauth
        @foreach($articles as $article)
            <div class="t-w-full lg:t-w-1/3 t-p-6 t-flex t-flex-col t-flex-grow t-flex-shrink">
                <div class="t-flex-1 t-bg-white t-rounded-t t-rounded-b-none t-overflow-hidden t-shadow">
                    <a href="{{ route('articles.show', $article) }}" class="t-flex t-flex-wrap t-no-underline hover:t-no-underline t-mt-7">
                        <p class="t-w-full t-text-gray-600 t-text-xs t-px-6 t-mb-1">
                            No. {{ $article->id }}
                        </p>
                        <div class="t-w-full t-font-bold t-text-xl t-text-gray-800 t-px-6">
                            {{ Str::limit($article->title, 30, $end=' ...') }}
                        </div>
                        <p class="t-text-gray-800 t-text-base t-px-6 t-mb-5 t-pt-3">
                            {{ Str::limit($article->body, 300, $end=' ...') }}
                        </p>
                    </a>
                </div>
                <div class="t-flex-none t-mt-auto t-bg-white t-rounded-b t-rounded-t-none t-shadow t-p-3 t-text-black">
                    <div class="t-items-center t-text-right">
                        @if($article->isLikedBy(Auth::user()))
                            <form method="POST" action="{{ route('likes.unlike', $article->getLikedItem(Auth::user())) }}" class="t-pl-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="t-pr-2 t-cursor-pointer focus:t-outline-none focus:t-shadow-outline t-transform t-transition hover:t-scale-150 t-duration-300 t-ease-in-out">
                                    <i class="fas fa-heart fa-lg t-text-[#F25287]"></i> {{ $article->likes->count() }}
                                </button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('likes.like', $article->id) }}" class="t-pl-2">
                                @csrf
                                <input type="hidden" name="likeable_type" value="{{ get_class($article) }}">
                                <input type="hidden" name="likeable_id" value="{{ $article->id }}">
                                <button type="submit" class="t-pr-2 t-cursor-pointer focus:t-outline-none focus:t-shadow-outline t-transform t-transition hover:t-scale-150 t-duration-300 t-ease-in-out">
                                    <i class="far fa-heart fa-lg"></i> {{ $article->likes->count() }}
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</section>
@endsection
