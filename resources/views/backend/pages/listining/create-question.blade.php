@extends('index')
@section('content')
    <div class="app-ecommerce">

        <!-- Add Product -->
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1">Add a new Question</h4>
                <p class="mb-0">Orders placed across your store</p>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-4">
                <div class="d-flex gap-4">
                    <button class="btn btn-label-secondary">Discard</button>
                    <button class="btn btn-label-primary">Save draft</button>
                </div>

            </div>
        </div>

    </div>


@endsection
