    <!-- Main Hero Content -->
    <div
      class="container max-w-lg px-4 py-32 mx-auto text-left bg-center bg-no-repeat bg-cover md:max-w-none md:text-center"
      style="background-image: url('https://cdn.pixabay.com/photo/2016/11/18/14/39/beans-1834984_960_720.jpg')">
      <h1
        class="font-mono text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-center sm:leading-none lg:text-5xl">
        <span class="inline md:block">Welcome To Larainfo Restaurant</span>
      </h1>
      <div class="mx-auto mt-2 text-green-50 md:text-center lg:text-lg">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta voluptatem ab necessitatibus illo praesentium
        culpa excepturi quae commodi quaerat,
      </div>
      <div class="flex flex-col items-center mt-12 text-center">
        <span class="relative inline-flex w-full md:w-auto">
          <form id="sform" action="searchservices" method="post">
            <input type="text" name="q" id="q" class="typeahead" placeholder="Search" autocomplete="off">
            <div id="list"></div>
            <input type="submit" name="submit" value="Search">
        </form>
      </div>
    </div>
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