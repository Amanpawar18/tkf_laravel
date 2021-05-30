@extends('frontend.profile.layout')
@section('profile-content')
<div class="card">
    <div class="card-header">Addresses</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Pincode</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($addresses as $key => $address)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $address->first_name .' '. $address->last_name  }}</td>
                            <td>{{ Str::limit($address->address_in_string, 40) }}</td>
                            <td>{{ $address->pin_code }}</td>
                            <td>
                                <form action="{{route('frontend.address.destroy', $address->id)}}" method="POST">
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-sm" href="{{route('frontend.address.edit', $address->id)}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                {{$addresses->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
