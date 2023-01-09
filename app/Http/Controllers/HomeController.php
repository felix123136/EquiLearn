<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = [
            [
                "imageUrl" => "assets/images/direct-container-sourcing.webp",
                "imageAlt" => "Direct Container Sourcing",
                "title" => "Direct Container Sourcing",
                "description" => "By sourcing our containers directly from
                manufacturers, we are able to offer the highest
                quality products at competitive prices."
            ],
            [
                "imageUrl" => "assets/images/flexible-payment.jpg",
                "imageAlt" => "Flexible Payment Options",
                "title" => "Flexible Payment Options",
                "description" => "We understand that paying for music can be a
                challenge, which is why we offer a variety of
                flexible payment options to suit your needs."
            ],
            [
                "imageUrl" => "assets/images/headset.png",
                "imageAlt" => "Music and More",
                "title" => "Music and More",
                "description" => "At Baktify, we don't just sell music - we also offer
                a wide range of related products and services,
                including headphones, turntables, and more."
            ]
        ];
        return view('home', [
            'services' => $services
        ]);
    }

    public function aboutUs()
    {
        return view('about-us');
    }
}
