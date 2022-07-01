<x-app-layout title="Home">
    @if ($recipes->isEmpty())
        <x-recipe-empty/>
    @else
        <h4 class="mb-4">Resep Terbaru</h4>
        <section class="recipe-item row justify-content-between align-items-center">
            @foreach ($recipes as $recipe)
                <x-recipe-item 
                    slug="{{ $recipe->slug }}" 
                    likes="{{ $recipe->likes }}" 
                    title="{{ $recipe->title }}" 
                    image="{{ $recipe->image }}" 
                    excerpt="{{ $recipe->excerpt }}" />
            @endforeach
        </section>
    @endif
</x-app-layout>