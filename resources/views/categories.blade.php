<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
     
            <table style="width: 100%; border: 1px solid #ddd; text-align:center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Email</th>
      <th scope="col">Name</th>
      <th scope="col">Created At</th>
    </tr>
  </thead>
  <tbody>


  </tbody>
</table>

         


            </div>
        </div>
    </div>
</x-app-layout>
