<div id="main">
    <h6 class="text-3xl px-5 pb-3">Edit category</h6>
  
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
        <form wire:submit.prevent="updateServiceCategory">
        @csrf
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                @error('name') <p>{{ $message }}</p> @enderror
                <label class="block text-sm font-medium text-gray-700"> Name </label>
                <div class="mt-1">
                  <input 
                    type="text" 
                    name="name"
                    wire:model="name" 
                    wire:keyup="generateSlug"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline">
                </div>
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
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline">
              </div>
            </div>
            <div>
              @error('image')<p>{{ $message }}</p> @enderror
              <label class="block text-sm font-medium text-gray-700"> Cover photo </label>
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
                        wire:model="newImage"
                        class="sr-only">
                    </label>
                  </div>
                  <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
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
                </div>
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