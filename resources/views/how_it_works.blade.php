<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .m-t-md {
            margin-top: 50px;
        }
    </style>

</head>
<body >
<div class="container">
    @if (Route::has('login'))
        <div class="col-md-12">
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Home</a>

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                    @endauth
            </div>
        </div>
    @endif

    <div class="row m-t-md  ">

        <div class="col-md-12">
            <h1>How {{ config('app.name', 'Laravel') }} Works</h1>
            <p></p>
        </div>

            <div class="col-md-12">
                <ol>
                    <li>
                        <h3>Set your Budget</h3>
                        <p>In YNAB, you budget out the amount you want to earn back</p>
                    </li>

                    <li>
                        <h3>The {{ config('app.name', 'Laravel') }} Balancer</h3>
                        <p>Our Balancer Tool takes your budgeted amount and zeroes
                        it out using a fake transaction (this does not affect your
                        real bank accounts at all, in fact we have no access to
                            any of your bank accounts or bank account information)</p>
                        <img src="{{ asset('img/balancer.png') }}" alt="{{ config('app.name', 'Laravel') }} Balancer"/>
                    </li>

                    <li>
                        <h3>Set reward limits & Complete Tasks </h3>
                        <p>As you complete Habitica Tasks, you earn back the Budgeted amount in the Available column.
                            For example, if a task is set to “Hard”, then you can reward yourself $1.00 of
                            spending availability in YNAB.</p>
                        <img src="{{ asset('img/rewards.png') }}" alt="{{ config('app.name', 'Laravel') }} Rewards"/>
                    </li>

                    <li>
                        <h3>Guilt-Free Spending!</h3>
                        <p>Now you can spend money on your vintage record collection knowing that you doubly earned
                            it by get your tasks done for the month and building new habits!</p>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</body>
</html>
