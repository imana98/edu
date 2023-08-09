<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            開講履歴
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <section class="text-gray-600 body-font">
                    <h3 class="text-3xl w-64 mx-auto text-center" style="background:linear-gradient(transparent 60%, #F8E87E 60%);">開講予定／履歴</h3>
                    <div class="container px-5 py-8 mx-auto">
                      <div class="flex flex-wrap -mx-4 -my-8">
                        @foreach ($records as $record)
                        <div class="py-8 px-4 lg:w-1/3">
                          <div class="h-full flex items-start border-2 p-4 relative">
                            <div class="flex-grow">
                              @if($record->date < $dd)
                              <div class="absolute inset-0 bg-neutral-700 bg-opacity-50 text-center">
                                <p class="block my-12 text-2xl text-white">開講済み</p>
                              </div>
                              @endif
                              <h2 class="tracking-widest text-xs title-font font-medium text-green-500 mb-1">開講日【{{ $record->date  }}】</h2>
                              <h1 class="title-font text-xl font-medium text-gray-900 mb-3">研修名：{{ $record->seminar_name }}</h1>
                              <p class="leading-relaxed mb-5">講義名：{{ $record->title }}</p>
                              <p class="leading-relaxed mb-5">講義内容：{{ $record->descriptions }}</p>
                              <a class="inline-flex items-center">
                                <img alt="blog" src="{{ asset('images/speaker01.png') }}" class="w-8 h-8">
                                <span class="flex-grow flex flex-col pl-3">
                                  <span class="title-font font-medium text-gray-900">講義者：{{ $record->speaker_name }}</span>
                                </span>
                              </a>
                              @if($record->date > $dd)
                              <div class="flex justify-around mt-4">
                                <div class="flex justify-end mb-8">
                                  <button onclick="location.href='{{ route('owner.seminars.attend', ['id' => $record->seminar_id]) }}'" class="flex text-white bg-orange-400 border-0 py-2 px-8 focus:outline-none hover:bg-orange-600 rounded text-lg">参加予定者</button>
                                </div>
                                <form action="{{ route('owner.seminars.edit', ['id' => $record->seminar_id]) }}" method="get">
                                  <div class="flex justify-end"><button type="submit" class="text-white bg-green-500 border-0 py-2 px-8 hover:bg-green-600 rounded text-lg">編集</button></div>
                                </form>
                              </div>
                              @endif
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
