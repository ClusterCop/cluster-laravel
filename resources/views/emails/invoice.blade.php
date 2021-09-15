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
                                    <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Header Link 2" mc:edit="title" data-color="Title" align="right" style="font-family: 'Open Sans', Arial, sans-serif; font-size:38px; color:#3b3b3b; line-height:26px;">INVOICE</td>
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
                                <!-- Compane Name -->
                                <tr>
                                    <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Address Link 2" mc:edit="customer name" data-color="Title" align="right" style="font-family: 'Open Sans', Arial, sans-serif; font-size:16px; color:#3b3b3b; line-height:26px; font-weight: bold;">{{$Email->user->first_name}} {{$Email->user->last_name}}</td>
                                </tr>
                                <!-- end Compane Name -->

                                <tr>
                                    <td height="5"></td>
                                </tr>

                                <!-- address -->
                                <tr>
                                    <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Address Link 2" mc:edit="address" data-color="Cusomer Address" align="right" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#7f8c8d; line-height:26px;">
                                        <!-- PO Box 16122 Collins Street
                                        <br />
                                        West Victoria 8007 Australia
                                        <br />-->
                                        Booking ID :
                                        <span style="color:#3b3b3b"> <strong>{{$Email->booking_id}}</strong> <br>
                                            {{$Email->user->email}}<br>
                                            {{$Email->user->mobile}}
                                        </span>
                                    </td>
                                </tr>
                                <!-- end address -->

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
                        <td align="center" style="border-bottom:3px solid #bcbcbc;">
                            <table align="center" width="550" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td height="50"></td>
                                </tr>

                                <!-- header -->
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Title Link" mc:edit="title bar 1" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#3b3b3b; line-height:26px; text-transform:uppercase;">Description</td>
                                                
                                                <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Title Link" mc:edit="title bar 4" width="87" align="right" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#3b3b3b; line-height:26px; text-transform:uppercase;">Amount</td>
                                            </tr>
                                        </table>
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

    <!-- list -->
    <table data-thumb="list.jpg" data-module="List" bgcolor="#ffffff" align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <table width="600" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center" style="border-bottom:1px solid #ecf0f1;">
                            <table width="550" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td height="35"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Content Link" mc:edit="desctiption" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">Base Fare</td>
                                                
                                                <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Content Link" mc:edit="value-3" width="87" align="right" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">{{Setting::get('currency','$')}}{{$Email->payment->fixed}}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="15"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Content Link" mc:edit="desctiption" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">Distance Fare</td>
                                                
                                                <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Content Link" mc:edit="value-3" width="87" align="right" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                    @if($Email->service_type->calculator=='MIN')
                                                        {{Setting::get('currency','$')}}{{$Email->payment->minute}}
                                                    @endif
                                                    @if($Email->service_type->calculator=='HOUR')
                                                        {{Setting::get('currency','$')}}{{$Email->payment->hour}}
                                                    @endif
                                                    @if($Email->service_type->calculator=='DISTANCE')
                                                        {{Setting::get('currency','$')}}{{$Email->payment->distance}}
                                                    @endif
                                                    @if($Email->service_type->calculator=='DISTANCEMIN')
                                                        {{Setting::get('currency','$')}}{{$Email->payment->minute+$Email->payment->distance}}
                                                    @endif
                                                    @if($Email->service_type->calculator=='DISTANCEHOUR')
                                                        {{Setting::get('currency','$')}}{{$Email->payment->hour+$Email->payment->distance}}
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="15"></td>
                                </tr>

                                <!-- <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Content Link" mc:edit="desctiption" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">Other Fare</td>
                                                
                                                <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Content Link" mc:edit="value-3" width="87" align="right" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">{{Setting::get('currency','$')}}{{$Email->payment->commision }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr> -->
                                @if($Email->payment->discount)
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Content Link" mc:edit="desctiption" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">Discount</td>
                                                
                                                <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Content Link" mc:edit="value-3" width="87" align="right" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">{{Setting::get('currency','$')}}{{$Email->payment->discount }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endif

                                @if($Email->payment->tips)
                                <tr>
                                    <td height="15"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Content Link" mc:edit="desctiption" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">Tips</td>
                                                
                                                <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Content Link" mc:edit="value-3" width="87" align="right" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">{{Setting::get('currency','$')}}{{$Email->payment->tips }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endif

                                <tr>
                                    <td height="15"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="15"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!-- end list -->

    <!-- total -->
    <table data-thumb="total.jpg" data-module="Total" bgcolor="#ffffff" align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <table align="center" width="600" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center" height="40" style="border-bottom:3px solid #3b3b3b;"></td>
                    </tr>
                    <tr>
                        <td height="15"></td>
                    </tr>
                    <tr>
                        <td align="center">
                            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td data-bgcolor="Extra Fee BG" width="416" align="center" valign="top" bgcolor="#f8f8f8">
                                        <table width="366" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td height="10"></td>
                                            </tr>
                                            <tr>
                                                <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Content Link" mc:edit="total title" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:12px; color:#3b3b3b; line-height:26px; text-transform:uppercase;line-height:24px;">Tax Fare</td>
                                            </tr>
                                            <tr>
                                                <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Content Link" mc:edit="total content" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:24px; color:#3b3b3b;  font-weight: bold;">{{Setting::get('currency','$')}}{{$Email->payment->tax }}</td>
                                            </tr>
                                            <tr>
                                                <td height="15"></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td data-bgcolor="Total" width="184" align="center" valign="top" bgcolor="#e1e6e7">
                                        <table width="134" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td height="10"></td>
                                            </tr>
                                            <tr>
                                                <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Content Link" mc:edit="total title-1" align="right" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:12px; color:#3b3b3b; line-height:26px; text-transform:uppercase;line-height:24px;">Total</td>
                                            </tr>
                                            <tr>
                                                <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Content Link" mc:edit="total content-2" align="right" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:24px; color:#3b3b3b;  font-weight: bold;">{{Setting::get('currency','$')}}{{$Email->payment->total-$Email->payment->discount+$Email->payment->tips }}</td>
                                            </tr>
                                            <tr>
                                                <td height="15"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                   <!--  <tr>
                        <td height="15"></td>
                    </tr> -->
                </table>
            </td>
        </tr>
    
    </table>
    <!-- end total -->

    <!-- title -->
    <table data-thumb="title.jpg" data-module="Title" bgcolor="#ffffff" align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <table align="center" width="600" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center" style="border-bottom:3px solid #bcbcbc;">
                            <table align="center" width="550" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td height="50"></td>
                                </tr>

                                <!-- header -->
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Title Link" mc:edit="title bar 1" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#3b3b3b; line-height:26px; text-transform:uppercase;">Driver Details</td>
                                            </tr>
                                        </table>
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

     <!-- list -->
    <table data-thumb="list.jpg" data-module="List" bgcolor="#ffffff" align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <table width="600" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center" style="border-bottom:1px solid #ecf0f1;">
                            <table width="550" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td height="35"></td>
                                </tr>
                                <tr>
                                    <td data-link-style="text-decoration:none; color:#3b3b3b;font-weight:bold;" data-link-color="Address Link 1" mc:edit="Company Name" data-color="Company Title" style="font-family: 'Open Sans', Arial, sans-serif; font-size:16px; color:#3b3b3b; line-height:26px; font-weight: bold;">{{$Email->provider->first_name}} {{$Email->provider->last_name}}</td>
                                </tr>
                                <!-- end Compane Name -->

                                <tr>
                                    <td height="5"></td>
                                </tr>

                                <!-- address -->
                                <tr>
                                    <td data-link-style="text-decoration:none; color:#FFFFFF;" data-link-color="Address Link 1" mc:edit="company address" data-color="Company Address" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#FFFFFF; line-height:26px;">
                                        <img class="profile_preview" id="profile_image_preview" src="{{img($Email->provider->avatar)}}" alt="your image" style="height: 50px;width: 50px;border-radius: 50px;" />
                                    </td>
                                </tr>

                                <tr>
                                    <td height="15"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="15"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!-- end list -->

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
                        <td height="30"></td>
                    </tr>

                    <!-- title -->
                    <tr>
                        <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Content Link" mc:edit="note title" data-color="Title" data-size="Note Title" data-min="13" data-max="20" style="font-family: 'Open Sans', Arial, sans-serif; font-size:16px; color:#3b3b3b; line-height:26px;  font-weight: bold; text-transform:uppercase">NOTES</td>
                    </tr>
                    <!-- end title -->
                    <tr>
                        <td height="5"></td>
                    </tr>

                    <!-- content -->
                    <tr>
                        <td data-link-style="text-decoration:none; color:#ff646a;" data-link-color="Content Link" mc:edit="note content" data-size="Note Content" data-min="13" data-max="18" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#7f8c8d; line-height:26px;">
                            THIS IS A COMPUTER GENERATED INVOICE AND DOES NOT REQUIRE ANY SIGNATURE. PLEASE CONTACT ADMINISTRATOR FOR MORE DETAILS.
                        </td>
                    </tr>
                    <!-- end content -->

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