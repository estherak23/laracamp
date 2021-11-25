@extends('layouts.app')
@section('content')
    
    <section class="checkout">
        <div class="container">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        YOUR FUTURE CAREER
                    </p>
                    <h2 class="primary-header">
                        Start Invest Today
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-5 col-12">
                            <div class="item-bootcamp">
                                <img src="{{ asset('/images/item_bootcamp.png') }}" alt="" class="cover">
                                <h1 class="package text-uppercase">
                                    {{ $camp->title }}
                                </h1>
                                <p class="description">
                                    Bootcamp ini akan mengajak Anda untuk belajar penuh mulai dari pengenalan dasar sampai membangun sebuah projek asli
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-1 col-12"></div>
                        <div class="col-lg-6 col-12">
                            <form action="{{route('checkout.store',$camp->id)}}" class="basic-form" method="POST">
                                {{-- kalo post harus pake csrf --}}
                                @csrf

                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                                    <input  name='name'  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->name }}">
                                
                                {{-- untuk alert kalo gak sesuai validasi yg udah dibikin --}}
                                    @if ($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>

                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                                    <input  name='email' type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Occupation</label>
                                    {{-- value old itu kalo salah ngisi nanti otomatis keisi yg sebelomnya kita isi --}}
                                    <input name='occupation' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('occupation') ?:Auth::user()->occupation }}">
                               
                                    @if ($errors->has('occupation'))
                                    <p class="text-danger">{{ $errors->first('occupation') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label">Card Number</label>
                                    <input name='card_number' type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('occupation')}}">
                                
                                    @if ($errors->has('card_number'))
                                    <p class="text-danger">{{ $errors->first('card_number') }}</p>
                                  @endif
                                </div>
                                <div class="mb-5">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <label for="exampleInputEmail1" class="form-label">Expired</label>
                                            <input name='expired' type="month" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('expired')}}">
                                            @if ($errors->has('expired'))
                                            <p class="text-danger">{{ $errors->first('expired') }}</p>
                                            @endif
                                        </div>

                                        <div class="col-lg-6 col-12">
                                            <label for="exampleInputEmail1" class="form-label" maxlength="3">CVC</label>
                                            <input name='cvc' type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('cvc')}}">
                                        
                                            @if ($errors->has('cvc'))
                                            <p class="text-danger">{{ $errors->first('cvc') }}</p>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="w-100 btn btn-primary">Pay Now</button>
                                <p class="text-center subheader mt-4">
                                    <img src="{{ asset('/images/bc_secure.svg') }}" alt=""> Your payment is secure and encrypted.
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection