<x-layout>     
    <div class="container mt-5 pt-5">
        <h1 class="text-white text-center mb-5 pb-5">My Courses</h1>
        <div class="mt-3">
            @include('partials._my-search')
        </div>
        <div class="row mt-5">
            @unless (count($courses) == 0)
                @foreach($courses as $course)
                <div class="col-md-4">
                    <x-my-course-card :course="$course" />
                </div>
                @endforeach
            @else
                @if(count($query) == 0)
                    <p class="mb-5">No Courses Found</p>
                @else
                    <p class="mb-5 text-white" style="min-height:17vh;">No Course Match for '{{$query['search']}}'</p>
                @endif
            @endunless
        </div>
        <div class="mt-2 p-1">
            {{$courses->links()}}
        </div>
    </div>    
</x-layout>