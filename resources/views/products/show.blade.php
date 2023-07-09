@extends('layouts.main')
@section('start')

    <body>
    <main>

        <section class="py-5 text-center container ">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Show page</h1>
                    <p class="lead text-muted">Информация товара</p>
                </div>
            </div>
        </section>

        <div style="background-image: url('https://look.com.ua/pic/201209/2560x1600/look.com.ua-36303.jpg');">
        <div class="row">


                    <div class="album py-3 ">
                        <div class="container ">


                                <div class="col">
                                    <div class="card shadow-sm">
                                        <img src="https://mobimg.b-cdn.net/v3/fetch/66/66b574587fa31ae228339305fb41db3b.jpeg" class="bd-placeholder-img card-img-top" alt="pizda" >


                                        <div class="card-body">
                                            @foreach($product->categories as $category)
                                            <small class="text-muted rounded-3" > Категория: {{$category->name}}</small>
                                            @endforeach
                                            <h5 class="card-text">{{$product->name}}</h5>
                                            <h6 class="card-text">{{$product->description}}</h6>

                                            <div class="d-flex justify-content-between align-items-center " >
                                                <div class="btn-group rounded-3 ">


                                                    @auth('web')
                                                        <p class="lead mb-0 p-3  rounded-3 "><a class=" fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                Купить товар
                                                            </a></p>



                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-black">


                                                                <form method="POST" action="{{ route('order.store') }}">
                                                                    @csrf
                                                                    <div class="mb-3">

                                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                        <input type="hidden" name="nameUser" value="{{ Auth::user()->name}}">
                                                                        <input type="hidden" name="emailUser" value="{{ Auth::user()->email}}">
                                                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">

                                                                        <div>
                                                                            <label for="quantity">Количество</label>
                                                                            <input id="quantity" type="number" name="quantity" value="1">
                                                                        </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-secondary">Купить</button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                    @endauth

                                            </div>
                                                <div class="p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 ">
                                                    Price: {{$product->price}}$
                                                </div>
                                        </div>
                                                <small class="text-muted rounded-3" >{{$product->created_at}}</small>
                                    </div>
                                </div>

                                    <x-app-layout>
                                    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                                        <form method="POST" action="{{ route('comments.store') }}">
                                            @csrf
                                            <textarea
                                                name="message"
                                                placeholder="{{ __('') }}"
                                                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                            >{{ old('message') }}</textarea>

                                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>
                                        </form>
                                        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
                                            @foreach ($comments as $comment)
                                                <div class="p-6 flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                    </svg>
                                                    <div class="flex-1">
                                                        <div class="flex justify-between items-center">
                                                            <div>
                                                                <span class="text-gray-800">{{ $comment->user->name }}</span>
                                                                <div><span class="text-gray-800">Коментирует продукт №{{ $comment->product_id }}</span></div>

                                                                <small class="ml-2 text-sm text-gray-600">{{ $comment->created_at->format('j M Y, g:i a') }}</small>
                                                            </div>
                                                        </div>
                                                        <p class="mt-4 text-lg text-gray-900">{{ $comment->message }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                        </x-app-layout>


                        </div>
                    </div>
                </div>


    <footer class="text-muted py-5">
        <div class="container">

        </div>
    </footer>





    </body>
    </html>

@endsection
