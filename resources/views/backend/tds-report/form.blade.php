<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="report">User</label>
                <input list="users" name="user_email" id="user_email" class="form-control"
                    value="{{$tdsReport->user->email ?? old('user_email')}}">
                <datalist id="users">
                    @foreach ($users as $user)
                    <option value="{{$user->email}}">
                        {{$user->name}}
                    </option>
                    @endforeach
                </datalist>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="report">Tds Report</label>
                <div class="custom-file">
                    <input id="report" type="file" name="report" class="custom-file-input"
                        {{$tdsReport->report ? '' : 'required'}} value="{{$tdsReport->report ?? old('report')}}">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="period_end">Period Start</label>
                <input id="period_start" type="date" name="period_start" class="form-control"
                    {{$tdsReport->period_start ? '' : 'required'}} value="{{$tdsReport->period_start ?? old('period_start')}}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="period_end">Period End</label>
                <input id="period_end" type="date" name="period_end" class="form-control"
                    {{$tdsReport->period_end ? '' : 'required'}} value="{{$tdsReport->period_end ?? old('period_end')}}">
            </div>
        </div>
    </div>
</div>
