<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset($course->picture) }}" alt="{{ $course->name }}" class="w-100">
            </div>
            <div class="col-md-6">
                <h1 class="mb-4">{{ $course->name }}</h1>
                <p class="text-muted mb-4">Category: {{ $course->category->name }}</p>
                <h2 class="mb-4">IDR {{number_format($course->price)}}</h2>
                <p>{{ $course->description }}</p>
            </div>
        </div>
    </div>
</x-layout>