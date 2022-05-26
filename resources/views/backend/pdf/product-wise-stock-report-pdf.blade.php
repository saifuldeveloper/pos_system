<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Product  Wise Stock Report </title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center" style="color:red">HSBLCO SOLUTION</h3>
                <p class="text-center">Mirpur 10,Dhaka</p>
                <hr style="margin-bottom:0px;">
                <div class="row">
                    <p class="text-center">Product Wise Stock report</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="card-body">
                
                <br>
                <hr>
              <table border="1" width="100%" style="text-align: center;">

                                <thead>
                                    <tr style="color:#3A6408">  
                                        <th>Supplier Name</th> 
                                        <th>Category Name </th>
                                        <th>Product Name</th>
                                        <th>In qty</th>
                                        <th>out qty</th>
                                        <th>Stock</th>
                                        <th>Unit</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $buying_total =App\Models\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('buying_qty');
                                    $selling_total =App\Models\InvoiceDetails::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_qty');
                                    @endphp
                                    <tr>    
                                        <td>{{$product['supplier']['name']}}</td>                  
                                        <td>{{ $product['category']['name']}}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $buying_total }}</td>
                                        <td>{{ $selling_total  }}</td> 
                                        <td>{{$product->quantity}} </td>
                                        <td>{{ $product['unit']['name']}}</td>         
                                    </tr>
                                 
                                </tbody>
                            </table>
            </div>

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
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>