<h1>home component</h1>

<form id="sform" action="{{ route('searchServices') }}" method="post">
    @csrf
    <input type="text" name="q" id="q" class="typeahead" placeholder="Search" autocomplete="off">
    <div id="list"></div>
    <input type="submit" name="submit" value="Search">
</form>

@foreach($slides as $slide)
<div>
    <h2>Slajd {{ $slide->title }}</h2>
    <img width="150px" src="{{ asset('images/slider')}}/{{ $slide->image }}" alt="">
</div>
@endforeach

@foreach($categories as $category)
<div>
    <img width="150px" src="{{ asset('images/categories')}}/{{ $category->image }}" alt="">
    <h5>{{ $category->name }}</h5>
    <a href="{{ route('home.services_by_category', ['category_slug' => $category->slug]) }}">read more</a>
</div>
@endforeach

@push('scripts')
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

    function boldStr(needle, haystack) {
        let regex = new RegExp(needle, 'i');
        return haystack.replace(regex, "<b>" + needle + "</b>");
    }

    $("input.typeahead").autocomplete({
        source: getNames(),
    }).autocomplete("instance")._renderItem = function(ul, item) {
        return $("<li>")
          .append("<div>" + boldStr($("input.typeahead").val(), item.label) + "</div>")
          .appendTo(ul);
    };

</script>

@endpush