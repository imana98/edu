<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          アンケート編集
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <section class="text-gray-600 body-font relative">
                  <div class="container px-5 py-4 mx-auto">
                    <div class="flex flex-col text-center w-full">
                      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">アンケート<br>編集フォーム</h1>
                      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">変更内容を入力の上、更新ボタンを押してください。</p>
                      <x-flash-message status="session('status')" />
                    </div>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form action="{{ route('admin.seminars.survey.update', ['id' => $survey->id]) }}" method="post">
                      @method('PUT')
                      @csrf
                      <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="-m-2">
                          <div class="p-2">
                            <div class="relative">
                              <label for="title" class="leading-7 text-sm text-gray-600">アンケート名</label>
                              <input type="text" id="title" name="title" value="{{ $survey->title }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="夏季研修">
                            </div>
                          </div>
                          <div class="p-2">
                            <div class="relative">
                              <label for="question01" class="leading-7 text-sm text-gray-600">質問事項０１</label>
                              <input type="text" id="question01" name="question01" value="{{ $survey->question01 }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"required>
                            </div>
                          </div>
                          <div class="p-2">
                            <div class="relative">
                              <label for="question02" class="leading-7 text-sm text-gray-600">質問事項０２</label>
                              <input type="text" id="question02" name="question02" value="{{ $survey->question02 }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                            </div>
                          </div>
                          <div class="p-2">
                            <div class="relative">
                              <label for="question03" class="leading-7 text-sm text-gray-600">質問事項０３</label>
                              <input type="text" id="question03" name="question03" value="{{ $survey->question03 }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                            </div>
                          </div>
                          <div class="p-2">
                            <div class="relative">
                              <label for="question04" class="leading-7 text-sm text-gray-600">質問事項０４</label>
                              <input type="text" id="question04" name="question04" value="{{ $survey->question04 }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
                            </div>
                          </div>
                          <div class="p-2 w-full mt-4 flex justify-around">
                            <button type="button" onclick="location.href='{{ route('admin.seminars.detail', ['id' => $survey->seminar_id]) }}'" class="flex mx-auto text-white bg-gray-400 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">詳細画面に戻る</button>
                            <button type="submit" class="flex mx-auto text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-800 rounded text-lg">編集する</button>
                          </div>
                      </div>
                    </form>
                  </div>
                </section>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
