<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <p class="text-xl">{{ $profile->user->name }}</p>
                    <div class="flex justify-center"><img class="rounded-full" src="{{ asset('storage/' . $profile->filename) }}" alt=""></div>
                    <form action="{{ route('user.seminars.image') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file">
                        <div  class="flex justify-end mt-10 mb-6">
                            <button type="submit" class="flex text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">画像を変更する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
