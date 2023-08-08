@props([
    'title'=> '初期値ですタイトル',
    'message' => '初期値です',
    'content' => '初期値です２'
])

<div {{ $attributes->merge(['class' => 'border-2 shadow-md w-1/4 0-2']) }} >
    <div>{{ $title }}</div>
    <div>画像</div>
    <div>{{ $content }}</div>
    <div>{{ $message }}</div>
</div>