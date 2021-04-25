<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="US_size">US Size</label>
                <input id="US_size" type="number" min="1" required name="US_size" class="form-control"
                    value="{{$chart->US_size ?? old('US_size')}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="EU_size">EU Size</label>
                <input id="EU_size" type="number" min="1" required name="EU_size" class="form-control"
                    value="{{$chart->EU_size ?? old('EU_size')}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="UK_size">UK Size</label>
                <input id="UK_size" type="number" min="1" required name="UK_size" class="form-control"
                    value="{{$chart->UK_size ?? old('UK_size')}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="cm">Cm</label>
                <input id="cm" type="number" min="1" required name="cm" class="form-control"
                    value="{{$chart->cm ?? old('cm')}}">
            </div>
        </div>
    </div>
</div>
