<x-frontend-layout>

    <section>
        <div class="container py-10">
            <div class="grid md:grid-cols-12 gap-8">

                <div class="md:col-span-8">
                    <div>
                        <img class="w-full object-cover" src="https://jawaaf.com/storage/01JKQYFNXSDJ0VT5DRMZW8N1JG.avif"
                            alt="{{ $latest_article->title }}">
                        <h1 class="text-2xl font-bold py-2">
                            {{ $latest_article->title }}
                        </h1>
                        <div class="limited-text w-full discription">
                            {!! $latest_article->description !!}
                        </div>
                    </div>
                </div>



                <div class="md:col-span-4">
                    <div>
                        <h1 class="text-3xl bg-light-primary py-2 px-4 border-l-[5px] border-[var(--primary)] primary">
                            ट्रेन्डिङ
                        </h1>

                        @foreach ($trending_articles as $article)
                            <x-article-card :article="$article" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="container py-10 space-y-10">
            @foreach ($categories as $category)
                @if (count($category->articles) > 0)
                    <div>
                        <div>
                            <h1 class="text-2xl">{{ $category->nep_title }}</h1>
                            <img class="h-[12px]" src="https://jawaaf.com/frontend/images/redline.png" alt="">
                        </div>


                        <div class="grid grid-cols-3 gap-5">
                            @foreach ($category->articles as $article)
                                <x-article-card :article="$article" />
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>

</x-frontend-layout>
