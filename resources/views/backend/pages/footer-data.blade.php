@extends('backend.layout.master')
@section('content')
<style>
    .note-toolbar.card-header {
        background: white !important;
        background-color: white;
    }
</style>
<div class="content-wrapper">
    <div class="content-header" style=" padding: 7px .5rem !important;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Footer Data</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Footer Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{ route('admin.footer-data.update') }}" name="form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                {{-- Section-links Start --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>
                                            <u>
                                                Section-1 (Links)
                                            </u>
                                        </h5>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image one</label>
                                            <div class="custom-file">
                                                <input type="file" name="image_one" class="custom-file-input"
                                                    id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image one link</label>
                                            <input type="url" name="image_one_link" class="form-control"
                                                value="{{isset($footerData->image_one_link)? $footerData->image_one_link : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image two</label>
                                            <div class="custom-file">
                                                <input type="file" name="image_two" class="custom-file-input"
                                                    id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image two link</label>
                                            <input type="url" name="image_two_link" class="form-control"
                                                value="{{isset($footerData->image_two_link)? $footerData->image_two_link : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image three</label>
                                            <div class="custom-file">
                                                <input type="file" name="image_three" class="custom-file-input"
                                                    id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image three link</label>
                                            <input type="url" name="image_three_link" class="form-control"
                                                value="{{isset($footerData->image_three_link)? $footerData->image_three_link : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image four</label>
                                            <div class="custom-file">
                                                <input type="file" name="image_four" class="custom-file-input"
                                                    id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image four link</label>
                                            <input type="url" name="image_four_link" class="form-control"
                                                value="{{isset($footerData->image_four_link)? $footerData->image_four_link : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image five</label>
                                            <div class="custom-file">
                                                <input type="file" name="image_five" class="custom-file-input"
                                                    id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image five link</label>
                                            <input type="url" name="image_five_link" class="form-control"
                                                value="{{isset($footerData->image_five_link)? $footerData->image_five_link : ''}}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Contact us link</label>
                                            <input type="url" name="contact_us_link" class="form-control"
                                                value="{{isset($footerData->contact_us_link)? $footerData->contact_us_link : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Terms of use link</label>
                                            <input type="url" name="terms_of_use_link" class="form-control"
                                                value="{{isset($footerData->terms_of_use_link)? $footerData->terms_of_use_link : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Privacy policy link</label>
                                            <input type="url" name="privacy_policy_link" class="form-control"
                                                value="{{isset($footerData->privacy_policy_link)? $footerData->privacy_policy_link : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Order link</label>
                                            <input type="url" name="order_link" class="form-control"
                                                value="{{isset($footerData->order_link)? $footerData->order_link : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Shipping link</label>
                                            <input type="url" name="shipping_link" class="form-control"
                                                value="{{isset($footerData->shipping_link)? $footerData->shipping_link : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Who we are link</label>
                                            <input type="url" name="who_we_are_link" class="form-control"
                                                value="{{isset($footerData->who_we_are_link)? $footerData->who_we_are_link : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Product faqs link</label>
                                            <input type="url" name="product_faqs_link" class="form-control"
                                                value="{{isset($footerData->product_faqs_link)? $footerData->product_faqs_link : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Science link</label>
                                            <input type="url" name="science_link" class="form-control"
                                                value="{{isset($footerData->science_link)? $footerData->science_link : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Quality link</label>
                                            <input type="url" name="quality_link" class="form-control"
                                                value="{{isset($footerData->quality_link)? $footerData->quality_link : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Buddy club link</label>
                                            <input type="url" name="buddy_club_link" class="form-control"
                                                value="{{isset($footerData->buddy_club_link)? $footerData->buddy_club_link : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Subscribe link</label>
                                            <input type="url" name="subscribe_link" class="form-control"
                                                value="{{isset($footerData->subscribe_link)? $footerData->subscribe_link : ''}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Affiliate link</label>
                                            <input type="url" name="affiliate_link" class="form-control"
                                                value="{{isset($footerData->affiliate_link)? $footerData->affiliate_link : ''}}">
                                        </div>
                                    </div>
                                </div>
                                {{-- Section-links End --}}

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
