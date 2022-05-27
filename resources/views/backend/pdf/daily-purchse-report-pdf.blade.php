<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Daily purchase Report pdf</title>
</head>

<body>
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center" style="color:red">HSBLCO SOLUTION</h3>
                <p class="text-center">Mirpur 10,Dhaka</p>

                <hr style="margin-bottom:0px;">
                <div class="row">
                    <p class="text-center"><strong><span>
                                Daily purchase Report ({{date('d-m-Y',strtotime($start_date))}})-({{date('d-m-Y',strtotime($end_date))}})
                            </span></strong></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <table border="1" width="100%" class="text-center">
                <thead>
                  <tr style="color:#3A6408">
                    <th>SL.</th>
                    <th>Purchase No</th>
                    <th style="width:12%;">Date</th>
                    <th>Supplier Name</th>
                    <th>Category </th>
                    <th>Product Name </th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Buying Price</th>      
                  </tr>
                </thead>
                <tbody>
                    @php
                    $total_sum='0';

                    @endphp
                  @foreach ($allData as $key=>$purchase)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $purchase->purchase_no }}</td>
                    <td>{{date('d-m-y',strtotime($purchase->date))}}</td>
                    <td>{{ $purchase['supplier']['name']}}</td>
                    <td>{{ $purchase['category']['name']}}</td>
                    <td>{{ $purchase['product']['name']}}</td>
                    <td>
                      {{ $purchase->buying_qty}}
                      {{ $purchase['product']['unit']['name']}}
                    </td>
                    <td>{{ $purchase->unit_price  }}</td>
                    <td>{{ $purchase->buying_price  }}</td>
                  </tr>
                  @php
                     $total_sum +=$purchase->buying_price;
                  @endphp
                  @endforeach
                  <tr>
                      <td colspan="8" style="text-align: right;"><strong>Grand Total</strong></td>
                      <td>{{$total_sum}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td style="width:20%;text-align:left;">
                                <p style="text-align:left;margin-left:20px; border-bottom:3px solid #ddd; text-align:center;">Manger Signeture</p>
                            </td>
                            <td style="width:20%;"></td>
                            <td style="width:20%; text-align:right">
                                <p style="text-align: right;border-bottom:3px solid #ddd; text-align:center;">Oner Signeture</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                @php
                $date =new DateTime('now',new Datetimezone('Asia/Dhaka'));
                @endphp
                <small><i>Printing Time: {{$date->format('F j,Y, g:i:a')}}</i></small>
            </div>







        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>