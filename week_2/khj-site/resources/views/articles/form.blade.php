<div class="t-justify-center">
    <div class="t-p-5 t-mx-auto t-mt-10 t-bg-white t-shadow-sm">
        <div class="t-mt-3">
            <div class="t-mb-6">
                <label for="title" class="t-mb-2 t-text-xl">제목</label>
                <input
                    type="text" name="title" placeholder="제목을 입력해주세요." required
                    value="{{ old('title', $article->title) }}"
                    class="t-w-full t-px-3 t-py-2 t-border t-border-gray-300 t-rounded-md focus:t-outline-none focus:t-ring focus:t-ring-[#F9F3F3] focus:t-border-[#F7D9D9]"
                />
            </div>
            <div class="t-mb-6">
                <label for="body" class="t-mb-2 t-text-xl">내용</label>
                <textarea rows="10" name="body" placeholder="내용을 입력해주세요." required
                    class="t-w-full t-px-3 t-py-2 t-border t-border-gray-300 t-rounded-md focus:t-outline-none focus:t-ring focus:t-ring-[#F9F3F3] focus:t-border-[#F7D9D9]"
                >{{ old('body', $article->body) }}</textarea>
            </div>
            <div class="t-flex t-mb-6 t-items-center">
                <input type="hidden" name="status" value="0"/>
                <input type="checkbox" name="status" value="1" {{ old('status', isset($article->status) ? 'checked' : '') }}
                    class="t-w-6 t-h-6 t-border t-border-gray-300 t-rounded-sm t-outline-none t-cursor-pointer"
                />
                <label class="t-ml-3 t-text-sm" for="status">전체 공개</label>
            </div>
        </div>
        <div class="t-bg-white t-rounded-b t-rounded-t-none">
            <div class="t-flex t-items-center t-justify-between">
                <div>
                    <button class="t-mx-auto t-mx-0 hover:t-no-underline t-font-bold t-rounded-full t-my-4 t-py-4 t-px-8 t-shadow-lg focus:t-outline-none focus:t-shadow-outline t-transform t-transition hover:t-scale-105 t-bg-[#DDDDDD]">
                        <a class="t-no-underline hover:t-text-black" href="{{ route('articles.index') }}">목록으로</a>
                    </button>
                </div>
                <div class="t-flex">
                    <button type="submit" class="t-mx-auto t-mx-0 hover:t-no-underline t-font-bold t-rounded-full t-my-4 t-py-4 t-px-8 t-shadow-lg focus:t-outline-none focus:t-shadow-outline t-transform t-transition hover:t-scale-105 t-bg-[#F7D9D9]">
                        <a class="t-no-underline hover:t-text-black">완료</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
