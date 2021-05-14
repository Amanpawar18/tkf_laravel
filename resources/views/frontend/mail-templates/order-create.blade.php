<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css" nonce="">
        body,
        td,
        div,
        p,
        a,
        input {
            font-family: arial, sans-serif;
        }

        body,
        td {
            font-size: 13px
        }

        p {
            color: #000;
            line-height: 150%;
            font-size: 16px;
            margin: 15px 0 0
        }

        .container {
            width: 60%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        /* @media (min-width: 768px) {
            .container {
                width: 750px;
            }
        }

        @media (min-width: 992px) {
            .container {
                width: 60%;
            }
        }

        @media (min-width: 1200px) {
            .container {
                width: 60%;
            }
        } */

        .button:hover {
            color: #000;
            border: 2px solid #d7b56d !important;
            background-color: #d7b56d !important;
        }

        table {
            width: 100%;
            text-align: left;
            border-spacing: 0;
            border-collapse: collapse;
            margin: 0 auto;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        tr {
            border-bottom: 1px solid grey;
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="https://ssl.gstatic.com/ui/v1/icons/mail/rfr/gmail.ico" type="image/x-icon">
    <title>Venttura - Your Order is confirmed</title>
</head>

<body cz-shortcut-listen="true" style="font-family: arial, sans-serif; paddin: 500px;">
    <div class="container" style="justify-content: center;">
        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
            <h2 style="font-weight:normal;font-size:24px;margin:0 0 10px">
                Your Order is Confirmed
            </h2>
        </p>
        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
            Hi {{Auth::check() ? Auth::user()->name : ''}},
        </p>
        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
            Your order is confirmed!
        </p>
        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
            And, we're wagging our tails withexcitement!
        </p>
        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
            We're busy getting your order ready for dispatch and will keep you updated along the way. In the meantime
            you can always review your order below.
        </p>
        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
            <b>COVID-19 Effect:</b>
        </p>
        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
            As you may be aware, there is a lockdown measure in place, as a nation-wide effort to combat the outbreak of
            COVID-19.
        </p>
        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
            As a result, we are unable to guarantee any delivery dates. However, as we are sure you can understand that
            it is very difficult to predict, and we're all in the same situation.
        </p>
        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
            We completely understand that certain items such as petsupplements are essential and you too must be eager
            to receive your orders to be able to feed your pet. However, this is situation is beyond our control.
        </p>
        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
            Continuing with your order is a sign of supporting us, and would really help business like ours during these
            difficult times.
        </p>
        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
            However, should you choose to cancel your order due to the delivery date, you can do so below
        </p>
    </div>
    <div style="text-align:center">
        <a href="{{route('frontend.home')}}" target="_blank" style="color: #000 !important;
            background-color: #d7b56d;
            text-transform: uppercase;
            width: auto;
            color: #000;
            border: 2px solid #000;
            text-decoration: none !important;
            border-radius: 0;
            font-weight: 900;
            padding: 10px;
            margin-top: 20px;
            display: inline-block;
            line-height: 1.5;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;">
            View your order
        </a>
    </div>
    <hr style="margin: 30px">
    <div class="container">
        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
            <h2 style="font-weight:normal;font-size:24px;margin:0 0 10px">
                Order Summmary
            </h2>
        </p>
        <table style="width: 100%">
            <tbody>
                @foreach ($order->orderProducts as $orderProduct)
                <tr class="bordered">
                    <td style="width: 65px">
                        <img src="{{$orderProduct->product->image_path}}" align="left" width="60" height="60"
                            style="margin-right:15px;border-radius:8px;border:1px solid #e5e5e5">
                    </td>
                    <td>
                        <span style="font-size:16px;font-weight:600;line-height:1.4;color:#555">
                            {{$orderProduct->product->name}}
                            &nbsp;×&nbsp;{{$orderProduct->quantity}}
                        </span>
                        <br>
                        <span style="font-size:14px;color:#999">{{$orderProduct->variation}}</span><br>
                    </td>
                    <td>
                        <p style="color:#555;line-height:150%;font-size:16px;font-weight:600;margin:0 0 0 15px"
                            align="right">
                            ₹{{$orderProduct->amount}}
                        </p>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2" align="right" style="border-top: 1px solid black;">
                        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
                            SubTotal
                        </p>
                    </td>
                    <td align="right" style="border-top: 1px solid black;">
                        <strong style="font-size:16px;color:#555">
                            ₹{{$order->total_amount}}
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
                            Shipping
                        </p>
                    </td>
                    <td align="right">
                        <strong style="font-size:16px;color:#555">
                            ₹50
                        </strong>
                    </td>
                </tr <tr>
                <td colspan="2" align="right">
                    <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
                        Total
                    </p>
                </td>
                <td align="right">
                    <strong style="font-size:16px;color:#555">
                        ₹{{$order->total_amount + 50}}
                    </strong>
                </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
            <h2 style="font-weight:normal;font-size:24px;">
                Customer Information
            </h2>
        </p>
    </div>
    <div class="container" style="overflow-x:auto;-webkit-overflow-scrolling:touch">
        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
            <strong>Shipping address</strong>
            <br>
            {!! $order->shippingAddress->address_in_text !!}
        </p>
        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
            <strong>Shipping Method</strong>
            <br>
            Delhivery express
        </p>
        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
            <strong>Payment Method</strong>
            <br>
            Razorpay
        </p>
    </div>
    <div class="container">
        <hr>
        <p style="color:#000;line-height:150%;font-size:16px;margin:15px 0 0">
            In case you have any questions or concerns regarding your order, our friendly customer happiness team are on
            standby to answer your questions. Get in touch with us anytime at ventturacare@gmail.com or call us on
            9833103030
        </p>
    </div>
</body>

</html>
