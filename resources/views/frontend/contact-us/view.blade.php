@extends('frontend.layout.master')
@section('content')
<div class="container py-5">
    <div class="card card-body">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <img src="http://www.venttura.in/frontend/uploads/page/1620140029.png" class="object-fit-contain"
                    height="300px" alt="">
                <hr>
            </div>
            <div class="col-md-6">
                <form action="{{route('frontend.contact-us.save')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" required name="name">
                        </div>
                        <div class="col-md-12">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" required name="email">
                        </div>
                        <div class="col-md-12">
                            <label for="phone_no">Phone No.</label>
                            <input type="tel" id="phone_no" class="form-control" required name="phone_no">
                        </div>
                        <div class="col-md-12">
                            <label for="phone_no">Comment</label>
                            <textarea required name="comment" class="form-control" id="" cols="30" rows="5"></textarea>
                        </div>
                        <div class="col-md-12">
                           <button class="btn btn-buy-now">
                               Contact me
                           </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <p style="text-align: center; ">
                    <font color="#000000">Venttura BIOceuticals Pvt Ltd&nbsp;</font>
                </p>
                <p style="text-align: center;"><b>
                        <font color="#000000">Address -&nbsp;&nbsp;</font>
                    </b></p>
                <p style="text-align: center;"><span style="font-size: 1rem;">
                        <font color="#000000">'PRITHVI COMPLEX'</font>
                    </span></p>
                <p style="text-align: center;">
                    <font color="#000000">A-1/104A, A-1/104B,&nbsp;</font>
                </p>
                <p style="text-align: center;">
                    <font color="#000000">1st Floor, RETIBUNDER ROAD,&nbsp;</font>
                </p>
                <p style="text-align: center;">
                    <font color="#000000">KALHER,&nbsp; BHIWANDI-421302</font>
                </p>
                <p style="text-align: center;">
                    <font color="#000000"><b>Customer Care</b> : +919833103030</font>
                </p>
                <p style="text-align: center; ">
                    <font color="#000000"><b>Email</b>: ventturacare@gmail.com</font>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
