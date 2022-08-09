<section class="menu-wrapper my-5 lg:my-16">
    <div class="container mx-auto">

        <div class="flex flex-wrap relative">
            <!-- <div class=""> -->
            <div id="filterMenuSide" class="filtermenu-side fixed lg:static top-0 bg-white w-64 lg:w-1/5 h-screen z-10 p-3 overflow-y-scroll">
                <div class="inner">
                    <!-- filter menu -->
                    <div class="filter-menu">

                        <h4 class="font-bold pb-3 text-shadow-light text-xl text-gray-700 tracking-wide leading-tight">
                            Menu
                        </h4>
                        <nav class="flex flex-col space-y-1">

                            @foreach ($categories as $category)
                            <a
                              data-category="{{ $category}}"
                              class="block px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg cursor-pointer select-category"
                            >
                            {{ $category}}
                            </a>
                            @endforeach

                          </nav>
    
                    </div>
                    <!-- filter menu end-->
                </div>
            </div>
            <div class="w-full lg:w-4/5">
                <div class="inner p-3 pl-5">

                
                    <!-- sort title -->
                    <div class="sort-title pl-3">
                        <h3 class="font-bold flex h-12 items-center text-shadow-light text-sm lg:text-base text-gray-800 tracking-wide leading-tight">
                            <span class="w-32 lg:w-auto lg:w-auto uppercase hidden lg:inline-block lg:mr-5">Sort by: </span>
                            <div class="w-48 md:mb-0">
                                <div class="relative">

                                    <select wire:model="sortAsc" class="uppercase font-semibold text-gray-700 tracking-wide block appearance-none w-full bg-transparent text-gray-700 rounded leading-tight focus:outline-none">
                                        <option value="asc">price - low</option>
                                        <option value="desc">price - high</option>
                                  </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="block lg:hidden w-auto ml-auto px-3 cursor-pointer" id="openFilterSideMenu">
                                <i class="lni-list text-2xl font-bold"></i>
                            </div>
                        </h3>
                    </div>
                    <!-- sort title end -->

                    <div class="menu-items-wrapper">
                        <div class="flex flex-wrap">
                            @foreach ($services as $service)
                            <div data-category="{{ $service->category->name }}" class="product w-full sm:w-1/2 xl:w-1/3">
                                <div class="inner p-3">
                                    <div class="border mene-item rounded overflow-hidden">
                                        <div class="mi-image">
                                            <a href="single.html"><img src="{{ asset('images/services/thumbnails') }}/{{ $service->thumbnail }}" alt="menu item image" class="object-cover object-center h-20rem block w-full"></a>
                                        </div>
                                        <!-- mi-image end -->
                                        <div class="mi-info p-3">
                                            <div class="mi-title mb-2 flex items-start h-min">
                                                <div class="w-full">
                                                    <a href="single.html" class="text-xl tracking-wide text-shadow-light text-gray-800 font-semibold">{{ $service->name }}</a>
                                                </div>
                                                <div class="w-auto ml-auto">
                                                    <span class="font-semibold text-xl text-gray-800 text-shadow-light uppercase">${{ $service->price }}</span>
                                                </div>
                                            </div>

                                            <div class="mi-detail text-sm text-gray-700">
                                                <p>{{ $service->content }}</p>
                                            </div>

                                            <div class="flex mt-3 text-center">
                                                <div class="w-full">
                                                    <a href="{{ route('home.services_details', $service->slug) }}" class="hover:bg-black hover:text-white transition block p-1 py-2 rounded-l-lg border-r-0 rounded-lt border text-sm uppercase text-semibold tracking-wide text-shadow-light">View Detail</a>
                                                </div>
                                                <div class="w-full">
                                                    <a href="" class="hover:bg-black hover:text-white transition block p-1 py-2 rounded-r-lg border text-sm uppercase text-semibold tracking-wide text-shadow-light">Order Now</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- menu item wrapper -->
                    {{ $services->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</section>