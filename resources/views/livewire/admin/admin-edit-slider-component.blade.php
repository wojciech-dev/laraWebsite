<div id="main">
	<h1>Edit slide</h1>

	@if (Session::has('message'))
	<div>{{ Session::get('message') }}</div>
	@endif

	<form wire:submit.prevent="updateSlide">
		@csrf
		<input type="text" name="title" wire:model="title">
		@error('title') <p>{{ $message }}</p> @enderror
		<select name="status" wire:model="status">
			<option value="1">Avtive</option>
			<option value="0">Disactive</option>
		</select>
		@error('status') <p>{{ $message }}</p> @enderror
		<input type="file" name="image" wire:model="newImage">
		@error('newimage')<p>{{ $message }}</p> @enderror
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
			<img width="150px" src="{{ asset('images/slider') }}/{{ $image }}" alt="">
			@endif
			@else
			<img width="150px" src="{{ asset('images/slider') }}/{{ $image }}" alt="">
			@endif
		</div>
		<button type="submit">Update</button>
	</form>
</div>