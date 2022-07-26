

<div id="main">
	<h6 class="text-3xl px-5 pb-3">Edit service</h6>
  
  @if (Session::has('message'))
	<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
	  <div class="flex">
		<div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
		<div>
		  <p class="font-bold">Success</p>
		  <p class="text-sm">{{ Session::get('message') }}.</p>
		</div>
	  </div>
	</div>
  @endif
  
  <div>
	<div class="mt-5 md:mt-0 md:col-span-2">
		<form wire:submit.prevent="updateService">
		@csrf
		<div class="shadow sm:rounded-md sm:overflow-hidden">
		  <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
			  <div class="col-span-3 sm:col-span-2">
				@error('name') <p>{{ $message }}</p> @enderror
				<label class="block text-sm font-medium text-gray-700"> Name </label>
				<div class="mt-1">
				  <input 
					type="text" 
					name="name"
					wire:model="name" 
					wire:keyup="generateSlug"
					class="w-1/3 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
				</div>
			  </div>
			<div>
			  @error('slug') <p>{{ $message }}</p> @enderror
			  <label class="block text-sm font-medium text-gray-700"> Slug </label>
			  <div class="mt-1">
				  <input 
				  type="text" 
				  name="slug"
				  wire:model="slug"
				  class="w-1/3 shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
			  </div>
			</div>
			<div>
				@error('service_category') <p>{{ $message }}</p> @enderror
				<label class="block text-sm font-medium text-gray-700"> Service category </label>
				<div class="mt-1">
					<select class="block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="service_category_id" wire:model="service_category_id">
						<option value="">Select</option>
						@foreach ($categories as $category )
						<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>
			  </div>
			  <div>
				@error('price') <p>{{ $message }}</p> @enderror
				<label class="block text-sm font-medium text-gray-700"> Price </label>
				<div class="mt-1">
					<input 
					type="number" 
					name="price"
					wire:model="price"
					class="shadow appearance-none border rounded w-1/9 py-2 px-3 text-gray-700 leading-tight focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
				</div>
			  </div>
			  <div>
				@error('difficulty_level') <p>{{ $message }}</p> @enderror
				<label class="block text-sm font-medium text-gray-700"> Difficulty level  </label>
				<div class="mt-1">
					<select class="block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
						name="difficulty_level" 
						wire:model="difficulty_level"
					>
			
					   
					<option value="1">{{ $difficulty_level }}</option>
					   @if ($difficulty_level == 'easy')
					   <option value="2">medium</option>
					   <option value="3">hard</option>
					   @elseif ($difficulty_level == 'medium')
					   <option value="2">easy</option>
					   <option value="3">hard</option>
					   @elseif ($difficulty_level == 'hard')
					   <option value="2">easy</option>
					   <option value="3">medium</option>
					   @else
					   <option value="">Select</option>
					   <option value="2">easy</option>
					   <option value="3">medium</option>
					   <option value="4">hard</option>
					   @endif

					</select>
				</div>
			  </div>
			  <div>
				@error('content') <p>{{ $message }}</p> @enderror
				  <label class="form-label inline-block mb-2 text-gray-700"
					>Content</label
				  >
				  <textarea
				  	name="content"
				  	wire:model="content"
					class="
					  shadow
					  form-control
					  block
					  w-full
					  px-3
					  py-1.5
					  text-base
					  font-normal
					  text-gray-700
					  bg-white bg-clip-padding
					  border border-solid border-gray-300
					  rounded
					  transition
					  ease-in-out
					  m-0
					  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
					"
					rows="3"
					placeholder="Your message"
				  ></textarea>
				
			  </div>
			<div>
			  @error('image')<p>{{ $message }}</p> @enderror
			  <label class="block text-sm font-medium text-gray-700"> Image </label>
			  <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
				<div class="space-y-1 text-center">
				  <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
					<path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				  </svg>
				  <div class="text-sm text-gray-600">
					<label class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
					  <span>Upload a file</span>
					  <input 
						type="file" 
						name="image" 
						wire:model="newimage"
						class="sr-only">
					</label>
				  </div>
				  <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
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
			  </div>
			</div>

			<div>
				@error('thumbnail')<p>{{ $message }}</p> @enderror
				<label class="block text-sm font-medium text-gray-700"> Thumbnail </label>
				<div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
				  <div class="space-y-1 text-center">
					<svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
					  <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					<div class="text-sm text-gray-600">
					  <label class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
						<span>Upload a file</span>
						<input 
						  type="file" 
						  name="thumbnail" 
						  wire:model="newthumbnail"
						  class="sr-only">
					  </label>
					</div>
					<p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
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
				</div>
			  </div>
			  <div>
				@error('status') <p>{{ $message }}</p> @enderror
				<label class="block text-sm font-medium text-gray-700"> Status </label>
				<div class="mt-1">
					<input 
					type="number" 
					name="status" 
					wire:model="status"
					class="shadow appearance-none border rounded w-1/9 py-2 px-3 text-gray-700 leading-tight focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
				</div>
			  </div>

		  </div>
		  <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
			<button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 bg-blue-teal-gradient">Save</button>
		  </div>
		</div>
	  </form>
	</div>
  </div>