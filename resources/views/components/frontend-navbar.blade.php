<section>
    <div class="container flex justify-between items-center py-2">
        <div>
            <img class="h-[40px] md:h-[60px] lg:h-[80px]" src="{{ asset($company->logo) }}" alt="logo">
        </div>

        <div>
            {{ nepalidate(now()) }}
            <img class="h-[12px] md:h-[16px]" src="https://jawaaf.com/frontend/images/redline.png" alt="Line">
        </div>
    </div>
</section>

{{-- xs,sm,md,lg,xl,2xl --}}
{{-- <h1 class="text-3xl sm:text-5xl md:text-7xl lg:text-9xl">Hello</h1> --}}
<nav class="bg-primary text-white py-2">
    <div class="container">
        <div class="hidden md:flex items-center justify-between">
            <ul class="flex gap-8 text-lg">
                <li class="active">
                    <a href="{{ route('home') }}">गृहपृष्ठ</a>
                </li>

                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('category', $category->slug) }}">{{ $category->nep_title }}</a>
                    </li>
                @endforeach
            </ul>

            <div>
                <form>
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search by title" required />
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- drawer init and toggle -->
        <div class="md:hidden">
            <button type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example"
                aria-controls="drawer-example">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </div>
</nav>


<!-- drawer component -->
<div id="drawer-example"
    class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-primary text-white w-80 dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-label">
    <h5 class="text-xl">Menu</h5>
    <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>

    <ul class="space-y-8 mt-8 text-lg">
        <li>
            <form>
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search by title" required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-primary focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
        </li>

        <li class="active">
            <a href="{{ route('home') }}">गृहपृष्ठ</a>
        </li>

        @foreach ($categories as $category)
            <li>
                <a href="">{{ $category->nep_title }}</a>
            </li>
        @endforeach
    </ul>
</div>
