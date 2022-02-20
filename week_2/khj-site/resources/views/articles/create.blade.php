@extends('layouts.app')

@section('title', '게시글 작성')

@section('content')
<section class="t-border-b t-py-8">
    <div class="t-container t-mx-auto t-flex t-flex-wrap t-pt-4 t-pb-12">
        <h1 class="t-w-full t-my-2 t-text-4xl t-font-bold t-leading-tight t-text-center t-text-gray-800">
            게시글 작성
        </h1>
        <div class="t-w-full t-mb-4">
            <div class="t-h-1 t-mx-auto t-w-64 t-my-0 t-py-0 t-rounded-t t-bg-[#F7D9D9]"></div>
        </div>

        <div class="t-w-full t-p-6 t-flex t-flex-col t-flex-grow t-flex-shrink">
            <form method="POST" action="{{ route('articles.store', $article) }}" autocomplete="off">
                @csrf
                @include('articles.form')
            </form>
        </div>
    </div>
</section>
@endsection
