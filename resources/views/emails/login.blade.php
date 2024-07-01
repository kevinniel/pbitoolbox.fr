<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" lang="en">

<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
    <meta name="x-apple-disable-message-reformatting"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Righteous&display=swap"
        rel="stylesheet">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</head>
<body style="background-color:#ffffff;font-family: Open-Sans,sans-serif">
<table align="center" width="100%" border="0" cellPadding="0" cellSpacing="0" role="presentation"
       style="max-width:560px;margin:0 auto;padding:20px 0 48px">
    <tbody>
    <tr style="width:100%">
        <td>
            <img src="{{ asset('images/logo.png') }}" alt="Logo"
                 style="display:block;outline:none;border:none;text-decoration:none;width:auto;height:42px"
                 width="130"
                 height="42"
            />

            <h1 style="font-size:24px;letter-spacing:-0.5px;line-height:1.3;font-weight:400;color:#484848;padding:17px 0 0">
                Votre lien de connexion
            </h1>
            <table align="center" width="100%" border="0" cellPadding="0" cellSpacing="0" role="presentation"
                   style="padding:27px 0 27px">
                <tbody>
                <tr>
                    <td>
                        <a href="{{ route('loginWithToken', $token) }}"
                           style="letter-spacing: 1px;text-transform: uppercase; line-height:100%;text-decoration:none;display:block;max-width:100%;background-color:#0075F0;border-radius:4px;font-weight:500;color:#fff;font-size:15px;text-align:center;padding:11px 23px 11px 23px"
                           target="_blank"><span><i
                                    style="letter-spacing: 23px;mso-font-width:-100%;mso-text-raise: 16.5px" hidden>&nbsp;</i></span><span
                                style="max-width:100%;display:inline-block;line-height:120%;mso-padding-alt:0px;mso-text-raise:8.25px">Connectez - vous</span><span><i
                                    style="letter-spacing: 23px;mso-font-width:-100%" hidden>&nbsp;</i></span></a>
                    </td>
                </tr>
                </tbody>
            </table>
            <p style="font-size:15px;line-height:1.4;margin:0 0 15px;color:#3c4149">Attention ! Ce lien est valable que
                pendant les 10 prochaines minutes.</p>
            <hr style="width:100%;border:none;border-top:1px solid #eaeaea;border-color:#dfe1e4;margin:42px 0 26px"/>
            <a href="https://google.com" style="color:#b4becc;text-decoration:none;font-size:14px" target="_blank">Pbi
                toolbox</a>
        </td>
    </tr>
    </tbody>
</table>
</body>

</html>
