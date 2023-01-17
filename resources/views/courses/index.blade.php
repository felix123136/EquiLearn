<x-layout>
    <section class="hero-banner" style="background-image: url('https://static.vecteezy.com/system/resources/thumbnails/009/831/146/small/banner-web-template-abstract-blue-and-golden-wave-curved-lines-overlapping-layer-design-on-dark-blue-background-luxury-style-vector.jpg'); padding: 150px;">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-lg-12">
              <h1 class="text-center text-white mb-5">
                @if(auth()->check() && auth()->user()->isAdmin)
                    Welcome Admin
                @else
                    EquiLearn Courses
                @endif
              </h1>
              <h6 class="text-center text-white">
                @if(auth()->check() && auth()->user()->isAdmin)
                    Manage and monitor your platform's course, student and instructor data, track progress and more.
                @else
                    EquiLearn is an online platform that offers comprehensive and interactive courses, expert instructors and a supportive community. Sign up now to elevate your education and achieve equilibrium.
                @endif
              </h6>
              <div class="text-center mt-5">
                    @auth
                        @if(auth()->user()->isAdmin)
                            <a href="/courses/new" class="btn btn-outline-light btn-lg">Add Course</a>
                        @else
                            <a href="/my-courses/{{auth()->user()->id}}" class="btn btn-outline-light btn-lg">My Courses</a>
                        @endif
                    @else
                        <a href="/login" class="btn btn-outline-light btn-lg">Sign Up</a>
                    @endauth
              </div>
            </div>
          </div>
        </div>
      </section>        
    <div class="container mt-5 pt-5">
        <h1 class="text-white text-center mb-5 pb-5">Explore Courses</h1>
        <div class="mt-3">
            @include('partials._search')
        </div>
        <div class="row mt-5">
            @unless (count($courses) == 0)
                @foreach($courses as $course)
                <div class="col-md-4">
                    <x-course-card :course="$course" />
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