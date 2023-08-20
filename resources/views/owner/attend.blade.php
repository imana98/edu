<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            参加者
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                      <div class="flex flex-col text-center w-full mb-20">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">【{{ $detail->title }}】の参加予定者</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base"><span class="font-bold">{{ $detail->speaker_name }}</span>先生<br>の講義に参加予定の教員一覧です。</p>
                      </div>
                      <div class="flex flex-wrap -m-2">
                        @foreach ($entries as $entry)
                        <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                          <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                            <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="{{ asset('images/mypage.png')}}">
                            <div class="flex-grow">
                              <h2 class="text-gray-900 title-font font-medium">{{ $entry->user->name }}</h2>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
