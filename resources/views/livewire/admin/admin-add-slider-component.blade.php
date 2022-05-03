<div id="main">
    <h1>Add new slide</h1>

    @if (Session::has('message'))
    <div>{{ Session::get('message') }}</div>
    @endif

    <form wire:submit.prevent="addNewSlide">
        @csrf
        <input type="text" name="title" wire:model="title">
        @error('title') <p>{{ $message }}</p> @enderror
        <select name="status" wire:model="status">
            <option value="1">Avtive</option>
            <option value="0">Disactive</option>
        </select>
        @error('status') <p>{{ $message }}</p> @enderror
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