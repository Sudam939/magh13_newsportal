<x-frontend-layout>

    <section>
        <div class="container py-10">
            <div class="grid grid-cols-12 gap-8">

                <div class="col-span-8">
                    <div>
                        <img class="h-[70vh] w-full object-cover"
                            src="https://jawaaf.com/storage/01JKQYFNXSDJ0VT5DRMZW8N1JG.avif"
                            alt="{{ $latest_article->title }}">
                        <h1 class="text-2xl font-bold py-2">
                            {{ $latest_article->title }}
                        </h1>
                        <div class="limited-text">
                            {!! $latest_article->description !!}
                        </div>
                    </div>
                </div>



                <div class="col-span-4">
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

</x-frontend-layout>
