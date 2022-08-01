<div id="main">
    <h6 class="text-3xl px-5 pb-3">Add new slide</h6>
  
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
        <form wire:submit.prevent="addNewSlide">
        @csrf
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
              <div class="col-span-3 sm:col-span-2">
                @error('name') <p>{{ $message }}</p> @enderror
                <label class="block text-sm font-medium text-gray-700"> Name </label>
                <div class="mt-1">
                  <input 
                    type="text" 
                    name="title"
                    wire:model="title"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline">
                </div>
            </div>

            <div>
	
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
                @error('status') <p>{{ $message }}</p> @enderror
                <select 
                    name="status" 
                    wire:model="status"
                    class="block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                >
                    <option value="1">Avtive</option>
                    <option value="0">Disactive</option>
                </select>
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
                        wire:model="image"
                        class="sr-only">
                    </label>
                  </div>
                  <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                  @if ($image)
                      <img width="150px" src="{{ $image->temporaryUrl() }}">
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