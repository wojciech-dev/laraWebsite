<div id="service">
    @foreach ($categories as $category )
    <div class="item">
        <h5>{{ $category->name }}</h5>
        <img src="{{ $category->image }}" alt="">
        <a href="{{ route('home.services_by_category', ['category_slug' => $category->slug]) }}">read more</a>
    </div>
    @endforeach
</div>