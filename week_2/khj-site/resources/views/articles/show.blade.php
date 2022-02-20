@extends('layouts.app')

@section('title', '게시글 상세보기')

@section('content')
<section class="t-border-b t-pt-0 t-pb-8">
    <div class="t-container t-mx-auto t-flex t-flex-wrap t-pb-12">
        <div class="t-w-full md:t-w-1/3 t-p-6 t-pt-0 t-flex t-flex-col t-flex-grow t-flex-shrink">
            <div class="t-flex-1 t-bg-white t-rounded-t t-rounded-b-none t-overflow-hidden t-shadow">
                <div class="t-flex t-flex-wrap t-mt-7">
                    <p class="t-w-full t-text-gray-600 t-text-xs t-px-6 t-mb-1">
                        No. {{ $article->id }}
                    </p>
                    <div class="t-w-full t-font-bold t-text-xl t-text-gray-800 t-px-6">
                        {{ $article->title, 30 }}
                    </div>
                    <div class="t-w-full d-flex t-px-6 t-mt-1 t-justify-between">
                        <p class="t-text-gray-600 t-text-md">{{ $article->user->name }}</p>
                        <p class="t-text-gray-600 t-text-xs t-self-end"> {{ $article->created_at->timezone('Asia/Seoul')->format('Y-m-d H:i') }}</p>
                    </div>
                    <div class="t-w-full t-mt-0 t-mb-5">
                        <div class="t-h-0.5 t-mx-auto t-mt-0 t-mb-2 t-py-0 t-bg-[#F7D9D9]"></div>
                    </div>
                    <p class="t-text-gray-800 t-text-base t-px-6 t-mb-5 t-pt-3">
                        {{ $article->body }}
                    </p>
                </div>
            </div>
            <div class="t-flex-none t-mt-auto t-bg-white t-rounded-b t-rounded-t-none t-shadow t-p-3">
                <div class="t-flex t-items-center t-justify-between">
                    <div>
                        <button class="t-mx-auto t-mx-0 hover:t-no-underline t-font-bold t-rounded-full t-my-4 t-py-4 t-px-8 t-shadow-lg focus:t-outline-none focus:t-shadow-outline t-transform t-transition hover:t-scale-105 t-bg-[#DDDDDD]">
                            <a class="t-no-underline hover:t-text-black" href="{{ route('articles.index') }}">목록으로</a>
                        </button>
                    </div>
                    @auth
                        <div class="t-flex">
                            <button class="t-mx-auto t-mx-0 hover:t-no-underline t-font-bold t-rounded-full t-my-4 t-py-4 t-px-8 t-shadow-lg focus:t-outline-none focus:t-shadow-outline t-transform t-transition hover:t-scale-105 t-bg-[#F7D9D9]">
                                <a class="t-no-underline hover:t-text-black" href="{{ route('articles.edit', $article) }}">수정</a>
                            </button>
                            <form method="POST" action="{{ route('articles.destroy', $article->id) }}" class="t-pl-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="t-mx-auto t-mx-0 hover:t-no-underline t-font-bold t-rounded-full t-my-4 t-py-4 t-px-8 t-shadow-lg focus:t-outline-none focus:t-shadow-outline t-transform t-transition hover:t-scale-105 t-bg-[#F7D9D9]">
                                    <a class="t-no-underline hover:t-text-black" href="{{ route('articles.destroy', $article) }}">삭제</a>
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
