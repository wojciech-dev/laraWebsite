@if($slides)
  @foreach ($slides as $slide)
  <div
  class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
  style="background-image: url({{ asset('images/slider') }}/{{ $slide->image }})">
  <h1
    class="font-mono text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-center sm:leading-none lg:text-5xl mb-5">
    <span class="inline md:block">{{ $slide->title }}</span>
  </h1>
  <div class="mx-auto mb-5 text-green-50 md:text-center lg:text-lg">
    {{ $slide->content }}
  </div>

  <div class="flex justify-center">
    <div class="mb-3 xl:w-96">
      <form id="sform" action="{{ route('searchServices') }}" method="post">
        @csrf
      <div class="input-group relative flex items-stretch w-full mt-4">
        <input 
          type="search"
          name="q"
          id="q"
          class="typeahead form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
          placeholder="Search" 
          aria-label="Search" 
          aria-describedby="button-addon2"
          autocomplete="off"
        >
        <div 
          class="w-full absolute left-0 top-10 shadow-lg focus:outline-none text-white text-left cursor-pionter" 
          role="menu"
          aria-orientation="vertical" 
          aria-labelledby="menu-button" 
          tabindex="-1"
          id="list"
        >

        </div>
        <button 
          class="btn inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center"
          type="submit" 
          name="submit"
          id="button-addon2"
        >
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
          </svg>
        </button>
        
      </div>
    </form>
  </div>
  </div>
  </div>
  @endforeach
@endif


<section class="px-2 py-32 bg-white md:px-0">
  <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
    @foreach ($bodies as $body)
    <div class="flex flex-wrap items-center sm:-mx-3">
      <div class="w-full md:w-1/2 md:px-3">
        <div class="w-full pb-6 space-y-4 sm:max-w-md lg:max-w-lg lg:space-y-4 lg:pr-0 md:pb-0">
          <h3 class="text-xl">{{ $body->name }}</h3>
          <h2 class="text-4xl text-green-600">{{ $body->title }}</h2>
          <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">{{ $body->content }}</p>
          @if($body->more == 1)
          <div class="relative flex">
            <a href="#_" class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-green-600 rounded-md sm:mb-0 hover:bg-green-700 sm:w-auto">
              Read More
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
              </svg>
            </a>
          </div>
          @endif
        </div>
      </div>
      <div class="w-full md:w-1/2">
        <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl">
          <img width="615px" src="{{ asset('images/body') }}/{{ $body->image }}" alt="single image" class="block">
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>


@if($services)
  <div class="mt-4 text-center">
    <h3 class="text-2xl font-bold">Our Menu</h3>
    <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
      TODAY'S SPECIALITY</h2>
  </div>
  
  <section class="mt-8 bg-white">

    <div class="container w-full px-5 py-6 mx-auto">
      <div class="grid lg:grid-cols-4 gap-y-6">
        @foreach ($services as $service)
        <div class="product max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
          <img class="w-full h-48" src="{{ asset('images/services/thumbnails') }}/{{ $service->thumbnail }}" alt="Image">
          <div class="px-6 py-4">
            <div class="flex mb-2">
              <span class="px-4 py-0.5 text-sm bg-red-500 rounded-full text-red-50">{{ $service->category->name }}</span>
            </div>
            <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase h-200">{{ $service->name }}</h4>
      
            <p class="leading-normal text-gray-700">
              {!! strip_tags( \Illuminate\Support\Str::words($service->content, 12,'...')) !!}
            </p>
          </div>
          <div class="flex items-center justify-between p-4">
            <a href="{{ route('home.services_details', $service->slug) }}" class="px-4 py-2 bg-green-600 text-green-50">more</a>
            <span class="text-xl text-green-600">${{ $service->price }}</span>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endif

    <!-- End Main Hero Content -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
      const path = "{{ route('autocomplete') }}";
    
      const getNames = function() {
          let arr = [];
          $.ajax({
              url: path,
              dataType: 'json',
              success: function(data) {
                  for(let i in data){
                      arr.push(data[i].name);
                  }
                  return arr.flat();
              }
              });
              return arr;
      }
      $("input.typeahead").autocomplete({
          source: getNames(),
          appendTo:'#list'
      });
     
  </script>