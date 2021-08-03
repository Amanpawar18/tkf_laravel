<div class="row">
    <div class="mb-3 col-md-4">
        <label for="product_id">Choose product</label>
        <select name="product_id" id="product_id" required class="form-control">
            @foreach ($products as $product)
            <option value="{{$product->id}}" {{$clientExperience->product_id == $product->id ? 'selected' : ''}}>
                {{$product->name}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 col-md-4">
        <label for="user_name">User Name</label>
        <input type="text" name="user_name" class="form-control" id="user_name" required
            value="{{$clientExperience->user_name ?? old('user_name')}}">
    </div>
    <div class="mb-3 col-md-4">
        <label for="user_email">User Email</label>
        <input type="text" name="user_email" class="form-control" id="user_email" required
            value="{{$clientExperience->user_email ?? old('user_email')}}">
    </div>
    <div class="mb-3 col-md-12">
        <label for="image">Image</label>
        <div class="custom-file">
            <input type="file" name="image" class="form-control" id="image"
                {{$clientExperience->image ? '' : 'required'}}>
            <label class="custom-file-label" for="image">Choose file</label>
        </div>
    </div>
    <div class="mb-3 col-md-12">
        <label for="description">Descrption</label>
        <textarea name="description" id="description" cols="30" required class="form-control"
            rows="2">{{$clientExperience->description}}</textarea>
    </div>
</div>
