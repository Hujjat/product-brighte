@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" width="100" src="{{asset('store-pictures')}}/{{$product->picture}}" alt="product image">
                            <div class="card-body">
                                <h5 class="card-title">{{$product->name}}</h5>
                                <p class="card-text">
                                    {{$product->description}}
                                </p>
                            </div>

                            <div class="card-body">
                                    <button type="button" class="btn btn-info">
                                        Add to Card <span class="badge badge-light">
                                           $ {{$product->price}}</span>
                                    </button>
                            </div>
                </div>
            </div>
        </div>
    </div>


@endsection
