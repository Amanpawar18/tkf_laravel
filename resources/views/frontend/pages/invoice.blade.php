<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoices</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        /* .invoice-box table tr.total td:nth-child(2) { */
        .invoice-box table tr.total {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .equal-width td {
                width: 100%;
            }
        }

        .equal-width td {
            width: 50%;
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title" style="vertical-align: middle">
                                <img width="152px" height="58px" src="{{asset('images/black-logo.jpeg')}}">
                            </td>

                            <td>
                                Invoice No.: {{$order->invoice_no ?? '-'}}<br />
                                Created: {{$order->created_at->format('d-M-Y')}}<br />
                                Bill No.: {{$order->bill_no ?? '-'}}<br />
                                Bill Date: {{$order->bill_date ? $order->bill_date->format('d-M-Y') : '-'}}<br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr class="equal-width">
                            <td>
                                <strong>
                                    Seller Address:
                                </strong>
                                <br>
                                {!! Setting::get('footer_address') ?? 'N/A' !!}
                            </td>
                            <td>
                                <strong>
                                    Buyer Address:
                                </strong>
                                <br>
                                {!! $order->shippingAddress ? $order->shippingAddress->address_in_text : 'N/A' !!}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Payment Method</td>

                <td>Payment Id</td>
            </tr>

            <tr class="details">
                <td>Razorpay</td>

                <td>{{$order->razorpay_payment_id}}</td>
            </tr>

            <tr class="heading">
                <td>Item</td>

                <td>Price</td>
            </tr>

            @foreach ($order->orderProducts as $orderProduct)
            <tr class="item">
                <td>{{$orderProduct->product_name}}</td>

                <td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>
                    {{$orderProduct->amount}}</td>
            </tr>
            @endforeach

            @if($order->total_amount - 50 < 500) <tr class="item">
                <td>Shipping</td>

                <td>
                    <span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>
                    50
                </td>
                </tr>
                @endif

                <tr class="total" style="margin-top: 10px">
                    <td>
                        Total
                    </td>
                    <td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>
                        {{$order->total_amount}}</td>
                </tr>
        </table>
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td style="vertical-align: middle">
                                <strong>
                                    GST No - 27AAECV5849H1ZW
                                </strong>
                                <br>
                                I/ We hereby certify that my/ our registration certificate under the
                                Maharastra Value Added Tax Act 2002 is forced on the date on which
                                the sale of goods specified in the tax invoice which is made by me/ us
                                and that transaction of sale covered by this Tax invoice has been
                                effected by me/ us in our regular course of my/ our business.
                                Venttura Bioceuticals Pvt Ltd
                                <br>
                                <strong>
                                    This is a Computer generated Invoice and does not require Signature.
                                </strong>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
