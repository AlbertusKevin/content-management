@extends('partial.main')
@section('content')
    <div class="row mt-4">
        <div class="col-md-12">
            <h5 class="d-inline-block align-middle">{{ $module }}</h5>
            <div class="card">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
@endsection
