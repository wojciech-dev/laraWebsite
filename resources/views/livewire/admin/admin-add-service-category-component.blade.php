<div id="main">
    <h1>Add new category</h1>

    @if (Session::has('message'))
    <div>{{ Session::get('message') }}</div>
    @endif

    <form wire:submit.prevent="createNewCategory">
        @csrf
        <input type="text" name="name" wire:model="name" wire:keyup="generateSlug">
        @error('name') <p>{{ $message }}</p> @enderror
        <input type="text" name="slug" wire:model="slug">
        @error('slug') <p>{{ $message }}</p> @enderror
        <input type="file" name="image" wire:model="image">
        @error('image')<p>{{ $message }}</p> @enderror
        @if ($image)
        @php
        try {
        $url = $image->temporaryUrl();
        $photoStatus = true;
        }catch (RuntimeException $exception){
        $photoStatus = false;
        }
        @endphp
        @if($photoStatus)
        <img width="150px" src="{{ $url }}">
        @else
        Something went wrong while uploading the file.
        @endif
        @endif
        <button type="submit">Save</button>
    </form>
</div>