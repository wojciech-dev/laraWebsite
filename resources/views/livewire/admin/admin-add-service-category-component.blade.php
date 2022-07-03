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
            <img width="150px" src="{{ $image->temporaryUrl() }}">
        @endif
        <button type="submit">Save</button>
    </form>
</div>