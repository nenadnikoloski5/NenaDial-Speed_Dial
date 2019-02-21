<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>


            <script>
                    function goTo(){
                        let input = document.querySelector("#inputSearchInput");
                        window.location = `https://www.google.com/search?client=opera&q=${input.value}&sourceid=opera&ie=UTF-8&oe=UTF-8`;
                    }
                    </script>
       
    @guest
    <script>
        window.location = "login"
    </script>
    @else
    <div id="app">

       

    
    <div id="mainDiv">

        <div id="logOut">
                <a id="logOutBtn" class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
        </div>

        <div id="inputSearchDiv">

                <i class="fab fa-google fa-lg"></i>
            <input id="inputSearchInput" type="text" placeholder="Search the internet">
            <button onclick="goTo()" id="inputSearchBtn">
             <i class="fas fa-search"></i>
            </button>
        </div>

        <li  style="
        background: white;
    ">
        </li>

        

        <example-component :user-items="{{$userItems}}" ></example-component>


    </div>


</div>






<script src="{{asset('js/app.js')}}"> </script>
    @endguest


    

    </body>
</html>
