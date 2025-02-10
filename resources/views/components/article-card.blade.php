@props(['article'])

<a href="">
    <div
        class="grid grid-cols-12 gap-3 items-center mt-5 shadow-md rounded-md overflow-hidden hover:shadow-xl duration-200">
        <div class="col-span-4">
            <img class="h-[90px] w-full object-cover" src="{{ asset($article->image) }}"
                alt="{{ $article->title }}">
        </div>
        <div class="col-span-8">
            <h1 class="limited-text">{{ $article->title }}</h1>
            <small>{{ nepalidate($article->created_at) }}</small>
        </div>
    </div>
</a>
