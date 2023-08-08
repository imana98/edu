<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          研修作成
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class=" bg-white border-b border-gray-200">
                <section class="text-gray-600 body-font relative">
                  <div class="container px-5 py-8 mx-auto">
                    <div class="flex flex-col text-center w-full mb-4">
                      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">研修作成フォーム</h1>
                      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">実施する研修の詳細を記入のうえ、登録ボタンを押してください。<br>研修内容はあとから変更できます。</p>
                    </div>
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <form action="{{ route('admin.seminars.store') }}" method="post">
                          @csrf
                          <div class="p-2">
                            <div class="relative">
                              <label for="title" class="leading-7 text-sm text-gray-600">研修名</label>
                              <input type="text" id="title" name="title" value="{{ old('title') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="夏季研修" required>
                            </div>
                          </div>
                          <div class="p-2">
                            <div class="relative">
                              <label for="date" class="leading-7 text-sm text-gray-600">開催日程</label>
                              <input type="text" id="date" name="date" value="{{ old('date') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  placeholder="2023/01/02 12:00:00" required>
                            </div>
                          </div>
                          <div class="p-2">
                            <div class="relative">
                              <label for="target" class="leading-7 text-sm text-gray-600">対象者</label>
                              <input type="text" id="target" name="target" value="{{ old('target') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="全職員" required>
                            </div>
                          </div>
                          <div class="p-2">
                            <div class="relative">
                              <label for="deadline" class="leading-7 text-sm text-gray-600">申し込み締め切り日時（原則、開催日の前日に設定してください）</label>
                              <input type="text" id="deadline" name="deadline" value="{{ old('deadline') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" placeholder="2023/01/01 12:00:00" required>
                            </div>
                          </div>
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="explain" class="leading-7 text-sm text-gray-600">研修説明</label>
                              <textarea id="explain" name="explain" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" placeholder="〇〇年度の研修会です。" required>{{ old('explain') }}</textarea>
                            </div>
                          </div>
                          <div class="p-2 w-full mt-4 flex justify-around">
                            <button type="button" onclick="location.href='{{ route('admin.seminars.index') }}'" class="flex mx-auto text-white bg-gray-400 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">管理画面に戻る</button>
                            <button type="submit" class="flex mx-auto text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-800 rounded text-lg">作成する</button>
                          </div>
                        </form>
                    </div>
                  </div>
                </section>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>


