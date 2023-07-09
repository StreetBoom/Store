@extends('layouts.main')
@section('start')

    <body>


    <section class="py-5 text-center container ">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Basket page</h1>
                <p class="lead text-muted">Корзина товара</p>
            </div>
        </div>
    </section>




    @foreach($products as $product)
    <div class="card ">

        <div class="card-body ">
            <h5 class="card-title">Товар</h5>
            <h6 class="card-text">Название: {{$product->name}}</h6>
            <h6 class="card-text">Описание: {{$product->description}}</h6>
            <h6 class="card-text">Цена: {{$product->price}}</h6>
            <a href="{{route('product.show',$product->id)}}" class="btn btn-primary">Открыть товар</a>
        </div>
    </div>
    @endforeach

    <footer class="text-muted py-5">
        <div class="container">

        </div>
    </footer>


    </body>

    </html>

@endsection
