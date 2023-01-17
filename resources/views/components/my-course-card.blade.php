<div class="card mb-3 text-white" style="background-color: rgb(0, 0, 25);">
    <img
        src="{{ asset($course->picture) }}"
        class="card-img-top"
        alt="{{ $course->name }}"
    />
    <div class="card-body">
        <h6><a href="/courses/{{$course->id}}" class="card-title course-card-title text-decoration-none text-white">{{ $course->name }}</a></h6>
        <strong class="card-text mb-3 d-block">Rp. {{number_format($course->price)}}</strong>
        <a href="/my-courses/{{auth()->user()->id}}?category={{$course->category->name}}" class="card-text text-white p-2 mb-3 d-inline-block" style="background-color:  rgb(76, 15, 251); border-radius:30px; text-decoration: none;">{{ $course->category->name }}</a>
        <div class="d-flex justify-content-between mt-1">
            <a target="_blank" href="https://www.youtube.com/results?search_query={{$course->name}}" class="btn btn-outline-light">Go to Course</a>
            <a href="/courses/{{$course->id}}" class="btn btn-outline-primary">Course Details</a>
        </div>
    </div>
</div>
