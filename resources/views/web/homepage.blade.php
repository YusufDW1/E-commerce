<x-layout>
    <div class="container my-4">
        <h3 class="mb-4">Categories</h3>
        <div class="row g-4">
            @foreach($categories as $category)
                <div class="col-2">
                    <div class="card">
                        <img src="{{ $category['image'] }}" class="card-img-top" alt="{{ $category['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category['name'] }}</h5>
                            <p class="card-text">{{ $category['description'] }}</p>
                            <a href="/category/{{ $category['slug'] }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
