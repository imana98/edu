<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            受講予定
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <section class="text-gray-600 body-font">
                    <h3 class="text-3xl w-56 text-center mx-auto" style="background:linear-gradient(transparent 60%, rgb(179, 240, 167) 60%);">予定している研修</h3>
                    <div class="container px-5 py-8 mx-auto">
                      <div class="-mx-4 -my-8">
                        <div class="py-8 px-4 lg:w-1/3">
                          <div class="h-full flex items-start border-2 p-4 relative">
                            <div class="flex-grow w-20">
                              @foreach ($reserves as $reserve)
                              @if($reserve->seminarDetail->date < $dd)
                              <div class="absolute inset-0 bg-neutral-700 bg-opacity-50 text-center">
                                <p class="block my-12 text-2xl text-white">受講済み</p>
                              </div>
                              @endif
                              <h2 class="tracking-widest text-xs title-font font-medium text-green-500 mb-1">受講日【{{ $reserve->seminarDetail->date }}】</h2>
                              <h1 class="title-font text-xl font-medium text-gray-900 mb-3">研修名：{{ $reserve->seminarDetail->seminar_name }}</h1>
                              <p class="leading-relaxed mb-5">講義名：{{ $reserve->seminarDetail->title }}</p>
                              <p class="leading-relaxed mb-5">講義内容：{{ $reserve->seminarDetail->descriptions }}</p>
                              <a class="inline-flex items-center">
                                <img alt="blog" src="{{ asset('images/speaker01.png') }}" class="w-8 h-8">
                                <span class="flex-grow flex flex-col pl-3">
                                  <span class="title-font font-medium text-gray-900">講義者：{{ $reserve->seminarDetail->speaker_name }}</span>
                                </span>
                              </a>
                              <form action="{{ route('user.seminars.edit', ['id' => $reserve->seminarDetail->seminar_id]) }}" method="get">
                                <input type="hidden" name="speakerId" value={{ $reserve->seminarDetail->speaker_id }}>
                                <div class="flex justify-end"><button type="submit" class="text-white bg-green-500 border-0 py-2 px-8 hover:bg-green-600 rounded text-lg">変更する</button></div>
                              </form>
                              @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
