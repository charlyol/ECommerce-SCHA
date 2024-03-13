<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <a href="{{route('list.edit')}}" class="inline-block px-4 py-1 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600">
                    Modifier le contenue du site
                </a>
                <a href="{{route('book.add')}}" class="inline-block px-4 py-1 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600">
                    Ajouter un livre
                </a>
            </div>
        </div>
    </div>

</x-guest-layout>

