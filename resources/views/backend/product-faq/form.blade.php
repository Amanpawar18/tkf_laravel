<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="form-group">
            <label for="productTitleInput" class="text-capitalize">
                Faq heading
            </label>
            <input type="text" class="form-control" name="faq_heading"
                value="{{old('faq_heading', $productFaq->faq_heading)}}" placeholder="Name" required>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="categoryTitleInput" required class="text-capitalize">Faq description</label>
            <textarea name="faq_description" class="form-control textarea" id="" cols="30"
                rows="10">{{old('faq_description', $productFaq->faq_description)}}</textarea>
        </div>
    </div>
</div>
