<h1>home component</h1>

@foreach($categories as $category)
<div>
    <img width="150px" src="{{ asset('images/categories')}}/{{ $category->image }}" alt="">
    <h5>{{ $category->name }}</h5>
    <a href="{{ route('home.services_by_category', ['category_slug' => $category->slug]) }}">read more</a>
</div>
@endforeach