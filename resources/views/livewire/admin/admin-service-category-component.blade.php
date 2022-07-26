<div class="px-5">

    <h1 class="text-4xl mb-5">Admin service category</h1>

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

    <table class="min-w-full table-auto">
      <thead class="justify-between">
        <tr class="bg-gray-800">
          <th class="px-16 py-2">
            <span class="text-gray-300">ID</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">Image</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">Names</span>
          </th>

          <th class="px-16 py-2">
            <span class="text-gray-300">Slug</span>
          </th>

          <th class="px-16 py-2">
            <span class="text-gray-300">Actions</span>
          </th>
        </tr>
      </thead>
      <tbody class="bg-gray-200">
        @foreach ($categories as $category)
        <tr class="bg-white border-4 border-gray-200 text-center">
          <td class="px-16 py-2">{{ $category->id }}</td>
          <td class="px-16 py-2"><img width="100px" class="inline-block" src="{{ asset('images/categories') }}/{{ $category->image }}" alt=""></td>
          <td class="px-16 py-2">{{ $category->name }}</td>
          <td class="px-16 py-2">{{ $category->slug }}</td>

          <td class="px-16 py-2">
            <a href="{{ route('admin.services_by_category', ['category_slug' => $category->slug]) }}"
                class="inline-block px-4 py-2 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">
               List
              </a>
              <a href="{{ route('admin.edit_service_category', ['category_id' => $category->id]) }}" 
                 class="inline-block px-4 py-2 bg-blue-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600 active:shadow-lg transition duration-150 ease-in-out">
                Edit
              </a>
              <a href="#" 
                class="inline-block px-4 py-2 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                onclick="confirm('Are you sure want to delete?') || event.stopImmediatePropagation()" wire:click.prevent="deleteServiceCategory({{ $category->id }})">
                Delete
              </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="flex space-x-2 justify-left">
        <a
          href="{{ route('admin.add_service_category') }}"
          type="button"
          class="inline-block my-5 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
        >New category</a>
      </div>
  </div>