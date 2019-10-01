<?php
  $email = $_POST['email'];
if (isset($_POST['payment1'])) {
  $payment = "Card";
}elseif (isset($_POST['payment2'])) {
  $payment = "Cash";
}else {
  $payment = "Account Transfer";
}
$title = "Your Malaysia Prime Steak House Receipt";
$fullname = $_POST['fullname2'];
	$meal = array();
	$quantity = array();
	$name = array();
	$nombor = 0;
	for ($i=0; $i <36 ; $i++) {
    $string = "meal".$i;
    $string2 = "quantity".$i;
    $string3 = "name".$i;
    if(isset($_POST["$string"])){
    $meal[$i] = $_POST["$string"];
    $quantity[$i] = $_POST["$string2"];
    $name[$i] = $_POST["$string3"];
    }else {
    $quantity[$i]= 0;
    }
    }


	$price = array(8.00, 15.00, 30.00, 10.00, 25.00, 30.00, 10.00, 10.00, 15.00, 25.00, 8.00, 15.00, 10.00, 10.00, 15.00, 10.00, 10.00, 15.00, 30.00, 10.00, 25.00, 30.00, 20.00, 25.00, 30.00, 20.00, 25.00, 35.00, 10.00, 15.00, 10.00, 15.00, 10.00, 15.00, 15.00, 15.00);

    

for ($s=0; $s < 36 ; $s++) {
  if ($quantity[$s] != 0) {

    $amoountofitem=$quantity[$s];
  $diff=$name[$s];
  $fiiler1 .=  "    <tr class='item'>
          <td>
              $diff($amoountofitem)
          </td>

          <td>
              RM ";

              $prices=$price[$s];
              $quantities=$quantity[$s];
              $realpricee = $prices*$quantities;
              $total += $realpricee;
  $fiiler1 .="$realpricee.00
          </td>
      </tr>";
    }
}



$content = "<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Malaysia Prime Steak House Receipt</title>

    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
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

    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
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
    }

    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .rtl table {
        text-align: right;
    }

    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class='invoice-box'>
        <table cellpadding='0' cellspacing='0'>
            <tr class='top'>
                <td colspan='2'>
                    <table>
                        <tr>
                            <td class='title'>
                                <img src='https://i.ibb.co/12HBZHC/steak1.png' style='width:200px; height:100px;'> 
                            </td>

                            <td>
                                Invoice #: 696969<br>
                                Created: ".date("jS  F Y")."<br>
                                Auto Generated Receipt
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class='information'>
                <td colspan='2'>
                    <table>
                        <tr>
                            <td>
                                Malaysia Prime Steak House<br>
                                Kuala Lumpur<br>
                              
                            </td>

                            <td>
                                Mr/Mrs.<br>
                                ".$fullname."<br>
                                $email
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class='heading'>
                <td>
                    Payment Method
                </td>

                <td>
                    Check #
                </td>
            </tr>

            <tr class='details'>
                <td>
                    $payment
                </td>

                <td>
                    Succesful
                </td>
            </tr>

            <tr class='heading'>
                <td>
                    Item
                </td>

                <td>
                    Price
                </td>
            </tr>

        ". $fiiler1  ."

            <tr class='total'>
                <td></td>

                <td>
                   Total: RM$total.00
                </td>
            </tr>
        </table>
    </div>
</body>
</html>";
$headers = "Malaysia Prime Steak House Copyright" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail("$email",$title,$content,$headers);
header('Location: succeess.html');
 ?>
