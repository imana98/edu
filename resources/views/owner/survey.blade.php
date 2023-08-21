<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          アンケート一覧
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <section class="text-gray-600 body-font overflow-hidden">
                  <div class="container px-5 py-18 mx-auto">
                    <div class="flex flex-col text-center w-full mb-8">
                      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900"></h1>
                    </div>
                    @if (session('flash_message'))
                    <div class="bg-green-800 w-1/2 mx-auto px-2 text-white text-center py-2 my-4">
                      {{ session('flash_message') }}
                    </div>
                    @endif
                    <div class="flex flex-wrap justify-around -m-4">
                      @foreach ($surveys as $survey)
                      @csrf
                      <div class="p-4 xl:w-1/4 md:w-1/2 w-full">
                        <div class="h-full p-6 rounded-lg border-2 border-gray-300 flex flex-col relative overflow-hidden">
                          <h2 class="text-sm tracking-widest title-font mb-1 font-medium">{{ $survey->title }}</h2>
                          <h1 class="text-5xl text-gray-900 pb-4 mb-4 border-b border-gray-200 leading-none"></h1>
                          <p class="flex items-center text-gray-600 mb-2 font-bold">
                            １：{{ $survey->question01 }}
                          </p>
                          <p class="flex items-center text-gray-600 mb-2 font-bold">
                            ２：{{ $survey->question02 }}
                          </p>
                          <p class="flex items-center text-gray-600 mb-2 font-bold">
                            ３：{{ $survey->question03 }}
                          </p>
                          <p class="flex items-center text-gray-600 mb-2 font-bold">
                            ４：{{ $survey->question04 }}
                          </p>
                          <form action="{{ route('owner.seminars.list', ['id' => $survey->id]) }}" method="get">
                            <div class="flex justify-end"><button type="submit" class="text-white bg-green-500 border-0 py-2 px-8 hover:bg-green-600 rounded text-lg">回答を見る</button></div>
                          </form>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </section>
          </div>
      </div>
  </div>
</x-app-layout>
