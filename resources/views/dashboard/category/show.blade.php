@extends('layouts.dashboard')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- main category details--}}
        <div class="row mb-12 g-6">
            <div class="col-md">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-2">
                            <img class="card-img card-img-left" src="{{ asset('storage/' . $category->image)}}" alt="Card image" />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$category->name}}</h5>
                                <p class="card-text">
                                   {{$category->description}}
                                </p>
                                <p class="card-text"><small class="text-muted">{{$category->created_at->format('Y/m/d')}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- main category details--}}
        <div class="row row-cols-1 row-cols-md-3 g-6 mb-6">
           @foreach($subCategories as $subCategory)
                <div class="col-md-3">
                    <div class="card h-100">

                        <img class="card-img-top" src="{{asset('storage/' . $subCategory->image )}}" alt="Card image cap" height="250" />
                        <div class="card-body">
                            <h5 class="card-title">{{$subCategory->name}}</h5>
                        </div>
                    </div>
                </div>
           @endforeach



        </div>


    </div>

    <!-- / Content -->
@endsection
