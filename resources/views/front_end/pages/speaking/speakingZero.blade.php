<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Material Icons CSS (Fixed Link) -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">

    <style>
        .nav-item {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-link {
            display: flex;
            align-items: center;
        }

        .navbar-nav.ml-auto {
            margin-left: auto;
            display: flex;
            align-items: center;
        }

        .material-icons-outlined {
            margin-right: 8px;
        }

        .question_part {
            border: 1px solid gray;
            margin-top: 15px;
            padding: 10px;
            border-radius: 5px;
            background-color: #F7F7F7;
            height: 85px;
        }

        /* Styling for question options */
        .options {
            list-style-type: none;
            padding-left: 0;
        }

        .options li {
            display: flex;
            align-items: center;
            margin: 10px 0;
            padding: 5px;
            gap: 10px;

        }

        .options li:hover {

            cursor: pointer;
        }

        .options input[type="radio"] {
            margin-right: 10px;
        }


        .question {
            margin-bottom: 15px;
        }

        .row {
            margin-top: 20px;
        }

        .tabs {
            display: flex;
            margin-bottom: 20px;
            justify-content: space-between;


        }

        .tab {
            display: flex;
            gap: 15px;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
            text-align: center;
            align-items: center;
            border-bottom: none;
            margin-right: 5px;
            border-radius: 4px 4px 0 0;
            transition: background-color 0.3s;
        }

        .tab:hover {
            /* background-color: #f1f1f1; */
        }

        .tab.active {

            color: green;

        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 25px;
        }



        .question-number.active {
            padding: 2px 4px;
            border: 3px solid green;

        }

        .question-link {
            text-decoration: none;
            color: gray;

        }

        .question-link.active {
            border: 2px solid gray;
            width: 25px;

        }

        .tab .question-links {
            display: none;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 5px;
        }

        .tab .question-placeholder {
            display: block;
            font-size: 12px;
            color: #999;
        }

        .tab.active .question-links {
            display: flex;
        }

        .tab.active .question-placeholder {
            display: none;
        }

        /* sidebar css  */
        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
            padding: 5px 10px;
        }

        .close-btn {
            cursor: pointer;
            font-size: 24px;
            padding: 4px 8px;
            border-radius: 4px;
        }

        .close-btn:hover {
            background-color: #ddd;
        }

        .sidebar {
            height: 85%;
            width: 0;
            position: fixed;
            top: 0;
            right: 0;
            background-color: #f1f1f1;
            overflow-x: hidden;
            transition: width 0.3s;
            /* padding: 20px; */
            z-index: 1050;
        }

        .sidebar.open {
            width: 300px;
        }

        #main-content {
            transition: margin-right 0.3s ease;
        }

        #main-content.shifted {
            margin-right: 300px;
        }

        /* Popup note style */
        .note-popup {
            position: absolute;
            background: yellow;
            padding: 10px;
            border: 1px solid #ccc;
            cursor: move;
            z-index: 2000;
            width: 200px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
        }

        .note-popup .close-note {
            position: absolute;
            top: 2px;
            right: 5px;
            cursor: pointer;
            font-weight: bold;
            color: #333;
        }

        .custom-context-menu {
            position: absolute;
            background: white;
            border: 1px solid #ccc;
            z-index: 2100;
        }

        .custom-context-menu div {
            padding: 8px 12px;
            cursor: pointer;
        }

        .custom-context-menu div:hover {
            background: #eee;
        }

        ul.options {
            line-height: 5px;
        }

        li {
            margin-top: 15px;
        }

        .ques {
            font-weight: bold;
        }

        /* map style  */
        .map-wrapper {
            position: relative;
            width: 800px;
            margin: 40px auto;
        }

        .map-wrapper img {
            width: 100%;
            display: block;
        }

        .map-wrapper input[type="text"] {
            position: absolute;
            width: 125px;
            padding: 2px 5px;
            border: 1px solid #000;
            border-radius: 4px;
        }

        /* Position inputs based on image layout */
        .input-16 {
            top: 535px;
            left: 50px;
        }

        .input-17 {
            top: 220px;
            left: 65px;
        }

        .input-18 {
            top: 220px;
            left: 314px;
        }

        .input-19 {
            top: -5px;
            right: 16px;
        }

        .input-20 {
            top: 305px;
            right: 15px;
        }

        .mark,
        mark {
            padding: 0px !important;

        }

        mark[data-tooltip] {
            position: relative;
            cursor: pointer;
        }

        mark[data-tooltip]::after {
            content: '';
            position: absolute;
            width: 10px;
            height: 10px;
            background: orange;
            border: 1px solid #333;
            border-radius: 3px;
            bottom: 70%;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s;
            z-index: 1000;
        }

        mark[data-tooltip]:hover::after {
            opacity: 1;
        }
    </style>
</head>

<body>
    <form action="" method="" id="testForm">
        @csrf
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar">
            <div class="sidebar-header">
                <h5>Notes</h5>
                <span class="close-btn">&times;</span>
            </div>

        </div>
        <div id="main-content">
            <nav class="navbar navbar-expand-lg" style="background-color: #e9bec2;">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link active" aria-current="page" href="#">-->
                            <!--        <strong id="timer">30 minutes remaining</strong>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <!--<li class="nav-item">-->
                            <!--    <span class="material-icons-outlined">headset_mic</span>-->
                            <!--    <audio id="testAudio" src="{{ asset('audio/Test-10.mp3') }}"-->
                            <!--        preload="auto"></audio>Audio is-->
                            <!--    playing...-->

                            <!--</li>-->
                        </ul>
                        <!-- Aligning the Finish button and note icon to the right -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item me-3">
                                <a id="finishButton" class="btn btn-outline-dark" href="{{ route('index') }}">Finish test</a>
                            </li>
                            <li class="nav-item">
                                <span id="noteToggle" class="material-icons-outlined">note_alt</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <!-- question part 1 -->
            <div class="container-fluid px-5">

                <div class="text-center mt-4">
                    <h4>Speaking </h4>
                    <p><strong>Part One </strong></p>

                </div>
                <div class="mt-2 mb-5 border p-5">
                    <div>
  <strong>Some Yes/No Questions --------</strong>
  <p>Do you like sports?</p>
  <p>Do you read books?</p>
  <p>Do you visit your relatives?</p>
  <p>Do you exercise every day?</p>
  <p>Do you know how to swim?</p>
  <p>Do you live with your family?</p>
  <p>Do you love watching movies?</p>
  <p>Do you enjoy listening to music?</p>
  <p>Do you enjoy eating at restaurant?</p>
  <p>Do you go to visit different places on your holiday?</p>
</div>

<div>
  <strong>PART-1</strong>
</div>

<div>
  <strong>Birthday</strong>
  <p>When's your birthday?</p>
  <p>Do you arrange a party on your birthday?</p>
  <p>Do you receive a lot of gifts on your birthday?</p>
  <p>Which has been the most enjoyable birthday so far in your life?</p>
</div>

<div>
  <strong>Clothing</strong>
  <p>How important are clothes and fashion to you?</p>
  <p>What kind of clothes do you dislike wearing?</p>
  <p>What clothes do you wear to special occasions?</p>
  <p>How different are the clothes you wear now from those you wore 10 years ago?</p>
</div>

<div>
  <strong>Computing</strong>
  <p>Do you enjoy computing?</p>
  <p>What are some common activities you do on a computer?</p>
  <p>How does a computer help you with your study/job?</p>
  <p>Do you spend a lot of your time on computing?</p>
</div>

<div>
  <strong>Cooking</strong>
  <p>Do you like cooking?</p>
  <p>What dishes do you enjoy cooking?</p>
  <p>Do you enjoy cooking more or eating?</p>
  <p>Who does the cooking in your family?</p>
</div>

<div>
  <strong>Dancing</strong>
  <p>Do you enjoy dancing?</p>
  <p>What sorts of dance do you like most?</p>
  <p>Has anyone ever taught you to dance?</p>
  <p>Can you tell me about any traditional dance in your country?</p>
</div>

<div>
  <strong>Eating Out</strong>
  <p>Do you enjoy eating out?</p>
  <p>How often do you eat out?</p>
  <p>Have you got a favourite restaurant?</p>
  <p>Do you like eating at home more or eating out?</p>
</div>

<div>
  <strong>Emails</strong>
  <p>Do you send or receive emails regularly?</p>
  <p>Who do you usually communicate with by emails?</p>
  <p>How beneficial is it for you to communicate with others by emails?</p>
  <p>What are the some problems have you experienced while sending emails?</p>
</div>

<div>
  <strong>Exercise</strong>
  <p>Do you exercise every day?</p>
  <p>How important do you think exercising is for you?</p>
  <p>When do you usually exercise?</p>
  <p>Do you do it alone or with a partner?</p>
</div>

<div>
  <strong>Family</strong>
  <p>Do you live in a small family or in a large family?</p>
  <p>What are the some things you like most about your family?</p>
  <p>Do you enjoy living with your family?</p>
  <p>What are the some stuff do you enjoy doing with your family?</p>
</div>

<div>
  <strong>Festivals</strong>
  <p>Which are your favourite festivals?</p>
  <p>Who do you usually enjoy celebrating these festivals with?</p>
  <p>Do you enjoy these festivals now more than you did as a child?</p>
  <p>Which has been the most enjoyable festival so far in your life?</p>
</div>

<div>
  <strong>Friends</strong>
  <p>Do you have friends?</p>
  <p>What are the some things you like most about your friends?</p>
  <p>What are the some activities you enjoy doing with your friends?</p>
  <p>How important do you think your friends are in your life?</p>
</div>

<div>
  <strong>Foods</strong>
  <p>What foods do you like most?</p>
  <p>What are the some foods you dislike eating?</p>
  <p>Can you cook?</p>
  <p>Do you prefer having your meals more at home or at a restaurant?</p>
</div>

<div>
  <strong>Future Plans</strong>
  <p>Why are you taking the IELTS test?</p>
  <p>What are you planning to do in the next 5 years?</p>
  <p>What is the first thing you'll do when you arrive at the new place?</p>
  <p>What do you want to do after you finish your study?</p>
</div>

<div>
  <strong>Hobbies</strong>
  <p>Do you have any hobbies?</p>
  <p>How long do you usually spend on your hobbies?</p>
  <p>How do your hobbies benefit you?</p>
  <p>Do you still have such a hobby that you had in your childhood?</p>
</div>

<div>
  <strong>Holidays</strong>
  <p>How do you usually spend your holidays?</p>
  <p>What are the some places do you love visiting on your holidays?</p>
  <p>Do you like spending your holidays more with your family or with your friends?</p>
  <p>Do you enjoy your holidays more now than you did as a child?</p>
</div>

<div>
  <strong>Hometown</strong>
  <p>What's your hometown like?</p>
  <p>What's special about your hometown?</p>
  <p>Is it easy to travel around your hometown?</p>
  <p>Why do you think people should visit your hometown?</p>
</div>

<div>
  <strong>Languages You Speak</strong>
  <p>How many languages can you speak?</p>
  <p>Why did you learn a foreign language?</p>
  <p>How did you learn it?</p>
  <p>How does your speaking of a foreign language benefit you?</p>
</div>

<div>
  <strong>Leisure/Free Time</strong>
  <p>How do you usually spend your leisure time?</p>
  <p>Is there anything particular you like to do in your free time?</p>
  <p>Do you enjoy indoor or outdoor activities more in your free time?</p>
  <p>Do you enjoy your leisure time now more than you did as a child?</p>
</div>

<div>
  <strong>Mobile Phones</strong>
  <p>Have you got a mobile phone?</p>
  <p>Who do you usually communicate with on the phone?</p>
  <p>How does your phone benefit you?</p>
  <p>Have you ever experienced anything weird on the phone?</p>
</div>

<div>
  <strong>Movies</strong>
  <p>Do you enjoy watching movies?</p>
  <p>What are some of your favourite types of movies?</p>
  <p>Do you spend a lot of time on watching movies?</p>
  <p>Have you ever watched making of a movie?</p>
</div>

<div>
  <strong>Neighbourhood</strong>
  <p>What's your neighbourhood like?</p>
  <p>Do you get along well with your neighbours?</p>
  <p>What do you like most about your neighbourhood?</p>
  <p>What are the some difficulties you find to live there?</p>
</div>

<div>
  <strong>Radio Programmes</strong>
  <p>Do you listen to radio programmes?</p>
  <p>How often do you listen to a radio programme?</p>
  <p>What are some of your favourite programmes on radio?</p>
  <p>How would you feel if you were an RJ?</p>
</div>

<div>
  <strong>Reading Books</strong>
  <p>Do you enjoy reading books?</p>
  <p>What sorts of books do you like reading most?</p>
  <p>Where do you usually collect your books from?</p>
  <p>Do you share your reading experiences with your friends?</p>
</div>

<div>
  <strong>Shopping</strong>
  <p>Do you enjoy shopping?</p>
  <p>What things do you like to shop more?</p>
  <p>How often do you go shopping / to shopping malls?</p>
  <p>What things do you dislike about shopping?</p>
</div>

<div>
  <strong>Sports</strong>
  <p>Do you like sports?</p>
  <p>What sports do you enjoy most?</p>
  <p>Do you enjoy watching sports more or playing them?</p>
  <p>What are the some sports you'd love to play but you cannot?</p>
</div>

<div>
  <strong>Technology</strong>
  <p>Do you enjoy using technology?</p>
  <p>Which items of technology do you use the most?</p>
  <p>Do you find technology convenient for your study/job?</p>
  <p>What problems do you find in using technology?</p>
</div>

<div>
  <strong>The Internet</strong>
  <p>Do you use the internet?</p>
  <p>When was the first time you used the Internet?</p>
  <p>What are the some websites you usually visit?</p>
  <p>How does the internet help you with your study/job?</p>
</div>

<div>
  <strong>The School You Studied at When You Were a Child</strong>
  <p>Where did you study at when you were a child?</p>
  <p>What did you like most about it?</p>
  <p>Did you have friends there?</p>
  <p>What do you miss about the school?</p>
</div>

<div>
  <strong>The Place Where You Live In</strong>
  <p>Do you live in a house or in a flat?</p>
  <p>What do you like most about your home/flat?</p>
  <p>Which is your favourite place there?</p>
  <p>What a thing do you dislike about it?</p>
</div>

<div>
  <strong>The Place Where You Grew Up</strong>
  <p>Did you grow up in a village or in a city?</p>
  <p>Do you still live there?</p>
  <p>What did you like most about the place?</p>
  <p>What a thing did you dislike about the place?</p>
</div>

<div>
  <strong>Traffic Where You Live</strong>
  <p>How do most people travel to work where you live?</p>
  <p>What traffic problems are there in your area?</p>
  <p>How do the traffic problems affect you?</p>
  <p>How would you reduce the traffic problems in your area?</p>
</div>

<div>
  <strong>Travelling</strong>
  <p>Do you enjoy travelling?</p>
  <p>What are the some places you love travelling to?</p>
  <p>Do you enjoy visiting places more with your friends or with your family?</p>
  <p>What are the some things you never forget to take with you when you are travelling?</p>
</div>

<div>
  <strong>Watching TV</strong>
  <p>Do you enjoy watching TV?</p>
  <p>What are the some channels you like most?</p>
  <p>What programmes/shows do you enjoy watching most?</p>
  <p>Do you spend a lot of your time on watching TV?</p>
</div>

<div>
  <strong>Weather</strong>
  <p>What's the weather like in your country?</p>
  <p>What's your favourite weather?</p>
  <p>What do you enjoy doing in your favourite weather?</p>
  <p>Does weather affect your mood?</p>
</div>

<div>
  <strong>Weddings</strong>
  <p>Do you enjoy wedding parties?</p>
  <p>When was the last time you went to a wedding?</p>
  <p>When was the last time there was a wedding in your family?</p>
  <p>What do you like most about the weddings?</p>
</div>

                </div>


            </div>
    </form>

    </div>
    </div>


    <div class="tabs fixed-bottom " style="background-color: white; margin:0px; margin-top: 100px;">
        <!--<div class="tab active" data-tab="part1">-->
        <!--    <span class="tab-title">Part 1</span>-->
        <!--    <div class="question-links">-->
        <!--        <a href="#" class="question-link" data-question="1">1</a>-->
        <!--        <a href="#" class="question-link" data-question="2">2</a>-->
        <!--        <a href="#" class="question-link" data-question="3">3</a>-->
        <!--        <a href="#" class="question-link" data-question="4">4</a>-->
        <!--        <a href="#" class="question-link" data-question="5">5</a>-->
        <!--        <a href="#" class="question-link" data-question="6">6</a>-->
        <!--        <a href="#" class="question-link" data-question="7">7</a>-->
        <!--        <a href="#" class="question-link" data-question="8">8</a>-->
        <!--        <a href="#" class="question-link" data-question="9">9</a>-->
        <!--        <a href="#" class="question-link" data-question="10">10</a>-->
        <!--    </div>-->
        <!--    <span class="question-placeholder">0 of 10</span>-->
        <!--</div>-->
        <!--<div class="tab " data-tab="part2">-->
        <!--    <span class="tab-title">Part 2</span>-->

        <!--    <span class="question-placeholder">0 of 10</span>-->
        <!--</div>-->
        <!--<div class="tab " data-tab="part3">-->
        <!--    <span class="tab-title">Part 3</span>-->

        <!--    <span class="question-placeholder">0 of 10</span>-->
        <!--</div>-->
        <!--<div class="tab " data-tab="part4">-->
        <!--    <span class="tab-title">Part 4</span>-->

        <!--    <span class="question-placeholder">0 of 10</span>-->
        <!--</div>-->
        <div class="fixed-bottom d-flex justify-content-end mb-5 px-5">
            <!-- Left Arrow -->
            <button id="prev-question" class="btn btn-dark me-2" style="font-size: 1.5rem;">&#8592;</button>
            <!-- Right Arrow -->
            <button id="next-question" class="btn btn-dark ms-2" style="font-size: 1.5rem;">&#8594;</button>
        </div>

    </div>
    </div>



</body>

</html>
