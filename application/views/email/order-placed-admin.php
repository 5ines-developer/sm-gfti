<?php
$this->ci =& get_instance();
$this->ci->load->model('m_cart');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html style="width:100%;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">
 <head> 
  <meta charset="UTF-8"> 
  <meta content="width=device-width, initial-scale=1" name="viewport"> 
  <meta name="x-apple-disable-message-reformatting"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta content="telephone=no" name="format-detection"> 
  
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet"> 
  <style type="text/css">
@media only screen and (max-width:600px) {p, ul li, ol li, a { font-size:16px!important; line-height:150%!important } h1 { font-size:30px!important; text-align:center; line-height:120%!important } h2 { font-size:26px!important; text-align:center; line-height:120%!important } h3 { font-size:20px!important; text-align:center; line-height:120%!important } h1 a { font-size:30px!important } h2 a { font-size:26px!important } h3 a { font-size:20px!important } .es-menu td a { font-size:14px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:14px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:inline-block!important } a.es-button { font-size:20px!important; display:inline-block!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } .es-desk-menu-hidden { display:table-cell!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } }
#outlook a { padding:0; } .ExternalClass { width:100%; } .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height:100%; } .es-button { mso-style-priority:100!important; text-decoration:none!important; } a[x-apple-data-detectors] { color:inherit!important; text-decoration:none!important; font-size:inherit!important; font-family:inherit!important; font-weight:inherit!important; line-height:inherit!important; } .es-desk-hidden { display:none; float:left; overflow:hidden; width:0; max-height:0; line-height:0; mso-hide:all; }
</style> 
 </head> 
 <body style="width:100%;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;"> 
  <div class="es-wrapper-color" style="background-color:#F7F9FB;"> 
 
   <table class="es-wrapper" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;" width="100%" cellspacing="0" cellpadding="0"> 
     <tr style="border-collapse:collapse;"> 
      <td valign="top" style="padding:0;Margin:0;"> 
       <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
         <tr style="border-collapse:collapse;"> 
          <td class="es-adaptive" align="center" style="padding:0;Margin:0;"> 
           <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#76a5af" align="center"> 
             <tr style="border-collapse:collapse;"> 
              <td align="left" style="Margin:0;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px;"> 
               <!--[if mso]><table width="560"><tr><td width="268" valign="top"><![endif]--> 
               <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="268" align="left" style="padding:0;Margin:0;"> 
                   <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td class="es-infoblock es-m-txt-c" align="left" style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC;"> <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:14px;color:#CCCCCC;"><br></p></td> 
                     </tr> 
                   </table> </td> 
                 </tr> 
               </table> 
               <!--[if mso]></td><td width="20"></td><td width="272" valign="top"><![endif]--> 
               <table class="es-right" cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="272" align="left" style="padding:0;Margin:0;"> 
                   <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 

                   </table> </td> 
                 </tr> 
               </table> 
                </td> 
             </tr> 
           </table> </td> 
         </tr> 
       </table> 
       <table class="es-header" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top;"> 
         <tr style="border-collapse:collapse;"> 
          <td align="center" style="padding:0;Margin:0;"> 
           <table class="es-header-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;" width="600" cellspacing="0" cellpadding="0" align="center"> 
             <tr style="border-collapse:collapse;"> 
              <td align="left" style="padding:0;Margin:0;"> 
               <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="600" valign="top" align="center" style="padding:0;Margin:0;"> 
                   <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="center" style="padding:0;Margin:0;padding-bottom:20px;"> <img src="<?php echo base_url() ?>assets/images/img/logo.svg" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;" width="154"></td> 
                     </tr> 
                   </table> </td> 
                 </tr> 
               </table> </td> 
             </tr> 
           </table> </td> 
         </tr> 
       </table> 
       <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
         <tr style="border-collapse:collapse;"> 
          <td align="center" style="padding:0;Margin:0;"> 
           <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#76a5af" align="center"> 
             <tr style="border-collapse:collapse;"> 
              <td align="left" style="padding:0;Margin:0;"> 
               <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="600" valign="top" align="center" style="padding:0;Margin:0;"> 
                   <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-radius:3px;background-color:#FCFCFC;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#fcfcfc"> 
                     <tr style="border-collapse:collapse;"> 
                      <td class="es-m-txt-l" align="left" style="padding:0;Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;"> <h2 style="Margin:0;line-height:31px;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:26px;font-style:normal;font-weight:normal;color:#333333;">Order Placed Successfully!</h2></td> 
                     </tr> 
                     <tr style="border-collapse:collapse;"> 
                      <td bgcolor="#fcfcfc" align="left" style="padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px;"> <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;line-height:21px;color:#333333;">New order has been placed!<br> Details are mentioned below.</p></td> 
                     </tr> 
                   </table> </td> 
                 </tr> 
               </table> </td> 
             </tr> 
             <tr style="border-collapse:collapse;"> 
              <td style="padding:0;Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;background-color:#FCFCFC;" bgcolor="#fcfcfc" align="left"> 
               <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="560" valign="top" align="center" style="padding:0;Margin:0;"> 
                   <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-color:#EFEFEF;border-style:solid;border-width:1px;border-radius:3px;background-color:#FFFFFF;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff"> 
                     <tr style="border-collapse:collapse;width: 100%;"> 
                      <td align="center"  colspan="2" align="center" style="padding:0;margin:0;padding-bottom:15px;padding-top:20px;"> <h3 style="Margin:0;line-height:22px;mso-line-height-rule:exactly;font-family:roboto, 'helvetica neue', helvetica, arial, sans-serif;font-size:18px;font-style:normal;font-weight:normal;color:#333333;">Order Detail</h3></td>                     
                     </tr> 
                     <tr>   <td align="left" style="padding:10px;Margin:0;padding-bottom:15px;padding-top:20px;">Order Id : <?php echo $bach ?></td>
                       <td align="right" style="padding:10px;Margin:0;padding-bottom:15px;padding-top:20px;">Date: <?php echo date("d-m-Y H:i:s"); ?></td>
                     </tr>
                     <tr>   
                     <th align="left" style="padding:10px;Margin:0;padding-bottom:15px;padding-top:20px;">Billing Address :</th>
                     
                     <th align="left" style="padding:10px;Margin:0;padding-bottom:0px;padding-top:20px;">Shipping Address :</th> </tr>
                     <tr>
                     
                      <td align="left" style="padding:10px;Margin:0;padding-bottom:0px;" width="50%">
                      <table>
                        <tr> <td><?php echo (!empty($bill['company_name']))?$bill['company_name']:''; ?></td></tr>
                        <tr> <td><?php echo (!empty($bill['street']))?$bill['street']:''; ?></td></tr>
                        <tr> <td><?php echo (!empty($bill['city']))?$bill['city'].','.$bill['religion']:''; ?></td></tr>
                        <tr> <td><?php echo (!empty($bill['country']))?$bill['country'].'-'.$bill['zip_code']:''; ?></td></tr>
                        <tr> <td><?php echo (!empty($bill['gst_number']))?$bill['gst_number']:''; ?></td></tr>
                        </table>
                      </td>


                      <td align="left" style="padding:10px;Margin:0;padding-bottom:0px;" width="50%">
                        <table>
                        <tr> <td><?php echo (!empty($ship['name']))?$ship['name']:$this->session->userdata('suser'); ?></td></tr>
                        <tr> <td><?php echo (!empty($ship['street']))?$ship['street']:$bill['company_name']; ?></td></tr>
                        <tr> <td><?php echo (!empty($ship['street1']))?$ship['street1']:$bill['street']; ?></td></tr>
                        <tr> <td><?php echo (!empty($ship['city']))? $ship['city'].','.$ship['religion']:$bill['city'].','.$bill['religion']; ?></td></tr>
                        <tr> <td><?php echo (!empty($ship['country']))?$ship['country']:$bill['country'].'-'.$bill['zip_code']; ?></td></tr>
                        <tr> <td><?php echo (!empty($ship['phone']))?$ship['phone']:$bill['gst_number']; ?></td></tr>
                        </table>
                      </td>
                      </tr>
                     <tr style="padding:10px;width: 100%;">

                     <table border="1" style="width: 100%;padding:10px;">
                      <tr>
                        <th>Product</th>
                        <th>quantity</th>                        
                        <th>Unit Price</th>
                        <th>Branding Charges</th>
                        <th>Price</th>
                      </tr>
                      <?php if (!empty($detail)){
                        $total = 0;
                        foreach ($detail as $key => $value) { 
                          $amount =  ($value->price * $value->qty) + ($value->qty * $value->bprice );
                          $total = $total + $amount;
                          ?>
                       <tr style="border:1px solid grey;">            
                         <td align="center"><?php echo(!empty($value->product_id))?$this->ci->m_cart->getproduct($value->product_id):'' ?></td>
                         <td align="center"><?php echo(!empty($value->qty))?$value->qty:'' ?></td>
                         <td align="center"><?php echo(!empty($value->price))?$value->price:'' ?></td>
                         <td align="center"><?php echo(!empty($value->bprice))?$value->bprice:'' ?></td>
                         <td align="center"><?php echo(!empty($amount))?$amount:'' ?></td>
                       </tr>
                     <?php  } } ?> 
                     <tr style="border:1px solid grey;">   
                         <th colspan="4" align="right" style="padding:5px;">Total</th>
                         <td  align="center"><?php echo(!empty($total))?$total:'' ?></td>
                       </tr>
                     </table>
                       </tr>
                      
                  <!--    <tr style="border-collapse:collapse;"> 
                      <td align="center" style="Margin:0;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;"> <span class="es-button-border" style="border-style:solid;border-color:transparent;background:#F8F3EF none repeat scroll 0% 0%;border-width:0px;display:inline-block;border-radius:3px;width:auto;"> <a href="<?php echo base_url().'email-verification?regid='.$regid ?>" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, \'helvetica neue\', helvetica, arial, sans-serif;font-size:17px;color:#64434A;border-style:solid;border-color:#F8F3EF;border-width:10px 20px 10px 20px;display:inline-block;background:#F8F3EF none repeat scroll 0% 0%;border-radius:3px;font-weight:normal;font-style:normal;line-height:20px;width:auto;text-align:center;">
                      </a> </span> </td> 


                     </tr>  -->

                     
                   </table> </td> 
                 </tr> 
               </table> </td> 
             </tr> 
           </table> </td> 
         </tr> 
       </table> 
       <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
         <tr style="border-collapse:collapse;"> 
          <td align="center" style="padding:0;Margin:0;"> 
           <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#76a5af" align="center"> 
             <tr style="border-collapse:collapse;"> 
              <td align="left" style="padding:0;Margin:0;"> 
               <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="600" valign="top" align="center" style="padding:0;Margin:0;"> 
                   <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFF4F7;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#fff4f7"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="center" style="Margin:0;padding-bottom:5px;padding-top:20px;padding-left:20px;padding-right:20px;"> <h3 style="Margin:0;line-height:22px;mso-line-height-rule:exactly;font-family:roboto, \'helvetica neue\', helvetica, arial, sans-serif;font-size:18px;font-style:normal;font-weight:normal;color:#333333;"></h3></td> 
                     </tr> 
                   </table> </td> 
                 </tr> 
               </table> </td> 
             </tr> 
           </table> </td> 
         </tr> 
       </table> 
       <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
         <tr style="border-collapse:collapse;"> 
          <td style="padding:0;Margin:0;background-color:#666666;" bgcolor="#666666" align="center"> 
           <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;" width="600" cellspacing="0" cellpadding="0" bgcolor="#76a5af" align="center"> 
             <tr style="border-collapse:collapse;"> 
              <td align="left" style="padding:0;Margin:0;"> 
               <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                 
               </table> </td> 
             </tr> 
           </table> </td> 
         </tr> 
       </table> 
       <table class="es-footer" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top;"> 
         <tr style="border-collapse:collapse;"> 
          <td style="padding:0;Margin:0;background-color:#666666;" bgcolor="#666666" align="center"> 
           <table class="es-footer-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#666666;" width="600" cellspacing="0" cellpadding="0" bgcolor="#666666" align="center"> 
             <tr style="border-collapse:collapse;"> 
              <td align="left" style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:20px;"> 
               <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="560" valign="top" align="center" style="padding:0;Margin:0;"> 
                   <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                    
                     <tr style="border-collapse:collapse;"> 
                      <td esdev-links-color="#999999" align="center" style="padding:0;Margin:0;padding-bottom:5px;"> <p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;line-height:21px;color:#FFFFFF;">
                      All Rights Reserved © Gifiting Xpress 2019
                    </p></td> 
                     </tr> 
                   </table> </td> 
                 </tr> 
               </table> </td> 
             </tr> 
           </table> </td> 
         </tr> 
       </table> </td> 
     </tr> 
   </table> 
  </div>  
 </body>
</html>