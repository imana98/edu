<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          講義詳細
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <section class="text-gray-600 body-font">
                    <div class="container px-5 py-16 mx-auto flex flex-col">
                      <div class="lg:w-4/6 mx-auto">
                        <div class="h-64 overflow-hidden flex justify-around">
                          <img alt="content" class="" src="{{ asset('images/' . $detail->filename) }}">
                          <img alt="content" class="" src="{{ asset('storage/' . $detail->filename) }}">
                        </div>
                        <div class="flex flex-col sm:flex-row mt-10">
                          <div class="sm:w-1/3 sm:pr-8 sm:py-8">
                            <div class="flex flex-col">
                              <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">講義者：{{ $detail->speaker_name }}</h2>
                              <div class="w-12 h-1 bg-green-500 rounded mb-4"></div>
                            </div>
                          </div>
                          <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                            <p class="text-base">【{{ $detail->title }}】</p>
                            <p class="leading-relaxed text-lg mb-4">{{ $detail->descriptions }}</p>
                          </div>
                        </div>
                      </div>
                      <button onclick="history.back()" class="underline">戻る</button>
                    </div>
                  </section>
              </div>
          </div>
      </div>
  </div>
</x-app-layout> 
