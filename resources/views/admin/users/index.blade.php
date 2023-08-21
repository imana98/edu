<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            教員一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-6 bg-white border-b border-gray-200">
                        <section class="text-gray-600 body-font">
                          <h3 class="text-3xl w-56 text-center mx-auto" style="background:linear-gradient(transparent 60%, rgb(179, 240, 167) 60%);">教員管理</h3>
                          <div class="container md:px-5 mx-auto my-12">
                            <x-flash-message status="session('status')" />
                            <div class="flex justify-end mb-10">
                              <button onclick="location.href='{{ route('admin.users.create') }}'" class="flex text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">教員を登録する</button>
                            </div>
                        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                          <table class="table-auto w-full text-left whitespace-no-wrap">
                            <thead>
                              <tr>
                                <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">講義者ID</th>
                                <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">教員名</th>
                                {{-- <th clmdass="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メールアドレス</th> --}}
                                <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">アカウント作成</th>
                                <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                              </tr>
                            </thead>
                    @foreach ($users as $user)
                            <tbody>
                              <tr>
                                <td class="px-4 py-3">{{ $user->id }}</td>
                                <td class="px-4 py-3">{{ $user->name}}</td>
                                {{-- <td class="px-4 py-3">{{ $speaker->email }}</td> --}}
                                <td class="px-4 py-3 text-lg text-gray-900">{{ $user->created_at->diffForHumans() }}</td>
                                <td class="px-4 py-3 text-center flex">
                                  <button onclick="location.href='{{ route('admin.users.edit', ['user' => $user->id]) }}'" class="flex mx-auto text-gray-900 bg-green-300 border-0 py-2 md:px-8 focus:outline-none hover:bg-green-600 rounded text-sm">編集する</button>
                                <form id="delete_{{ $user->id }}" action="{{ route('admin.users.destroy', ['user' => $user->id] )}}" method="post">
                                  @csrf
                                  @method('delete')
                                    <a href="#" data-id="{{ $user->id }}" onclick="deletePost(this)" class="flex mx-auto text-gray-900 bg-slate-300 border-0 py-2 md:px-4 focus:outline-none hover:bg-slate-500 rounded text-sm">削除</a>
                                  </td>
                                </form>
                              </tr>
                            </tbody>
                    @endforeach
                          </table>
                        {{ $users->links() }}
                        </div>
                      </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
      function deletePost(e) {
        'use strict'
        if(confirm('本当に削除していいですか。')) {
          document.getElementById('delete_' + e.dataset.id).submit();
        }
      }
    </script>
</x-app-layout>
