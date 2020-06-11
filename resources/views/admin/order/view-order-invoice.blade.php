@extends('admin.master')
@section('body')
    <br/>
    <style>
        /*
	 CSS-Tricks Example
	 by Chris Coyier

*/

        * { margin: 0; padding: 0; }
        body { font: 14px/1.4 Georgia, serif; }
        #page-wrap { width: 1500px; margin: 0 auto; }

        textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
        table { border-collapse: collapse; }
        table td, table th { border: 1px solid black; padding: 5px; }
        #header { height: 60px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; }

        #address { width: 250px; height: 150px; float: left; }
        #customer { overflow: hidden; }

        #logo { text-align: right; float: right; position: relative; margin-top: 25px; border: 1px solid #fff; max-width: 540px; max-height: 100px; overflow: hidden; }
        #logo:hover, #logo.edit { border: 1px solid #000; margin-top: 0px; max-height: 125px; }
        #logoctr { display: none; }
        #logo:hover #logoctr, #logo.edit #logoctr { display: block; text-align: right; line-height: 25px; background: #eee; padding: 0 5px; }
        #logohelp { text-align: left; display: none; font-style: italic; padding: 10px 5px;}
        #logohelp input { margin-bottom: 5px; }
        .edit #logohelp { display: block; }
        .edit #save-logo, .edit #cancel-logo { display: inline; }
        .edit #image, #save-logo, #cancel-logo, .edit #change-logo, .edit #delete-logo { display: none; }
        #customer-title { font-size: 20px; font-weight: bold; float: left; }

        #meta { margin-top: 1px; width: 300px; float: right; }
        #meta td { text-align: right;  }
        #meta td.meta-head { text-align: left; background: #eee; }
        #meta td textarea { width: 100%; height: 20px; text-align: right; }

        #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
        #items th { background: #eee; }
        #items textarea { width: 80px; height: 50px; }
        #items tr.item-row td { border: 0; vertical-align: top; }
        #items td.description { width: 300px; }
        #items td.item-name { width: 175px; }
        #items td.description textarea, #items td.item-name textarea { width: 100%; }
        #items td.total-line { border-right: 0; text-align: right; }
        #items td.total-value { border-left: 0; padding: 10px; }
        #items td.total-value textarea { height: 20px; background: none; }
        #items td.balance { background: #eee; }
        #items td.blank { border: 0; }

        #terms { text-align: center; margin: 20px 0 0 0; }
        #terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
        #terms textarea { width: 100%; text-align: center;}

        textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }

        .delete-wpr { position: relative; }
        .delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }

    </style>


    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

        <title>Editable Invoice</title>

        <link rel='stylesheet' type='text/css' href='{{ asset('/') }}admin/css/style.css' />
        <link rel='stylesheet' type='text/css' href='{{ asset('/') }}admin/css/print.css' media="print" />
        <script type='text/javascript' src='{{ asset('/') }}admin/js/jquery-1.3.2.min.js'></script>
        <script type='text/javascript' src='{{ asset('/') }}admin/js/example.js'></script>

    </head>

    <body>

    <div id="page-wrap">

        <header>
            <h1 class="text-success text-center">Invoice</h1>


            <address id="address">
                <h3 class="text-success text-center">Shipping Ifo</h3>
                <p>{{ $shipping->full_name}}</p>
                <p>{{ $shipping->phone}}</p>
                <p>{{ $shipping->address}}</p>
          </address>

            <address id="address">
                <h3 class="text-success text-center">Billing Ifo</h3>
                <p>{{ $customer->first_name.' '.$customer->last_name}}</p>
                <p>{{ $customer->phone}}</p>
                <p>{{ $customer->address}}</p>
            </address>
        </header>
        <div id="identity">
            <div id="logo">

                <div id="logoctr">
                    <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                    <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                    |
                    <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                    <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
                </div>

                <div id="logohelp">
                    <input id="imageloc" type="text" size="50" value="" /><br />
                    (max width: 540px, max height: 100px)
                </div>
                <img id="image" src="images/logo.png" alt="logo" />
            </div>

        </div>

        <div style="clear:both"></div>

        <div id="customer">

            <textarea id="customer-title">Widget Corp.
c/o Steve Widget</textarea>

            <table id="meta" class="table table-bordered">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><textarea>0000{{ $order->id }}</textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><textarea id="date">{{ $order->created_at}}</textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount </td>
                    <td><div class="due">TK.{{ $order->order_total}}</div></td>
                </tr>

            </table>

        </div>

        <table id="items" class="table table-bordered">

            <tr>
                <th>Item</th>
                <th>Description</th>
                <th>Unit Cost</th>
                <th>Quantity</th>
                <th> Total Price</th>
            </tr>
            @foreach($orderDetails as $orderDetails)
                @php($sum=0)
            <tr class="item-row">

              <td><span>{{ $orderDetails->product_name }}</span></td>
                <td><textarea class="description">kiso ko</textarea></td>
              <td><span>{{ $orderDetails->product_price }}</span></td>
              <td><span>{{ $orderDetails->product_quantity }}</span></td>


                <td><span class="price">TK.{{$total= $orderDetails->product_price* $orderDetails->product_quantity }}</span></td>
            </tr>
@php($sum=$sum+$total)
@endforeach




            <tr>

                <td colspan="2" class="blank"> </td>
                <td colspan="2" class="total-line">Total</td>
                <td class="total-value"><div id="total">TK.{{ $sum }}</div></td>
            </tr>


        </table>

        <div id="terms">
            <h5>Terms</h5>
            <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
        </div>

    </div>

    </body>



@endsection


