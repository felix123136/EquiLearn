@props(['service'])

<div class="col-md-4">
    <div class="card h-100">
        <img
            src="{{asset($service['imageUrl'])}}"
            class="card-img-top"
            alt="{{$service['imageAlt']}}"
        />
        <div class="card-body">
            <h3 class="card-title">{{$service['title']}}</h3>
            <p class="card-text">
                {{$service['description']}}
            </p>
        </div>
    </div>
</div>