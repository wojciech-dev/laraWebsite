<div id="main">
    <h1>Edit category</h1>

    @if (Session::has('message'))
    <div>{{ Session::get('message') }}</div>
    @endif

    <form wire:submit.prevent="updateServiceCategory">
        @csrf
        <input type="text" name="name" wire:model="name" wire:keyup="generateSlug">
        @error('name') <p>{{ $message }}</p> @enderror
        <input type="text" name="slug" wire:model="slug">
        @error('slug') <p>{{ $message }}</p> @enderror
        <input type="file" name="image" wire:model="newImage">
        @error('newImage')<p>{{ $message }}</p> @enderror
        @if ($newImage)
        @php
        try {
        $url = $newImage->temporaryUrl();
        $photoStatus = true;
        }catch (RuntimeException $exception){
        $photoStatus = false;
        }
        @endphp
        @if($photoStatus)
        <img src="{{ $url }}">
        @else
        Something went wrong while uploading the file.
        <img width="150px" src="{{ asset('images/categories') }}/{{ $image }}" alt="">
        @endif
        @else
        <img width="150px" src="{{ asset('images/categories') }}/{{ $image }}" alt="">
        @endif
        <button type="submit">Save</button>
    </form>
</div>