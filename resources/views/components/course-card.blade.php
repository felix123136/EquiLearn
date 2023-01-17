<div class="card mb-3 text-white" style="background-color: rgb(0, 0, 25);">
    <img
        src="{{ asset($course->picture) }}"
        class="card-img-top"
        alt="{{ $course->name }}"
    />
    <div class="card-body">
        <h6><a href="/courses" class="card-title course-card-title text-decoration-none text-white">{{ $course->name }}</a></h6>
        <strong class="card-text mb-3 d-block">Rp. {{number_format($course->price)}}</strong>
        <a href="/my-courses/{{auth()->user()->id}}?category={{$course->category->name}}" class="card-text text-white p-2 mb-3 d-inline-block" style="background-color:  rgb(76, 15, 251); border-radius:30px; text-decoration: none;">{{ $course->category->name }}</a>
        <div class="d-flex justify-content-between mt-1">
        @if(auth()->check() && auth()->user()->isAdmin)
            <a href="/courses/{{$course->id}}/edit" class="btn btn-outline-primary">Edit Course</a>
            <form action="/courses/{{$course->id}}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">
                    Remove Course
                </button>
            </form>
        @else
            @guest
                <button onclick="alertAndRedirectToLoginPage()" class="btn btn-primary">Add to Cart</button>
                <a href="/courses/{{$course->id}}" class="btn btn-outline-primary">Course Details</a>
            @else
                @if(session()->has('cart.' . $course->id))
                    <a href="/cart" class="btn btn-outline-light">Go To Cart</a>
                @elseif(Auth::user()->courses->contains($course))
                    <a href="/my-courses/{{Auth::user()->id}}" class="btn btn-outline-light">Go to My Courses</a>
                @else
                    <form action="/courses/{{$course->id}}/add-to-cart" method="post">
                        @csrf
                        <button class="btn btn-primary">Add to Cart</button>
                    </form>
                @endif
                <a href="/courses/{{$course->id}}" class="btn btn-outline-primary">Course Details</a>
            @endguest
        @endif
        </div>
    </div>
</div>
