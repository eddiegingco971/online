@extends('layouts.app')

@section('content')

<div class="py-3 py-md-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Categories</h4>
            </div>

            @foreach ($categories as $category)
            <div class="col-6 col-md-3">
                <div class="category-card">
                    <a href="{{url('/collections/'.$category->category_name)}}">
                        <div class="category-card-img">
                            <img src="{{asset('dist/img/category/'.$category->image)}}" class="w-100" alt="Laptop">
                        </div>
                        <div class="category-card-body">
                            <h5>{{$category->category_name}}</h5>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        {{-- <div class="col-md-12 offset-md-5">
            <div class=" btn">{{$categories->links()}}</div>
        </div> --}}
    </div>
</div>


@endsection
