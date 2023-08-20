<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          講義一覧
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <section class="text-gray-600 body-font overflow-hidden">
                  <div class="container px-5 py-24 mx-auto">
                    <div class="flex flex-col text-center w-full mb-8">
                      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">{{ $title->title }}</h1>
                      <p>この研修に登録されている講義です</p>
                    </div>
                    @if (session('flash_message'))
                    <div class="bg-green-800 w-1/2 mx-auto px-2 text-white text-center py-2 my-4">
                      {{ session('flash_message') }}
                    </div>
                    @endif
                    <div class="flex flex-wrap justify-around -m-4">
                      @foreach ($seminars as $seminar)
                      @csrf
                      <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                        <div class="h-full p-6 rounded-lg border-2 border-gray-300 flex flex-col relative overflow-hidden">
                          <h2 class="text-sm tracking-widest title-font mb-1 font-medium">{{ $seminar->title }}</h2>
                          <h1 class="text-5xl text-gray-900 pb-4 mb-4 border-b border-gray-200 leading-none"></h1>
                          <p class="flex items-center text-gray-600 mb-2">【開講者】
                            {{ $seminar->speaker_name }}
                          </p>
                          <p class="flex items-center text-gray-600 mb-2">【内容】
                            {{ $seminar->descriptions }}
                          </p>
                          <p>【画像】</p>
                          <img src="{{ asset('storage/' . $seminar->filename) }}" alt="">
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </section>
          </div>
      </div>
  </div>
</x-app-layout>
