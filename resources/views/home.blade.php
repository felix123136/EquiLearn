<x-layout>
    <div class="jumbotron jumbotron-fluid bg-light py-5 text-center">
        <div class="container">
            <h1 class="display-4 my-5">Welcome to Baktify</h1>
            <p class="lead">
                As a leading music store in Indonesia, we pride ourselves on
                offering a wide selection of the latest and greatest hits from all
                your favorite artists, as well as exceptional customer service. Our
                knowledgeable and friendly staff are always on hand to help you find
                the perfect album or recommend new releases, and we offer a range of
                convenient payment options to make your shopping experience as
                seamless as possible.
            </p>
            <img
                src="{{asset('assets/images/marketing-campaign.webp')}}"
                class="img-thumbnail mt-4 mx-auto"
                alt="Baktify Marketing Campaign"
                style="width: 500px; height: 300px;" 
            />
        </div>
    </div>
    
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <img
                    src="{{asset('assets/images/flag-store.webp')}}"
                    class="img-thumbnail"
                    alt="Baktify flagship store"
                    style="width: 500px; height: 300px;" 
                />
            </div>
            <div class="col-md-6">
                <h2>Our Flagship Store</h2>
                <p>
                    Our flagship store is a destination in and of itself, boasting a
                    vibrant and welcoming atmosphere. Take a look at the picture to
                    get a feel for the Baktify experience.
                </p>
                <p>
                    But don't just take our word for it - come visit us at one of
                    our many outlets across Indonesia and see for yourself why
                    Baktify is the go-to destination for all your music needs.
                </p>
                <a href="/about-us" class="btn btn-primary">Find a store</a>
            </div>
        </div>
    </div>
    
    <div class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-5">Our Services</h2>
            <div class="row">
                @foreach ($services as $service)
                    <x-service-card :service="$service" />
                @endforeach
            </div>
        </div>
    </div>    
</x-layout>
