@extends('app')

@section('content')
    <div class="row d-flex justify-content-center my-3">
        @if (auth()->check() == false)
            <a href="{{ route('login') }}" class="mx-3 btn btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-info">register</a>
        @else
            <a href="{{ route('logout') }}" class="btn btn-danger me-4">Logout</a>
            <a href="" class="btn btn-success">
                Hellow {{ auth()->user()->name }}
            </a>
    </div>
    @endif
    <div class="row">
        <div class="col-md-8">
            <div class="row">

                @foreach ($products as $product )
                <div class="col-md-4">
                    <div class="card mt-2">
                        <div class="card-body p-0">
                            {{-- image  --}}
                            <img src="/storage/images/{{ $product->image }}" alt="" class="img img-fluid">
                            <div class="p-2">
                                {{-- title  --}}
                                <h3>{{$product->title}}</h3>
                                {{-- price  --}}
                                <h4> <s>{{$product->original_price}}</s> | {{$product->current_price}}</h4>
                                {{-- description --}}
                                <p>{{$product->description}}</p>
                                <button class="btn btn-danger btn-sm form-control">
                                    Nunua
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
        @if (auth()->check() && auth()->user()->user_type == 'admin')
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Admin Add Product
                </div>
                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('saveProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title">

                        </div>
                        <div class="form-group">
                            <label for="">description</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                        <div class="form-group">
                            <label for="">Og Price</label>
                            <input type="text" class="form-control" name="original_price">
                        </div>
                        <div class="form-group">
                            <label for="">Current Price</label>
                            <input type="text" class="form-control" name="current_price">
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                </div>

                <button class="btn btn-success mt-3 form-control">
                    Save
                </button>

                </form>
            </div>
        </div>
        @elseif(auth()->check())
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    YOUR ORDERS
                </div>
                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif


                <div class="alert alert-warning">You dont have any order for now 😛</div>
            </div>
        </div>
        @else
        <div class="col-md-4">
            <img src="https://bloximages.chicago2.vip.townnews.com/406mtsports.com/content/tncms/assets/v3/editorial/1/be/1be3ebd2-8467-5bb4-a43f-e0e636497958/61ac02ef1c17e.image.jpg?resize=750%2C500" alt="" class="img img-fluid">
        </div>
        @endif
    </div>


@endsection
