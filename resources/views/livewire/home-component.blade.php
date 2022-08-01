@if($slides)
  @foreach ($slides as $slide)
  <div
  class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
  style="background-image: url({{ asset('images/slider') }}/{{ $slide->image }})">
  <h1
    class="font-mono text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-center sm:leading-none lg:text-5xl">
    <span class="inline md:block">{{ $slide->title }}</span>
  </h1>
  <div class="mx-auto mt-2 text-green-50 md:text-center lg:text-lg">
    {{ $slide->content }}
  </div>
  <div class="flex flex-col items-center mt-12 text-center">
    <span class="relative inline-flex w-full md:w-auto">
      <form id="sform" action="searchservices" method="post">
        <input type="text" name="q" id="q" class="typeahead" placeholder="Search" autocomplete="off">
        <div id="list"></div>
        <input type="submit" name="submit" value="Search">
    </form>
  </div>
  <div class="flex justify-center">
    <div class="mb-3 xl:w-96">
      <div class="input-group relative flex items-stretch w-full mb-4">
        <input 
          type="search" 
          class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
          placeholder="Search" 
          aria-label="Search" 
          aria-describedby="button-addon2"
        >
        <div 
          class="hidden w-full absolute left-0 top-12 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" 
          role="menu"
          aria-orientation="vertical" 
          aria-labelledby="menu-button" 
          tabindex="-1"
          id="list"
        >
          <div class="py-1" role="none">
            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Account settings</a>
            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Support</a>
            <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">License</a>
          </div>
        </div>
        <button 
          class="btn inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center"
          type="button" 
          id="button-addon2"
        >
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
          </svg>
        </button>
      </div>
  </div>
  </div>
  </div>
  @endforeach
@endif

@foreach ($bodies as $body)
tu body
@endforeach

@if($services)
  <div class="mt-4 text-center">
    <h3 class="text-2xl font-bold">Our Menu</h3>
    <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
      TODAY'S SPECIALITY</h2>
  </div>
  @foreach ($services as $service)
  <section class="mt-8 bg-white">

    <div class="container w-full px-5 py-6 mx-auto">
      <div class="grid lg:grid-cols-4 gap-y-6">
        <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
          <img class="w-full h-48" src="{{ asset('images/services/thumbnails') }}/{{ $service->thumbnail }}" alt="Image">
          <div class="px-6 py-4">
            <div class="flex mb-2">
              <span class="px-4 py-0.5 text-sm bg-red-500 rounded-full text-red-50">{{ $service->category->name }}</span>
            </div>
            <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">{{ $service->name }}</h4>
            <p class="leading-normal text-gray-700">{{ $service->content }}</p>
          </div>
          <div class="flex items-center justify-between p-4">
            <a href="{{ route('home.services_details', $service->slug) }}" class="px-4 py-2 bg-green-600 text-green-50">more</a>
            <span class="text-xl text-green-600">${{ $service->price }}</span>
          </div>
        </div>

      </div>
    </div>
  </section>
  @endforeach
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