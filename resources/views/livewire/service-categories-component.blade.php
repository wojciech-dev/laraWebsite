<div id="service">
    @foreach ($categories as $category )
    <div class="item">
        <h5>{{ $category->name }}</h5>
        <img src="{{ $category->image }}" alt="">
    </div>
    @endforeach
</div>