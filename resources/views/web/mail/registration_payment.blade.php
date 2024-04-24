<!doctype html>
<html lang="en-US">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Castnet</title>
    <meta name="description" content="Castnet - Registration Payment">
</head>
<style>
    a:hover {text-decoration: underline !important;}
</style>
<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <!-- Logo -->
                    <tr>
                        <td style="text-align:center;">
                          <a href="{{ url('/') }}" target="_blank">
                            <img width="160" src="{{ asset('assets/web/images/'.appSetting()->header_logo) }}" title="logo" alt="logo">
                          </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <!-- Email Content -->
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px; background:#fff; border-radius:3px;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);padding:0 40px;">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <!-- Details Table -->
                                <tr>
                                    <td style="color: #5e7c85;">
                                        <p><b>Dear {{ $data['name'] }},</b></p>
                                        <p>{{ $data['message'] }}</p>
                                        <br><br>
                                        <p>Regards,</p>
                                        <p>CASTNET</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p style="font-size:14px; color:#455056bd; line-height:18px; margin:0 0 0;padding-bottom:20px;">&copy; <strong>{{date('Y')}} Castnet. All rights reserved.</strong></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>