<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            アンケート作成
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" bg-white border-b border-gray-200">
                  <section class="text-gray-600 body-font relative">
                    <div class="container px-5 py-12 mx-auto">
                      <div class="flex flex-col text-center w-full mb-12">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">アンケート作成フォーム</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">講義の詳細を記入のうえ、登録ボタンを押してください。<br>講義内容はあとから変更できます。</p>
                      </div>
                      <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <form method="" action="">
                          <div class="flex p-2">
                            <div class="relative mr-12">
                              <label for="name" class="leading-7 text-sm text-gray-600">研修名</label>
                              <div class="text-center border px-8 py-2">{{ $seminar->title }}</div>
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
                              <input type="text" id="title" name="title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="message" class="leading-7 text-sm text-gray-600">講義内容</label>
                              <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                            </div>
                          </div>
                          <div class="p-2 w-full">
                            <button class="flex mx-auto text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-800 rounded text-lg">作成する</button>
                          </div>
                        </ｆ>
                      </div>
                    </div>
                  </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

