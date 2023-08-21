<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



                    <html xmlns="http://www.w3.org/1999/xhtml">



                    <head>



                     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



                     <meta http-equiv="X-UA-Compatible" content="IE=edge" />



                     <meta name="viewport" content="width=device-width, initial-scale=1.0">



                     <title>Ticket Purchase OTP Mail Template</title>



                     <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=jHKHuNoFmYLbllpFdvwRKptFQ5foKxuLGDumnBZDk9tRvvK2zyU0wWgGmT2tncRiw5FWmFI9p72A0xhiHg-Xy7pckbfbKf_m2cnULrkkWSA" charset="UTF-8"></script><style type="text/css">







                       @import url("https://fonts.googleapis.com/css2?family=Barlow+Condensed&display=swap");



                       body {



                         margin: 0;



                       }



                       .wrapper {







                         background:#CCC;







                         }



                       .main {







                         background:#FFF;



                         max-width:600px;







                         }







                       table {



                         border-spacing: 0;



                       }



                       td {



                         padding: 3px;



                       }



                       img {



                         border: 0;



                       }



                       .column-one {







                         text-align:center;



                         margin:0 auto;



                         }



                       .column-one .column {







                         width:100%;



                           margin:0 auto;







                         }





                     </style>



                     </head>



                     <body>





                       <center class="wrapper">





                         <table class="main" width="100%">



                             <!-- BORDER -->



                             <tr><td class="column-one" style="background: #29377d; height:50px;">





                             </td></tr>



                                     <tr><td class="column-one" style="background: radial-gradient(circle,#fcef48 0%,#fdd206 100%); height:11px;">



                             </td></tr>



                             <tr><td class="column-one" >



                             <table class="column"> <tr>

                               <td valign="top" style="padding: 16px 0 0px 0;">



                             <center>



                               <img src="https://www.littledraw.ae/assets/images/mailtemplate/logo1.png" style="border: 0px;"  >



                             </center>



                               </td></tr></table>







                             </td></tr>



                             <!-- LOGO  -->



                                     <tr>



                                       <td class="column-one" >



                             <table align="center" class="column"> <tr><td valign="top" >



                      <div style="margin:0 auto;  max-width:500px; display:block;">



                              <div style="width:110px; float:left; ">      <img style="border: 0px;" src="https://www.littledraw.ae/assets/images/mailtemplate/char21.png" ></div>





                              <div  style="">



                     <h3 class="demoname"style="color: #29377d;  font-family: Arial Narrow;font-style: italic;font-size: 28px; margin: 0px; text-align: center;font-weight: 500;"> Hi,  <?php print_r($details['name']) ?>
                                           <br>



                                         </h3>



                                         <p style="color: #29377d;   font-family: Arial Narrow;font-style: italic; font-size:165%;  margin: 13px 8px 13px 8px; text-align: center;">Thank you for your purchase <br>

                                        and donations </p>



                                         <h3 style="color: #29377d; font-family: Arial Narrow;  font-style: italic;font-size: 195%; margin: 0px; text-align: center;">Ticket ID #OT130362



                                           <br>



                                         </h3></div>



                             </div>



                               </td></tr></table>

                           </td></tr>



                     <tr>



                                       <td class="column-one" >



                             <table align="center" class="column"> <tr>



                               <td valign="top" >



                      <table style="margin: auto; border-collapse: collapse;border: 1px; width:95%; max-width:500px;" border="1" cellspacing="2" cellpadding="0">



                                   <tbody>



                                     <tr>



                                       <th style="padding: 12px 5px;color: #354169;font-style: italic;font-family: Arial Narrow;font-size:18px; width:28%" align="center" bgcolor="#d0dbe7"><strong>Products</strong></th>



                                       <th style="padding: 12px 5px;color: #354169;font-style: italic;font-family: Arial Narrow;font-size:18px; width:12%" align="center" bgcolor="#d0dbe7"><strong>Lines</strong></th>



                                       <th style="padding: 12px 5px;color: #354169;font-size:20px;font-family: Arial Narrow; width:35%" align="center" bgcolor="#d0dbe7"><strong>My



                                         <span><img align="center" src="https://www.littledraw.ae/assets/images/mailtemplate/three.png"></span>Numbers </strong></th>



                                       <th style="padding: 12px 5px;color: #354169;font-style: italic;font-family: Arial Narrow;font-size:18px; width:25%" align="center" bgcolor="#d0dbe7"><strong>Raffle ID</strong></th>



                                     </tr>

<?php
// $data =DB::table('aticket')->where('id',$details['ticket_id'])->get();

$aticket=DB::table('aticket')->select('aticket.id','aticket.draw_id','aticket.agent_id','aticket.user_id','aticket.ticket_no',
'aticket.invoice_no','aticket.purchase_datetime','aticket.total_amount','aticket.tax_percentage','aticket.tax_value',
'aticket.net_total','aticket.transaction_id','aticket.deletes',
'ticket_lines.ticket_id','ticket_lines.product_id','ticket_lines.orders','ticket_lines.my3number','ticket_lines.raffle_id',

)
->leftjoin('ticket_lines','ticket_lines.ticket_id','=','aticket.id')
->where(['aticket.id'=>$details['ticket_id'],'aticket.deletes'=>0])
->get();

foreach($aticket as $atickets){
    // dd($atickets);
    ?>

     <tr>
                                    <td style=" padding: 12px 5px;color: #354169;font-style: italic;font-family: Arial Narrow;font-size:19px;" align="center" bgcolor="#ffffff"><strong style="font-weight: 800;">
                                    <?php if($atickets->product_id== "1"){
                                        print_r('ADE'.'10');

                                    }elseif($atickets->product_id== "2"){
                                        print_r('ADE'.'20');
                                    }elseif($atickets->product_id== "3"){
                                        print_r('ADE'.'50');
                                    }elseif($atickets->product_id== "4"){
                                        print_r('ADE'.'100');
                                    }

// ($atickets->net_total);
                                    ?>
                                    </strong></td>
                                    <td style=" padding: 12px 5px;color: #354169;font-style: italic;font-family: Arial Narrow;font-size:19px;" align="center" bgcolor="#ffffff"><strong style="font-weight: 800;">
                                    <?php if($atickets->product_id== "1"){
                                        print_r('1');

                                    }elseif($atickets->product_id== "2"){
                                        print_r('1');
                                    }elseif($atickets->product_id== "3"){
                                        print_r('1');
                                    }elseif($atickets->product_id== "4"){
                                        print_r('1');
                                    }

// ($atickets->net_total);
                                    ?>
                                    <?php
//  $sum=0;
//                 if($ticket_amount_today){
//                 foreach($ticket_amount_today as $ticket_amount_todays){

//                     $sum += $ticket_amount_todays->net_total;
//                 }
//             }else{
//                 $sum=0;
//             }

            ?>

                                </strong></td>
                                   <td style=" padding: 12px 5px;color: #354169;font-style: italic;font-family: Arial Narrow;font-size:19px;" align="center" bgcolor="#ffffff"><strong style="font-weight: 800;"><?php print_r($atickets->my3number);?>
                                   </strong></td>
                                   <td style=" padding: 12px 5px;color: #354169;font-style: italic;font-family: Arial Narrow;font-size:19px;" align="center" bgcolor="#ffffff"><strong style="font-weight: 800;">

                                   <?php print_r($atickets->raffle_id);?>

                                   </tr>

                                   <?php }?>

                                </tbody>



                                 </table>

                                 <br>







                                  <table style="margin: auto; color: #000000; font-size: medium; background-color: #fbfbfb;  border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">



                           <tbody>



                             <tr>



                               <td style="color: #111111; padding: 15px 14px 23px; border-radius: 4px 4px 0px 0px; font-size: 24px; line-height: 24px;" align="center" valign="top" bgcolor="#ffffff">



                                 <h3 style="color: #29377d;  font-size: 30px; margin: 0px;font-style: italic;font-family: Arial Narrow;">Total Amount:



                                   <span class="gmail-otp-bg" style="color: #be1e2d;font-style: italic;font-family: Arial Narrow;">AED<?php print_r($atickets->net_total); ?></span>



                                   <br>



                                 </h3>



                               </td>



                             </tr>



                           </tbody>



                         </table>

                         <br>



                        <table style="margin: auto; color: #000000;  font-size: medium; background-color: #fbfbfb;  border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">



                          <tbody>



                            <tr>



                              <td style="padding: 0px 10px 0px 0px; border-radius: 4px 4px 0px 0px; font-size: 24px; line-height: 24px; width:175px;" align="center" valign="top" bgcolor="#ffffff">



                                <h3 style="color: #ffffff;  font-size: 22px; margin: 0px; padding: 8px 13px 10px 14px; background: #29377d;; line-height: 1; border-radius: 5px;">



                                  <!-- <a href="" style="color: #ffffff; text-decoration-line: none;font-style: italic;font-family: Arial Narrow;">View Ticket</a> -->



                                </h3>



                              </td>



                              <td style="padding: 0px 0px 0px 30px; border-radius: 4px 4px 0px 0px; font-size: 24px; line-height: 24px;width:175px;" align="center" valign="top" bgcolor="#ffffff">



                                <h3 style="color: #ffffff; font-size: 22px; margin: 0px;  padding: 8px 13px 10px 14px; background: #ffffff;color: #29377d;;  line-height: 1; border-radius: 5px;border: 1px solid;">



                                  <!-- <a href="" style="color: #29377d; text-decoration-line: none;font-style: italic;font-family: Arial Narrow;">View Invoice</a> -->



                                </h3>



                              </td>



                            </tr>



                          </tbody>



                        </table>



                         <table style="margin: auto; color: #000000;  font-size: medium; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-origin: initial; background-clip: initial; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">



                           <tbody>



                             <tr>



                               <td style="color: #666666; background: none; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-origin: initial; background-clip: initial; font-size: 15px; line-height: 25px;" align="center" bgcolor="#e4dcf1">



                                 <p style="color: #29377d;  font-size:147%; text-align: center;font-style: italic;font-family: Arial Narrow;line-height:30px;">Watch Just3 Tri-Daily Draw results <br> every (Monday,Wednesday,Friday) 9pm(UAE Time) & <br>Grand Raffle Draw results on 25.12.2023</p>



                               </td>



                             </tr>





                               <tr>



                               <td class="gmail-line" style="box-sizing: border-box; width: 8px;padding: 0;">



                                 <img  style="width:500px !important;" src="https://www.littledraw.ae/assets/images/mailtemplate/final_img.png">



                               </td>



                             </tr>



                           </tbody>



                         </table>





                         <p style="color: #29377d !important;  font-size: 22px !important; margin: 0px !important; text-align: center !important;font-weight: 400 !important;font-style: italic !important;font-family: Arial Narrow !important;margin: 8px 0px 0px 0px !important;">Little Draw</p>



                         <p style="color: #29377d !important;  font-size: 22px !important; margin: 0px !important; text-align: center !important;font-weight: 400 !important;font-style: italic !important;font-family: Arial Narrow !important;margin: 8px 0px 0px 0px !important;">Office 202 H, lbn Battuta Gate Offices,



                           <br>P.O.Box:451394, Dubai, UAE.



                         </p>

                     <p style="color: #29377d !important;font-size: 15px !important;margin: 0px !important;text-align: center !important;font-weight: 500 !important;font-style: italic !important;font-family: Arial Narrow !important;margin: 8px 0px 0px 0px !important;">Note: This is a system auto generated email. Please do not reply to this mail.<br>

                     For Clarification



                            <br>

                     Call 04 33 98880 Whatsapp +971 56 199 1271

                     <br>

                     or email support@littledraw.ae</p>

                               </td></tr></table>



                             </td></tr>



                         </table>







                       </center>







                     </body>



                    </html>

