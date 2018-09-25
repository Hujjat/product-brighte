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
                    <div class="card-header">Product Lists
                        <a href="{{route('product.create')}}" class="btn btn-primary float-right">Add New</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                        <img src="{{asset('store-pictures').'/'.$product->picture}} " alt="Product Photo" width="40">
                                        </td>
                                        <td> {{$product->name}} </td>
                                        <td> ${{$product->price}} </td>
                                        <td>
                                            <a href="#edit">Edit</a> |

                                                <form class="form-inline d-inline" onsubmit="return confirm('Do you really want to delete?');"               action="{{ route('product.destroy',[$product->id]) }}"             method="POST" >
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE" />
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
