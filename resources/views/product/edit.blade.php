@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">New Product  </div>
                    <div class="card-body">

                        {!! Form::model($product, ['method' =>'PATCH', 'route' => ['product.update', $product->id], 'files' => true]) !!}

                            @include('product.form')
                            <p>
                                <img src="{{asset('store-pictures')}}/{{$product->picture}}" width="100">
                            </p>
                            <div class="pull-right">
                                {!! Form::submit("Update", ['class' => 'btn btn-primary']) !!}
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
