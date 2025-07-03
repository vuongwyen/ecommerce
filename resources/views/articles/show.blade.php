@extends('layouts.app')

@section('title', $article->meta_title ?: $article->title)
@section('meta_description', $article->meta_description ?: $article->excerpt)

@section('content')
<div class="container mx-auto py-8 max-w-3xl">
    <h1 class="text-4xl font-bold mb-4">{{ $article->title }}</h1>
    <p class="text-gray-600 text-sm mb-6">By {{ $article->author->name ?? 'Unknown' }} &middot; {{ $article->published_at ? $article->published_at->format('M d, Y') : '' }}</p>
    @if ($article->featured_image)
    <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="mb-6 rounded w-full object-cover">
    @endif
    <div class="prose max-w-none">
        {!! $article->content !!}
    </div>
</div>
@endsection