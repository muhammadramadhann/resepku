<x-app-layout title="Home">
    <h4 class="mb-4">Resep Terbaru</h4>
    <section class="recipe-item row justify-content-between align-items-center">
        @foreach ($recipes as $recipe)
            <x-recipe-item identifier="{{ $recipe->identifier }}" likes="{{ $recipe->likes }}" title="{{ $recipe->title }}" image="{{ $recipe->image }}" excerpt="{{ $recipe->excerpt }}" />
        @endforeach
    </section>
</x-app-layout>