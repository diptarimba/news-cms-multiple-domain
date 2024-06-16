@props(['content' => null])
<div class="grid grid-cols-1 gap-6">
    @isset($content)
        @foreach ($content as $each)
            @include('components.template.redeye.spoiler-post', [
                'category' => $each->category->name,
                'title' => $each->title,
                'date' => $each->posted_at,
                'content' => $each->spoiler,
                'image' => $each->image,
                'url' => route('news.show', ['slug' => $each->slug]),
            ])
        @endforeach
    @endisset
</div>
