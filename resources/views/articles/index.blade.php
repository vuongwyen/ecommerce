@extends('layouts.app')

@section('title', 'Articles')
@section('meta_description', 'Browse our latest articles.')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Articles</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($articles as $article)
        <div class="bg-white rounded shadow p-4 flex flex-col">
            @if ($article->featured_image)
            <a href="{{ route('articles.show', $article->slug) }}">
                <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="mb-4 rounded h-48 w-full object-cover">
            </a>
            @endif
            <a href="{{ route('articles.show', $article->slug) }}" class="text-xl font-semibold hover:underline mb-2">{{ $article->title }}</a>
            <p class="text-gray-600 text-sm mb-2">By {{ $article->author->name ?? 'Unknown' }} &middot; {{ $article->published_at ? $article->published_at->format('M d, Y') : '' }}</p>
            <p class="mb-4">{{ $article->excerpt }}</p>
            <a href="{{ route('articles.show', $article->slug) }}" class="mt-auto text-blue-600 hover:underline">Read More</a>
        </div>
        @endforeach
    </div>
    <div class="mt-8">
        {{ $articles->links() }}
    </div>
</div>
@endsection