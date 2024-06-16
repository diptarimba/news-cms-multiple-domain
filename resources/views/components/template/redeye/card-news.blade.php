@props(['content' => null])
<section class="mb-8">
    <h2 class="text-2xl font-bold mb-4">
        Latest News
    </h2>
    <div class="space-y-4">
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
</section>
