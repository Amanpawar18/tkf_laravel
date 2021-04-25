@extends('frontend.layout.master')

@section('content')
<section id="login" class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        Hii {{Auth::user()->name}},
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
