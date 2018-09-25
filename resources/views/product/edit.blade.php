@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">New Product  </div>
                    <div class="card-body">

                        {!! Form::model($product, ['route' => ['user.update', $product->id], 'files' => true]) !!}

                            {{-- @include('product.form') --}}

                            <div class="btn-group pull-right">
                                {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
                                {!! Form::submit("Update", ['class' => 'btn btn-primary']) !!}
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
