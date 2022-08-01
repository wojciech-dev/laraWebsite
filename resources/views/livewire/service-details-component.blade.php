<section class="menu-wrapper mt-5 lg:my-16">
    <div class="container mx-auto">

        <div class="flex flex-wrap relative">
            <!-- <div class=""> -->
            <div class="w-full lg:w-1/2 flex items-center">
                <div class="w-full inner p-3">

                    <h1 class="font-bold text-shadow-light text-4xl text-gray-800 tracking-wide leading-tight">{{ $service->name }}</h1>
                    <a href="#" class="text-gray-700 resturent-name font-semibold inline-block border-b border-transparent hover:border-gray-500 text-sm mt-2">{{ $service->street }}</a>

                    <!-- reviews-block -->
                    <div class="reviews-block mt-2">
                        <div class="rating tracking-widest text-xl">
                            Difficulty level:
                            @if($service->difficulty_level =='easy')
                            &#11088;
                            @elseif ($service->difficulty_level == 'medium')
                            &#11088;&#11088;
                            @elseif ($service->difficulty_level == 'hard')
                            &#11088;&#11088;&#11088;
                            @else
                                no rating
                            @endif
                        </div>
                    </div>
                    <!-- reviews-block end -->


                    <div class="info mt-10 mr-10">
                        <div class="flex">
                            <div class="w-1/3">
                                <div class="inner py-3 text-center">
                                    <div class="text-shadow-light uppercase text-3xl font-semibold text-gray-800"><span>$</span><span>{{ $service->price }}</span></div>
                                    <div class="label text-sm text-shadow-light text-gray-700 tracking-wider">Price</div>
                                </div>
                            </div>
                            <div class="w-1/3 border-l border-r">
                                <div class="inner py-3 text-center">
                                    <div class="text-shadow-light uppercase text-3xl font-semibold text-gray-800"><span>{{ $service->calories }}</span></div>
                                    <div class="label text-sm text-shadow-light text-gray-700 tracking-wider">Calories</div>
                                </div>
                            </div>
                            <div class="w-1/3">
                                <div class="inner py-3 text-center">
                                    <div class="text-shadow-light uppercase text-3xl font-semibold text-gray-800"><span style="margin-right:-6px">{{ $service->estimated_elivery }}</span> <span class="text-xs text-gray-600 capitalize">M</span></div>
                                    <div class="label text-sm text-shadow-light text-gray-700 tracking-wider">Estimated Delivery</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- info end -->

                    <div class="order-block mt-10">
                        <div class="flex">
                            <div class="w-auto ">
                                <a href="#" disabled="disabled" class="px-4 rounded bg-black text-white hover:text-black hover:bg-white transition inline-block p-1 py-2 border border-black text-lg uppercase text-semibold tracking-wide text-shadow-light">Order Now</a>
                            </div>
                            <div class="w-auto ml-auto lg:ml-0 flex items-center justify-center">
                                <span class="ml-5 text-4xl hover:text-red-500 text-gray-700 lni-heart cursor-pointer"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="w-full lg:w-1/2 lg:mt-0 mt-5">
                <div class="inner p-3">
                    <div class="single-image rounded overflow-hidden transition hover:shadow-2xl cursor-pointer">
                        <img width="615px" src="{{ asset('images/services') }}/{{ $service->image }}" alt="single image" class="block">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- hr line -->
    <div class="container mx-auto lg:p-0 p-3">
        <hr class="bg-1 bg-gray-300 w-full my-2 mt-5 lg:my-16">
    </div>
    <!-- hr line -->

    <div class="container mx-auto lg:p-0 p-3">
        <!-- single info start -->
        <div class="single-info">
            <div class="inner content text-base leading-normal text-gray-800">
                {{ $service->description }}
            </div>
        </div>
        <!-- single info end -->

        <!-- single menu category start -->
        <div class="category-block mt-16">
            <span class="font-semibold uppercase text-base tracking-wider">Menu:</span>
            <span class=" ml-2 font-semibold text-gray-700 text-sm capitalize tracking-wider">
            <a href="" class="border-b inline-block border-transparent hover:border-gray-500">snacks</a>,
            <a href="" class="border-b inline-block border-transparent hover:border-gray-500">chocolate</a>,
            <a href="" class="border-b inline-block border-transparent hover:border-gray-500">cookies</a>
        </span>
        </div>
        <!-- single menu category end -->
    </div>

</section>