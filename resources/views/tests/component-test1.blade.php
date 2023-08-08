<x-tests.app>
    <x-slot name="header">ヘッダー</x-slot>
    コンポーネント１
    <x-tests.card title="タイトル" content="本文" :message="$message"/>
    <x-tests.card title="タイトル２" />
    <x-tests.card title="これだけ違うデザインにしたい" class="bg-red-300"/>


    <x-test-class-base classBaseMessage="メッセージです(初期値で表示)" />
    <div class="mb-4"></div>
    <x-test-class-base classBaseMessage="メッセージです(初期値を変更して表示)" defaultMessage="これがオリジナルのメッセージ" />
</x-tests.app>
