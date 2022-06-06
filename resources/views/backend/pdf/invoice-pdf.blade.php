<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center" style="color:red">HSBLCO SOLUTION</h3>
                <p class="text-center">Mirpur 10,Dhaka</p>
               
                <hr style="margin-bottom:0px;">
                <div class="row">
                
                <p class="text-center">Customer Information</p>

                </div>           
                <table width="100%">
                
                    <tbody>
                        @php
                        $payment=App\Models\Payment::where('invoice_id',$invoice->id)->first();
                        @endphp
                        <!-- <h5>Customer Onfo</h5> -->
                        <tr class="pb-1">
                            <td width="20%"><strong>Invoice NO :#{{$invoice->invoice_no}}</strong></td>
                            <td width="15%"><strong>Name</strong> :{{$payment['customer']['name']}}</td>
                            <td width="25%"><strong>Mobile No</strong>:{{$payment['customer']['mobile']}}</td>
                            <td width="30%"><strong>Addres</strong> :{{$payment['customer']['address']}}</td>
                        </tr>
                    </tbody>
                </table>
                <table border="2" width="100%" class="pb-4">
                    <thead>
                        <tr class="text-center">
                            <th style="width:5%">Sl</th>
                            <th>Category</th>
                            <th>Peoduct Name</th>
                            <th>quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total_sum="0";
                        @endphp
                        @foreach($invoice['invoice_details'] as $key => $details)
                        <tr class="text-center">
                            <td>{{$key+1}}</td>
                            <td>{{$details['category']['name']}}</td>
                            <td>{{$details['product']['name']}}</td>
                            <td>{{$details->selling_qty}}</td>
                            <td>{{$details->unit_price}}</td>
                            <td>{{$details->selling_price}}</td>
                        </tr>
                        @php
                        $total_sum +=$details->selling_price;
                        @endphp
                        @endforeach
                        <tr>
                            <td colspan="5" class="text-right"><strong>Sub total</strong></td>
                            <td class="text-center"><strong>{{$total_sum}}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">Discount</td>
                            <td class="text-center">{{$payment->discount_amount }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">Paid Amount</td>
                            <td class="text-center">{{$payment->paid_amount }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">Due Amount</td>
                            <td class="text-center">{{$payment->due_amount }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right"><strong>Grand Total</strong></td>
                            <td class="text-center"><strong>{{$payment->total_amount }}</strong></td>
                        </tr>

                    </tbody>

                </table>
                @php
                 $date =new DateTime('now',new Datetimezone('Asia/Dhaka'));

                @endphp

                <i>Printing Time: {{$date->format('F j,Y, g:i:a')}}</i>

            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <br>
                <hr style="margin-bottom:0px;">
                <table width="100%">
                    <tbody>
                    <tr>
                        <td style="width:40%;text-align:left;">
                            <p style="text-align:left;margin-left:20px;">Customer Signeture</p>
                        </td>
                        <td style="width:20%;"></td>
                        <td style="width:40%; text-align:right">
                            <p style="text-align: right;">Seller Signeture</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>