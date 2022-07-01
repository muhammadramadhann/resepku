<div class="col-xl-4 col-lg-6 col-12">
    <div class="card h-100 mb-md-5 mb-4">
        <a href="{{ route('detail-recipe', $slug) }}" class="text-decoration-none">
            <img src="images/recipe_images/{{ $image }}" class="card-img-top" alt="gambar-resep">
            <div class="card-body pb-0 px-0">
                <h6 class="card-subtitle mb-2 text-muted fw-normal"><span>{{ $likes }}</span> Orang Menyukai ini</h6>
                <h4 class="card-title text-resepku">{{ $title }}</h4>
            </div>
        </a>
        <div class="card-body py-0 px-0">
            <p class="card-text fw-normal text-black">{{ $excerpt }}</p>
        </div>
        <div class="card-body pb-0 px-0">
            <a href="" class="btn btn-secondary py-2 w-100" onclick="event.preventDefault()">Suka</a>
        </div>
    </div>
</div>
