<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <title>{{Setting::get('site_name','Tranxit')}}</title>
    <style type="text/css">
.ReadMsgBody { width: 100%; background-color: #ffffff; }
.ExternalClass { width: 100%; background-color: #ffffff; }
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
html { width: 100%; }
body { -webkit-text-size-adjust: none; -ms-text-size-adjust: none; margin: 0; padding: 0; }
table { border-spacing: 0; border-collapse: collapse; table-layout: fixed; margin:0 auto; }
table table table { table-layout: auto; }
img { display: block !important; }
table td { border-collapse: collapse; }
.yshortcuts a { border-bottom: none !important; }
a { color: #ff646a; text-decoration: none; }
.textbutton a { font-family: 'open sans', arial, sans-serif !important; color: #ffffff !important; }
.footer-link a { color: #7f8c8d !important; }
</style>
</head>

<body>

    <!-- header -->
   
    <table data-thumb="header.jpg" data-module="Header" data-bgcolor="Header" bgcolor="#f8f8f8" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr align="center" valign="top">
            <td>
                <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td data-bgcolor="Alternate Color" width="208" align="center" valign="top" bgcolor="">
                            <table width="158" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td height="50"></td>
                                </tr>
                                <!-- logo -->
                                <tr>
                                    <td align="center" style="line-height:0px;">
                                        <img mc:edit="img" style="display:block;font-size:0px; border:0px; line-height:0px;max-width:70px;" src="{{ Setting::get('mail_logo', asset('logo-black.png')) }}" alt="logo" />
                                    </td>
                                </tr>
                                <!-- end logo -->

                                
                            </table>
                        </td>
                        <td width="392" align="center" valign="top">
                            <table width="342" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td height="50"></td>
                                </tr>

                                <!-- title -->
                                <tr>
                                    <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Header Link 2" mc:edit="title" data-color="Title" align="right" style="font-family: 'Open Sans', Arial, sans-serif; font-size:38px; color:#3b3b3b; line-height:26px;">Welcome</td>
                                </tr>
                                <!-- end title -->

                                <tr>
                                    <td height="25"></td>
                                </tr>
                                <tr>
                                    <td align="right">
                                        <table align="right" width="50" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td data-bgcolor="Dash" bgcolor="#ff646a" height="3" style="line-height:0px; font-size:0px;">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="15"></td>
                                </tr>
                                

                                <tr>
                                    <td height="25"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- end header -->

    <!-- title -->
    <table data-thumb="title.jpg" data-module="Title" bgcolor="#ffffff" align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <table align="center" width="600" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center" >
                            <table align="center" width="550" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td height="50"></td>
                                </tr>

                                <tr>
                                  <td class="bodyContent" valign="top" mc:edit="welcomeEdit-02">
                                    <p>Hi {{$User['first_name']}},</p>

                                    <h1><strong>Welcome to {{Setting::get('site_name','Tranxit')}}. Please find your login details below</strong></h1>

                                    <div style="border-top:solid #9a9797 1px;border-bottom:solid #9a9797 1px;">
                                        <p><strong>User Login : </strong></p>
                                        <p><strong>Email : </strong>{{$User['email']}}</p>
                                        <p><strong>Password : </strong>123456</p>
                                    </div>
                                    <div style="border-top:solid #9a9797 1px;border-bottom:solid #9a9797 1px;">
                                        <p><strong>Provider Login : </strong></p>
                                        <p><strong>Email : </strong>{{$User['email']}}</p>
                                        <p><strong>Password : </strong>123456</p>
                                    </div>    
                                    <div style="border-top:solid #9a9797 1px;border-bottom:solid #9a9797 1px;">
                                        <p><strong>Admin Login : </strong></p>
                                        <p><strong>Email : </strong>admin@demo.com</p>
                                        <p><strong>Password : </strong>123456</p>
                                    </div>
                                    <div style="border-top:solid #9a9797 1px;border-bottom:solid #9a9797 1px;">    
                                        <p><strong>Dispatcher Login : </strong></p>
                                        <p><strong>Email : </strong>dispatcher@demo.com</p>
                                        <p><strong>Password : </strong>123456</p>
                                    </div>

                                    <div style="border-top:solid #9a9797 1px;border-bottom:solid #9a9797 1px;">
                                        <p><strong>Fleet Login : </strong></p>
                                        <p><strong>Email : </strong>fleet@demo.com</p>
                                        <p><strong>Password : </strong>123456</p>
                                    </div>    
                                    <div style="border-top:solid #9a9797 1px;border-bottom:solid #9a9797 1px;">
                                        <p><strong>Account Login : </strong></p>
                                        <p><strong>Email : </strong>account@demo.com</p>
                                        <p><strong>Password : </strong>123456</p>
                                    </div>
                                    
                                    <div style="border-top:solid #9a9797 1px;border-bottom:solid #9a9797 1px;">
                                        <p><strong>Ios App Details : </strong></p>
                                        <p><a target="_blank" href="{{Setting::get('store_link_ios_user','#')}}">User</a></p>
                                        <p><a target="_blank" href="{{Setting::get('store_link_ios_provider','#')}}">Provider</a></p>
                                    </div>    

                                    <div style="border-top:solid #9a9797 1px;border-bottom:solid #9a9797 1px;">
                                        <p><strong>Android App Details : </strong></p>
                                        <p><a target="_blank" href="{{Setting::get('store_link_android_user','#')}}">User</a></p>
                                        <p><a target="_blank" href="{{Setting::get('store_link_android_provider','#')}}">Provider</a></p>
                                    </div>
                                   
                                  </td>
                                </tr>
                               
                                <!-- end header -->
                                <tr>
                                    <td height="10"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!-- end title -->

    

    

    <table align="center">

    <tr>
        <td height="10"></td>
    </tr>

    <!-- button -->
    <tr>
        <td align="center">
            <table data-bgcolor="Main Color" align="center" bgcolor="#3cb2d0" border="0" cellspacing="0" cellpadding="0" style=" border-radius:4px; box-shadow: 0px 2px 0px #dedfdf;">

                <tr>
                    <td mc:edit="button" height="55" align="center" style="font-family: 'Open Sans', Arial, sans-serif; font-size:16px; color:#7f8c8d; line-height:30px; font-weight: bold;padding-left: 25px;padding-right: 25px;">
                        <a href="{{url('/')}}" target="_blank" style="color:#ffffff;text-decoration:none;" data-color="Button Link">Visit Website</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- end button -->

    </table>

    <!-- note -->
    <table data-thumb="note.jpg" data-module="Note" bgcolor="#ffffff" align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <table align="center" width="600" border="0" cellspacing="0" cellpadding="0">
                    
                    <tr>
                        <td height="15" style="border-bottom:3px solid #bcbcbc;"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!-- end note -->

    <!-- footer -->
    <table data-thumb="footer.jpg" data-module="Footer" bgcolor="#ffffff" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

    <tr>
        <td height="15"></td>
    </tr>

    <!-- copyright -->
        <tr>
            <td data-link-style="text-decoration:none; color:#7f8c8d;" data-link-color="Copyright Link" data-color="Copyright" data-size="Copyright" mc:edit="copyright" align="center" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#7f8c8d; line-height:30px;">
                {{ Setting::get('site_copyright', '&copy; '.date('Y').' Tranxit') }}
            </td>
        </tr>
        <!-- end copyright -->

        <tr>
            <td height="15"></td>
        </tr>

    </table>
    <!-- end footer -->
</body>
</html>