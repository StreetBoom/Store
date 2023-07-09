@extends('layouts.main')
@section('start')

    <body>
    <main>

        <section class="py-5 text-center container ">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Index page</h1>
                    <p class="lead text-muted">Список товара</p>
                </div>
            </div>
        </section>
{{--        <form action="{{ route('products.filter') }}" method="GET">--}}
{{--            <label for="category">Choose a category:</label>--}}
{{--            <select name="category" id="category">--}}

{{--                @foreach ($categories as $category)--}}
{{--                    <option value="{{ $category->id }}">{{ $category->id == request('category') ? 'selected' : '' }}{{ $category->name }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            <button type="submit">Filter</button>--}}


{{--        </form>--}}
        <div style="background-image: url('https://look.com.ua/pic/201209/2560x1600/look.com.ua-36303.jpg');">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-1">
                    <div class="album py-3 ">
                        <div class="container ">


                                <div class="col">
                                    <div class="card shadow-sm">
                                        <img src="https://mobimg.b-cdn.net/v3/fetch/66/66b574587fa31ae228339305fb41db3b.jpeg" class="bd-placeholder-img card-img-top" alt="pizda" >


                                        <div class="card-body">
                                            @foreach($product->categories as $category)
                                            <small class="text-muted rounded-3" > Категория: {{$category->name}}</small>
                                            @endforeach
                                            <p class="card-text">{{$product->name}}</p>

                                            <div class="d-flex justify-content-between align-items-center " >
                                                <div class="btn-group rounded-3 ">
                                                    <a     href="{{route('product.show',$product->id)}}"   type="button" class="text-center btn btn-sm btn-outline-secondary p-3 ">Показать товар
                                                    </a>
                                                    <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle ">
                                                        Price: {{$product->price}}$
                                                    </div>

                                                </div>
                                                <small class="text-muted rounded-3" >{{$product->created_at}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
                @if ($loop->iteration % 3 == 0)
        </div>
        <div class="row">
            @endif
            @endforeach
        </div>
        </div>
        {{$products->links()}}
        </form>
    </main>

    <footer class="text-muted py-5">
        <div class="container">

        </div>
    </footer>





    </body>
    </html>

@endsection
