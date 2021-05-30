<div class="row">
    <div class="col-md-12">
        <div class="form-group mb-2">
            <label for="exampleInputEmail1">Name</label>
            <input type="name" class="form-control" id="firstName" name="first_name" required
                value="{{$address->first_name ?? Auth::user()->name }}" aria-describedby="emailHelp">
        </div>
        <div class="form-group mb-2">
            <label for="exampleInputEmail1">Eamil</label>
            <input type="email" class="form-control" id="email" name="email" required
                value="{{$address->email ?? Auth::user()->email }}" aria-describedby="emailHelp">
        </div>

        <div class="form-group mb-2">
            <label for="addressInputFIeld">Address</label>
            <input type="text" class="form-control" id="addressInputFIeld" name="address"
                value="{{$address->address ?? old('address') }}" required>
        </div>


        <div class="form-group mb-2">
            <label for="exampleInputPassword1">Address 2</label>
            <input type="text" class="form-control" value="{{$address->apartment_no ?? old('apartment_no') }}"
                required name="apartment_no">
        </div>
        <div class="form-group mb-2">
            <label for="inputCountry">Country/Region</label>
            <input type="text" class="form-control" value="{{$address->country ?? old('country') }}" required
                name="country">
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="inputState">State</label>
                <input type="text" class="form-control" value="{{$address->state ?? old('state') }}" required
                    name="state">
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-2">
                    <label for="exampleInputPassword1">City </label>
                    <input type="text" class="form-control" value="{{$address->city ?? old('city') }}" required
                        name="city">
                </div>
            </div>
            <div class="col-sm-4">
                <label for="inputpin_code">Pin Code</label>
                <input type="number" class="form-control" value="{{$address->pin_code ?? old('pin_code') }}"
                    required name="pin_code" placeholder="ZIP code">
            </div>
        </div>
        <div class="form-group mb-2">
            <label for="exampleInputPassword1">Phone Number </label>

            <input type="tel" minlength="10" maxlength="10" name="phone_no"
                value="{{$address->phone_no ?? old('phone_no') }}" class="form-control" required>
        </div>
    </div>
</div>
