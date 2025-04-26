<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batavia</title>
    <style>
        html * {
            font-family: 'system-ui', 'sans-serif';
            line-height: 1.5;
        }

        body {
            background-color: #e2400f !important;
        }

        .content__header {
            display: flex;
            justify-content: center;
        }

        .title__header {
            font-size: 40px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .content__container {
            margin-left: 50px;
            margin-right: 50px;
            padding-top: 30px;
            padding-bottom: 30px;
            background-color: #e2400f !important;
        }

        .content__header__logo {
            max-width: 330px;
            margin: 0 auto !important;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .header-bureau-logo {
            margin-bottom: 10px;
        }

        .content__footer__logo {
            max-width: 250px;
            margin-bottom: 20px;
            margin: 0 auto !important;
        }

        .content__footer__address {
            margin: 0 auto !important;
            width: 300px;
        }

        .content__footer__address a {
            text-decoration: none;
            color: #f5f5f5;
        }

        .content__footer__address p {
            text-align: center;
            font-size: 12px;
            color: #f5f5f5;
        }

        .message-box__container {
            background-color: #fff;
            border-radius: 5px;
            max-width: 700px;
            padding: 20px 20px 10px 20px;
            color: #000000;
            margin: 0 auto !important;
        }

        .message-box__body__comment-box {
            background-color: #f2f2f2;
            border-radius: 5px;
            padding: 10px 15px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .message-box__body p {
            font-size: 14px;
        }

        .message-box__button {
            background-color: #e2400f;
            border-radius: 5px;
            color: #fff;
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin: 20px auto;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            width: fit-content;
        }

        .footer-pcu-logo {
            max-width: 250px;
            padding: 15px 15px 5px 15px;
        }

        @media only screen and (max-width: 600px) {
            .content__container {
                margin: 0px !important;
            }

            .content__header__logo {
                max-width: 300px !important;
            }

            .message-box__container {
                border-radius: 0px !important;
                padding: 30px 25px 25px 25px !important;
            }

            .message-box__body__comment-box {
                padding: 10px 20px !important;
            }

            .content__footer__address p {
                font-size: 11px !important;
                color: #ffffff !important;
            }
        }
    </style>
    @yield('style')
</head>

<body>
    <div class="content__container">
        <div class="content__header">
            <div class="content__header__logo">
                <h1 class="title__header">Batavia</h1>
            </div>
        </div>
        <div class="message-box__container">
            <div class="message-box__body">
                @yield('content')
            </div>
        </div>
        <div class="content__footer">
            <div class="content__footer__address">
                <p>
                    @copyright Batavia 2025
                </p>
            </div>
        </div>
    </div>
</body>
</html>