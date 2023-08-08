<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          研修一覧
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="md:p-6 bg-white border-b border-gray-200">
          <section class="text-gray-600 body-font">
            <div class="container px-5 py-8 mx-auto">
              @if (session('message'))
                  <div class="bg-green-800 w-1/2 mx-auto px-2 text-white text-center py-2 my-4">
                      {{ session('message') }}
                  </div>
              @endif
                    @foreach ($seminars as $seminar)
                    <div class="relative h-200 w-200">
                      @if ($seminar->deadline < $dd)
                      <div class="absolute inset-0 bg-neutral-700 bg-opacity-50 text-center">
                        <p class="block my-12 text-6xl text-white">受付終了</p>
                      </div>
                      @endif
                        <div class="flex-grow sm:text-left text-center mt-6 mb-4 p-2 sm:mt-0">
                          <h2 class="text-gray-900 text-lg title-font font-medium mb-2">{{ $seminar->title }}について<span class="text-red-400">【締め切り:{{ $seminar->deadline }}】</span></h2>
                          <p class="leading-relaxed text-base">開催日：{{ $seminar->date }}<br>対象者：{{ $seminar->target }}</p>
                          @if ($seminar->deadline < $dd)
                          <div class="flex justify-end mb-8"></div>
                          @elseif (empty($user))
                          <div class="flex justify-end mb-8">
                            <button onclick="location.href='{{ route('owner.seminars.create', ['id' => $seminar->id]) }}'" class="flex text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">講義を作成する</button>
                          </div>
                          @endif
                        </div>
                    </div>
                    @endforeach
                  </div>
                  {{ $seminars->links() }}
                </section>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
