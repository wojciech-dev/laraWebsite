<div class="px-5">

    <h1 class="text-4xl mb-5">Admin contact component</h1>

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
            <span class="text-gray-300">Name</span>
          </th>
          <th class="px-16 py-2">
            <span class="text-gray-300">Email</span>
          </th>

          <th class="px-16 py-2">
            <span class="text-gray-300">Phone</span>
          </th>

          <th class="px-16 py-2">
            <span class="text-gray-300">Message</span>
          </th>
        </tr>
      </thead>
      <tbody class="bg-gray-200">
        @foreach ($contacts as $contact)
        <tr class="bg-white border-4 border-gray-200 text-center">
          <td class="px-16 py-2">{{ $contact->id }}</td>
          <td class="px-16 py-2">{{ $contact->name }}</td>
          <td class="px-16 py-2">{{ $contact->email }}</td>
          <td class="px-16 py-2">{{ $contact->phone }}</td>
          <td class="px-16 py-2">{{ $contact->message }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>