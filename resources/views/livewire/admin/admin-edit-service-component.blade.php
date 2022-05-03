<div>
	<h1>Edit new service</h1>

	@if (Session::has('message'))
	<div>{{ Session::get('message') }}</div>
	@endif

	<form wire:submit.prevent="updateService">
		@csrf
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" wire:model="name" wire:keyup="generateSlug" />
			@error('name') <p>{{ $message }}</p> @enderror
		</div>
		<div class="form-group">
			<label for="slug">Slug</label>
			<input type="text" name="slug" wire:model="slug" />
			@error('slug') <p>{{ $message }}</p> @enderror
		</div>
		<div class="form-group">
			<label for="service_category">Service category</label>
			<select name="service_category_id" wire:model="service_category_id">
				@foreach ($categories as $category )
				<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>
			@error('service_category') <p>{{ $message }}</p> @enderror
		</div>
		<div class="form-group">
			<label for="price">Price</label>
			<input type="number" name="price" wire:model="price" />
			@error('price') <p>{{ $message }}</p> @enderror
		</div>
		<div class="form-group">
			<label for="difficulty_level">Difficulty level</label>
			<select name="difficulty_level" wire:model="difficulty_level">
				<option value="">Select</option>
				<option value="1">easy</option>
				<option value="2">medium</option>
				<option value="3">hard</option>
			</select>
			@error('difficulty_level') <p>{{ $message }}</p> @enderror
		</div>
		<div class="form-group">
			<label for="content">Content</label>
			<textarea name="content" wire:model="content"></textarea>
			@error('content') <p>{{ $message }}</p> @enderror
		</div>


		<div class="form-group">
			<label for="image">Image</label>
			<input type="file" name="image" wire:model="newimage" />
			@error('newimage') <p>{{ $message }}</p> @enderror
			@if ($newimage)
			@php
			try {
			$url = $newimage->temporaryUrl();
			$photoStatus = true;
			}catch (RuntimeException $exception){
			$photoStatus = false;
			}
			@endphp
			@if($photoStatus)
			<img width="150px" src="{{ $url }}">
			@else
			Something went wrong while uploading the file.
			<img width="150px" src="{{ asset('images/services') }}/{{ $image }}" alt="">
			@endif
			@else
			<img width="150px" src="{{ asset('images/services') }}/{{ $image }}" alt="">
			@endif
		</div>
		<div class="form-group">
			<label for="thumbnail">Thumbnail</label>
			<input type="file" name="thumbnail" wire:model="newthumbnail" />
			@error('newthumbnail') <p>{{ $message }}</p> @enderror
			@if ($newthumbnail)
			@php
			try {
			$url = $newthumbnail->temporaryUrl();
			$photoStatus = true;
			}catch (RuntimeException $exception){
			$photoStatus = false;
			}
			@endphp
			@if($photoStatus)
			<img width="150px" src="{{ $url }}">
			@else
			Something went wrong while uploading the file.
			<img width="150px" src="{{ asset('images/services/thumbnails') }}/{{ $image }}" alt="">
			@endif
			@else
			<img width="150px" src="{{ asset('images/services/thumbnails') }}/{{ $image }}" alt="">
			@endif
		</div>
		<div class="form-group">
			<label for="status">Status</label>
			<input type="number" name="status" wire:model="status" />
			@error('status') <p>{{ $message }}</p> @enderror
		</div>
		<button type="submit">Update</button>
	</form>
</div>