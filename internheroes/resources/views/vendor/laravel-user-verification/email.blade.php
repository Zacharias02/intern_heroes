@extends('admin.layouts.email_template')
@section('content')
@php
if(auth('company')->check()){
$link = route('company.email-verification.check', $user->verification_token);
}elseif(auth()->check()){
$link = route('email-verification.check', $user->verification_token);
}
@endphp
<table border="0" cellpadding="0" cellspacing="0" class="force-row" style="width: 100%;    border-bottom: solid 1px #ccc;">
    <tr>
        <td class="content-wrapper" style="padding-left:24px;padding-right:24px"><br>
            <div class="title" style="font-family: Helvetica, Arial, sans-serif; font-size: 18px;font-weight:400;color: #000;text-align: left; padding-top: 20px;">Greetings!</div></td>
    </tr>
    <tr>
        <td class="cols-wrapper" style="padding-left:12px;padding-right:12px">
            <!--[if mso]>
             <table border="0" width="576" cellpadding="0" cellspacing="0" style="width: 576px;">
                <tr>
                   <td width="192" style="width: 192px;" valign="top">
                      <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" align="left" class="force-row" style="width: 100%;">
                <tr>
                    <td class="row" valign="top" style="padding-left:12px;padding-right:12px;padding-top:18px;padding-bottom:12px"><table border="0" cellpadding="0" cellspacing="0" style="width:100%;">
                            
                            <tr>
                            <td class="subtitle" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;font-weight:400;color:#333;padding-bottom:30px; text-align: left;">Thank you for joining Jobbie! To activate your account, kindly click on the button below to verify your email address.</td>
                            </tr>
                            <tr>
                                <td class="subtitle" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;font-weight:400;color:#333;padding-bottom:30px; text-align: left;"><a href="{{ $link . '?email=' . urlencode($user->email) }}" style="color: #fff;text-decoration: none;background: #f25a55; padding: 7px 10px;text-align: center;display: inline-block;margin-top: 20px;">Click here to verify your account</a></td>
                            </tr>
                            <tr>
                                <td class="subtitle" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;font-weight:400;color:#333;padding-bottom:30px; text-align: left;">Or go to this link in your browser: {{ $link . '?email=' . urlencode($user->email) }} </td>
                            </tr>
                            <tr>
                            <td class="subtitle" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;font-weight:400;color:#333;padding-bottom:30px; text-align: left;">Once you verify your email address, you may use it to sign in to your Jobbie account. Please make sure to verify your email address so we can keep in touch.<br>I am very excited to work with you! Again, thank you and welcome to Jobbie!</td>
                            </tr>
                            <tr>
                                <td style="font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 22px;font-weight: 400;color: #333; padding-bottom: 30px;text-align: left;">Best regards,<br>BUDDIE<br>Jobbie’s Virtual Job Assistant<br></td>
                            </tr>
                            <tr>
                                <td style="font-family: Helvetica, Arial, sans-serif;font-size: 14px;line-height: 22px;font-weight: 400;color: #333; padding-bottom: 30px;text-align: left;">PS: Now that we’re partners, don’t hesitate to send me an email at <a href="mailto:askbuddie@jobbie.ph">askbuddie@jobbie.ph</a> so I can entertain all of your questions and concerns.</td>
                            </tr>
                        </table>
                        <br></td>
                </tr>
            </table>      
            <!--[if mso]>
               </td>
            </tr>
         </table>
         <![endif]--></td>
    </tr>
</table>
@endsection
