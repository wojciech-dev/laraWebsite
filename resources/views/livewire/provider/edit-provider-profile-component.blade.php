<div>
    <h1>Edit profile</h1>

    @if (Session::has('message'))
    <div>{{ Session::get('message') }}</div>
    @endif

    <form wire:submit.prevent="updateProfile">
        @csrf

        about:
        <textarea name="about" id="" cols="30" rows="10" wire:model="about"></textarea><br>
        @error('about') <p>{{ $message }}</p> @enderror

        city:
        <input type="text" name="city" wire:model="city"><br>
        @error('city') <p>{{ $message }}</p> @enderror

        service category:
        <select name="service_category_id" wire:model="service_category_id">
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br>
        @error('service_category_id') <p>{{ $message }}</p> @enderror

        service locations:
        <input type="text" name="service_locations" wire:model="service_locations"><br>
        @error('service_locations') <p>{{ $message }}</p> @enderror

        <input type="file" name="image" wire:model="newImage">
        @error('newImage')<p>{{ $message }}</p> @enderror
        <div class="form-group">
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
            <img width="150px" src="{{ $url }}">
            @else
            Something went wrong while uploading the file.
            <img width="150px" src="{{ asset('images/providers/no_photo.jpg') }}" alt="">
            @endif
            @else
            <img width="150px" src="{{ asset('images/providers/no_photo.jpg') }}" alt="">
            @endif
        </div>

        <button type="submit">update profile</button>
    </form>
</div>