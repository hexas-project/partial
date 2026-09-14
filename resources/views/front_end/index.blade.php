<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hexa's Zindabazar Partial</title>
    
    <!-- Disable Ctrl+F Find -->
    <script>
        document.addEventListener('keydown', function(e) {
            // Disable Ctrl+F (Windows/Linux) and Cmd+F (Mac)
            if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
                e.preventDefault();
                e.stopPropagation();
                return false;
            }
        }, true);
    </script>
    
    <!-- Material Icons CSS (Fixed Link) -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }

        body {
            background-color: #d4f5ee !important;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80vh;
        }

        /* Container for the buttons */
        .button-container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        /* Styling for each button */
        .btns {
            background-color: #007bff !important;
            color: white !important;
            border: none !important;
            padding: 15px 30px !important;
            margin: 10px !important;
            font-size: 18px !important;
            cursor: pointer !important;
            border-radius: 5px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: background-color 0.3s;
        }

        .btns i {
            margin-right: 10px;

        }

        .btns:hover {
            background-color: #0056b3;
        }

        /* Log Out Button Styling */
        .logout-btn {
            background-color: #c4cbc0;
            color: #000000;
            border: none;
            padding: 10px 15px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
        }

        .logout-btn i {
            margin-right: 10px;
        }

        /* Optional: Add a heading style */
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .nav {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            padding: 10px 20px !important;
        }

        /* Footer Styles */
        .footer {
            text-align: center;
            padding: 30px;

        }

        /* Horizontal line above footer */
        hr {

            border-top: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        
        @if (Route::has('login'))
            <nav class="">
                @auth
                    <div class="nav">
                        <div class="logo">
                            <img src="{{asset('images/new logo.png')}}" width="140px" alt="Logo">
                        </div>
                        <!-- Authentication -->
                        {{-- <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-btn">
                                <i class="material-icons-outlined">exit_to_app</i>Log Out
                            </button>
                        </form> --}}
                        @include('front_end.layout.user')
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <div class="container">
        <div class="wrap">
            <h2 class="text-center" style="font-family:times new roman;">Partial </h3>
            <h4 class="text-center" style="font-family:times new roman;">Venue - HEXA'S Zindabazar </h4>

            <div class="button-container">
                <!-- Speaking Button with Icon -->
                <!--<a href="#" class="btns" id="speakingBtn">
                     <a href="{{ url('/index/speaking/test') }}" class="btns" id="speakingBtn"> 
                    <i class="material-icons-outlined">headset</i>Speaking
                </a>-->
                <!-- Listening Button with Icon -->
                <a href="{{ url('/index/listening/test') }}" class="btns" id="listeningBtn">
                    <i class="material-icons-outlined">headset</i>Listening
                </a>
                <!-- Writings Button with Icon -->
                <!-- <a href="#" class="btns" id="writingBtn"> -->
                <a href="{{ url('/index/writing/test') }}" class="btns" id="writingBtn">
                    <i class="material-icons-outlined">book</i>Writing
                </a>

                <!-- Reading Button with Icon -->
                <!-- <a href="#" class="btns" id="readingBtn"> -->
                <a href="{{ url('/index/reading/test') }}" class="btns" id="readingBtn">
                    <i class="material-icons-outlined">book</i>Reading
                </a>
                
            </div>

        </div>

    </div>
    <hr>
    <div class="footer">
        <p>Copyright © All rights reserved. Hexa's Zindabazar</p>
    </div>

</body>

</html>
