@extends('app')

@section('content')
<div class="  d-flex justify-content-center">
    @if(auth()->check() == false)
    <a href="{{route('login')}}" class="mx-3 btn btn-primary">Login</a>
    <a href="{{route('register')}}" class="btn btn-info">register</a>
    @else
    <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
    <a href="" class="btn btn-success">
    Hellow  {{auth()->user()->name}}
    </a>
    @endif
</div>
    <div class="row">
        <div class="col-md-3">
            <div class="card mt-2"   >
                <div class="card-body p-0">
                    {{-- image  --}}
                    <img src="{{asset('simba.jpg')}}" alt="" class="img img-fluid" >
                   <div class="p-2">
                     {{-- title  --}}
                     <h3>Jezi mpya thimba</h3>
                     {{-- price  --}}
                     <h4>Tsh 35,000</h4>
                      {{-- description --}}
                      <p>Jezi mpya za simba kwa bei nafuu , delivery mpaka mlangoni kwako</p>
                      <button class="btn btn-danger btn-sm form-control">
                        Nunua
                      </button>
                   </div>
                </div>
            </div>
        </div>


    </div>

@endsection
