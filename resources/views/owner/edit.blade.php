<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          講義作成
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class=" bg-white border-b border-gray-200">
                <section class="text-gray-600 body-font relative">
                  <div class="container px-5 py-12 mx-auto">
                    <div class="flex flex-col text-center w-full mb-12">
                      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">編集フォーム</h1>
                      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">講義の編集ができます。<br>記入が終わりましたら編集ボタンを押してください。</p>
                    </div>
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                      <form action="{{ route('owner.seminars.update', ['id' => $seminar->id]) }}" method="post" class="">
                        @csrf
                        <div class="flex p-2">
                          <div class="relative mr-12">
                            <label for="name" class="leading-7 text-sm text-gray-600">研修名</label>
                            <div class="text-center border px-8 py-2">{{ $seminar->seminar_name }}</div>
                          </div>
                          <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">開催日程</label>
                            <div class="text-center border px-8 py-2">{{ $seminar->date }}</div>
                          </div>
                        </div>
                        <div class="p-2">
                          <div class="relative">
                            <label for="email" class="leading-7 text-sm text-gray-600">講義者</label>
                            <div class="text-center border py-2">{{ $speaker->name }}</div>
                          </div>
                        </div>
                        <div class="p-2">
                          <div class="relative">
                            <label for="title" class="leading-7 text-sm text-gray-600">タイトル</label>
                            <input type="text" id="title" name="title" value="{{ $seminar->title }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                        </div>
                        <div class="p-2 w-full">
                          <div class="relative">
                            <label for="message" class="leading-7 text-sm text-gray-600">講義内容</label>
                            <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $seminar->descriptions }}</textarea>
                          </div>
                        </div>
                        <div class="p-2">
                          <div class="relative">
                            <label for="images" class="leading-7 text-sm text-gray-600">画像</label>
                            <div>
                              <p>選択中の画像</p>
                              {{-- <img src="{{ asset('storage/' . $seminar->filename) }}" alt=""> --}}
                            </div>
                            <input type="file" id="images" name="images" value="" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          </div>
                        </div>
                        <div class="flex justify-end p-2 w-full">
                          <button type="submit" class="flex  text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-800 rounded text-lg">編集する</button>
                        </div>
                      </form>

                      <form name="deleForm" action="{{ route('owner.seminars.destroy', ['id' => $seminar->id]) }}" method="get">
                        <button id="deleteBtn" type="button" class="flex justify-start text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-800 rounded text-lg">削除</button>
                      </form>
                    </div>
                  </div>
                </section>
              </div>
          </div>
      </div>
  </div>
  <script>
    let d = document.getElementById("deleteBtn");
    d.addEventListener('click', function(){
      let yes = confirm('削除しますか？');
      if(yes) {
        document.deleForm.submit();
      }
    })
  </script>
</x-app-layout>
