@extends('backend.layout.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header" style=" padding: 7px .5rem !important;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.product.index', $product->slug)}}">{{$product->name}}</a></li>
                        <li class="breadcrumb-item active">{{$product->name}}'s Benefit's</a></li>
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
                            <h3 class="card-title">Edit Benefit</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="{{ route('admin.product-benefit.update', [$product->slug, $productBenefit->id]) }}"
                            name="form" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @include('backend.product-benefit.form')
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.product-benefit.index', $product->slug) }}" class="btn btn-danger">
                                    <i class="fa fa-times-circle"></i> Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('additional_scripts')
<script>
    $(document).ready(function() {
        var imagesUrl = [

<?php
    foreach($product->productImages as $key => $image){
        echo '"'. $image->image_path . '"'. ', ' ;
    }
?>
    ]

    var imagesKeyId = [

<?php
    foreach($product->productImages as $key => $image){
        $id = $image->id;
        if ($key == 0) {
            echo "{'key' : " . $id . "}";
        } else {
            echo ",{'key' : " . $id . "}";
        }
    }
?>
    ]

        $("#fileUploader").fileinput({
            initialPreview: imagesUrl,
            deleteUrl: "<?php echo route('admin.product.deleteImage'); ?>",
            initialPreviewAsData: true,
            initialPreviewConfig: imagesKeyId,
            theme: "explorer-fa",
            showUpload: false
        });



         $('#categoryIdField').change(function(){
            $('#subCategoryIdField').attr('disabled', true);
            $('#subCategoryIdField').empty();
            var _token = $('input[name=_token]').val();
            var category_id = $(this).val();
            var url = $(this).data('url');
            $.post(url, {_token, category_id}, function(response){
                if(response && response.length){
                    $.each(response, function(key, value){
                        $('#subCategoryIdField')
                        .append($("<option></option>")
                        .attr("value", value.id)
                        .text(value.name));
                    });
                    $('#subCategoryIdField').attr('disabled', false);
                }
            });
        });
});
</script>
@endsection

