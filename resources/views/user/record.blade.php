<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            受講履歴
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <section class="text-gray-600 body-font">
                    <h3 class="text-3xl w-64 mx-auto" style="background:linear-gradient(transparent 60%, #F8E87E 60%);">過去に受講した研修</h3>
                    <div class="container px-5 py-8 mx-auto">
                      <div class="flex flex-wrap -mx-4 -my-8">
                        @foreach ($records as $record)
                        <div class="py-8 px-4 lg:w-1/3">
                          <div class="h-full flex items-start border-2 p-4">
                            <div class="flex-grow">
                              <h2 class="tracking-widest text-xs title-font font-medium text-green-500 mb-1">受講日【{{ $record->seminarDetail->seminar_id   }}】</h2>
                              <h1 class="title-font text-xl font-medium text-gray-900 mb-3">研修名：{{ $record->seminarDetail->seminar_id }}</h1>
                              <p class="leading-relaxed mb-5">講義名：{{ $record->seminarDetail->title }}</p>
                              <p class="leading-relaxed mb-5">講義内容：{{ $record->seminarDetail->descriptions }}</p>
                              <a class="inline-flex items-center">
                                <img alt="blog" src="{{ asset('images/speaker01.png') }}" class="w-8 h-8">
                                <span class="flex-grow flex flex-col pl-3">
                                  <span class="title-font font-medium text-gray-900">講義者：{{ $record->seminarDetail->speaker_id }}</span>
                                </span>
                              </a>
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
