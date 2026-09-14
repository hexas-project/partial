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
                    <p><strong>Part Two </strong></p>

                </div>
                <div class="mt-2  border p-5">
                    
                    <div class="border p-3" style="width: 500px">
                        <h4>Here’s a cue card -</h4>
                       <p> Describe a holiday you took recently. You should say:</p>
                        <ul>
                            <li>where you went</li>
                            <li>who you travelled with</li>
                            <li>what you did <br> and explain why you enjoyed your holiday.</li>                          
                        </ul>
                    </div>
                    <div>
  <p class="mt-3"><strong>After writing down these, your note may look as the following.</strong></p>
  <ul>
    <li>Cox's Bazar / natural beauty / longest sea beach / 120 km</li>
    <li>friends / 2 / childhood / get together</li>
    <li>water sports / beach sports / walking / shopping</li>
    <li>being with friends / train journey</li>
  </ul>
</div><br><br>

<div>
  <strong>PART-2</strong>
</div>

<div>
  <strong>Clothing</strong>
  <p>Describe the clothes you like to wear on special occasions.</p>
  <p>You should say:</p>
  <ul>
    <li>what the clothes are</li>
    <li>why you prefer these</li>
    <li>how you get them</li>
    <li>and explain what you like most about the clothes</li>
  </ul>
</div>

<div>
  <strong>Exhibitions</strong>
  <p>Describe an exhibition you (have) visited (recently).</p>
  <p>You should say:</p>
  <ul>
    <li>what the exhibition was about</li>
    <li>who arranged it</li>
    <li>who visited it</li>
    <li>and explain how you felt visiting the exhibition</li>
  </ul>
</div>

<div>
  <strong>Elderly/Old People</strong>
  <p>Describe an elderly/old man/woman (person) you know/respect/admire.</p>
  <p>You should say:</p>
  <ul>
    <li>who the person is</li>
    <li>how you know the person</li>
    <li>what kind of person he/she is</li>
    <li>and explain why you respect/admire him/her</li>
  </ul>
</div>

<div>
  <strong>Gifts/Presents</strong>
  <p>Describe a special gift/present you gave to someone.</p>
  <p>You should say:</p>
  <ul>
    <li>what it was</li>
    <li>who you gave it to</li>
    <li>what occasion you gave it on</li>
    <li>and explain how they felt receiving your gift/present</li>
  </ul>

  <p>Describe a special gift/present you were given / someone gave you.</p>
  <p>You should say:</p>
  <ul>
    <li>what it was</li>
    <li>who gave it to you</li>
    <li>what occasion you were given it on</li>
    <li>and explain how you felt receiving it</li>
  </ul>
</div>

<div>
  <strong>Historical Places</strong>
  <p>Describe a historical place in your hometown/country.</p>
  <p>You should say:</p>
  <ul>
    <li>what the place is</li>
    <li>what its historical importance is</li>
    <li>how to travel there</li>
    <li>and explain why you think people should visit the place</li>
  </ul>
</div>

<div>
  <strong>Important/Happy Events</strong>
  <p>Describe an important/a happy event in your life / an event that made you happy.</p>
  <p>You should say:</p>
  <ul>
    <li>what the event was</li>
    <li>where it took place</li>
    <li>what its importance was</li>
    <li>and explain why it made you happy</li>
  </ul>
</div>

<div>
  <strong>Leisure/Free Time</strong>
  <p>Describe your activities during your leisure/free time.</p>
  <p>You should say:</p>
  <ul>
    <li>how you usually spend your free time</li>
    <li>who you usually spend your free time with</li>
    <li>what outdoor activities you do in your free time</li>
    <li>and explain what you enjoy most doing in your free time</li>
  </ul>
</div>

<div>
  <strong>Lessons/Trainings</strong>
  <p>Describe lesson/training you enjoyed.</p>
  <p>You should say:</p>
  <ul>
    <li>what it was (on)</li>
    <li>why you took it</li>
    <li>how it helped you</li>
    <li>and explain what you enjoyed most in the lesson/training</li>
  </ul>
</div>

<div>
  <strong>Libraries</strong>
  <p>Describe a (public) library you visit regularly / a (public) library in your hometown.</p>
  <p>You should say:</p>
  <ul>
    <li>where it is located</li>
    <li>why you go there</li>
    <li>what its special features are</li>
    <li>and explain whether you're satisfied with it</li>
  </ul>

  <p>Describe a (public) library you (have) visited (recently).</p>
  <p>You should say:</p>
  <ul>
    <li>where it was</li>
    <li>why you went there</li>
    <li>what you did there</li>
    <li>and explain whether you were satisfied with it</li>
  </ul>
</div>

<div>
  <strong>Making Decisions</strong>
  <p>Describe a decision you made that changed your life (in a positive way).</p>
  <p>You should say:</p>
  <ul>
    <li>what it was</li>
    <li>why and when you took it</li>
    <li>who helped you taking the decision</li>
    <li>and explain how it changed your life</li>
  </ul>
</div>

<div>
  <strong>Movies</strong>
  <p>Describe a movie you (have) watched (recently).</p>
  <p>You should say:</p>
  <ul>
    <li>what the movie was</li>
    <li>who you watched it with</li>
    <li>what the movie was about</li>
    <li>and explain how you liked it</li>
  </ul>

  <p>Describe the movie you like most / your favourite movie.</p>
  <p>You should say:</p>
  <ul>
    <li>what the movie is</li>
    <li>what the movie is about</li>
    <li>why you like it</li>
    <li>and explain how it influences you</li>
  </ul>
</div>

<div>
  <strong>Natural Places</strong>
  <p>Describe a natural place in your hometown/country.</p>
  <p>You should say:</p>
  <ul>
    <li>what the place is</li>
    <li>what its natural importance is</li>
    <li>how to travel there</li>
    <li>and explain why you think people should visit the place</li>
  </ul>
</div>

<div>
  <strong>Outdoor/Open-Air Activities</strong>
  <p>Describe an outdoor/open air activity you (have) enjoyed (recently).</p>
  <p>You should say:</p>
  <ul>
    <li>what the activity was</li>
    <li>where it took place</li>
    <li>who you went with</li>
    <li>and explain why you enjoyed the activity</li>
  </ul>
</div>

<div>
  <strong>Open-Air/Street Markets</strong>
  <p>Describe an open air/street market in your city/hometown.</p>
  <p>You should say:</p>
  <ul>
    <li>where it is located</li>
    <li>what specialities / special features it has</li>
    <li>who usually visits / shops there</li>
    <li>and explain what you like most about it</li>
  </ul>
</div>

<div>
  <strong>Public Holidays</strong>
  <p>Describe a public holiday (celebrated) in your country.</p>
  <p>You should say:</p>
  <ul>
    <li>what it is</li>
    <li>when and how it's celebrated</li>
    <li>why it's celebrated / what its importance is</li>
    <li>and explain how you celebrate it</li>
  </ul>
</div>

<div>
  <strong>Radio Programmes</strong>
  <p>Describe a radio programme you listen to.</p>
  <p>You should say:</p>
  <ul>
    <li>what it is</li>
    <li>which channel it is broadcast on</li>
    <li>what it is about</li>
    <li>and explain why you enjoy the programme</li>
  </ul>
</div>

<div>
  <strong>Reading Books</strong>
  <p>Describe the book you like reading most / your favourite book.</p>
  <p>You should say:</p>
  <ul>
    <li>what the book is</li>
    <li>who the author is</li>
    <li>what the book is about</li>
    <li>and explain why you enjoy reading it</li>
  </ul>

  <p>Describe a book you (have) read recently.</p>
  <p>You should say:</p>
  <ul>
    <li>what the book was</li>
    <li>who the author was</li>
    <li>what the book was about</li>
    <li>and explain how you liked it</li>
  </ul>
</div>

<div>
  <strong>Restaurants</strong>
  <p>Describe the restaurant you like most / your favourite restaurant.</p>
  <p>You should say:</p>
  <ul>
    <li>what it is</li>
    <li>where it is located</li>
    <li>what specialities / special features it has</li>
    <li>and explain what you like most about it</li>
  </ul>
</div>

<div>
  <strong>Seasons</strong>
  <p>Describe the season you like most / your favourite season.</p>
  <p>You should say:</p>
  <ul>
    <li>what the season is</li>
    <li>why you like it</li>
    <li>what special characteristics it has</li>
    <li>and explain your activities during the season</li>
  </ul>
</div>

<div>
  <strong>Speaking Foreign Languages</strong>
  <p>Describe a person you (have) met (recently) who speaks a foreign language.</p>
  <p>You should say:</p>
  <ul>
    <li>who the person was</li>
    <li>what language he/she spoke</li>
    <li>when and how you met him/her</li>
    <li>and explain why you enjoyed talking to him/her</li>
  </ul>
</div>

<div>
  <strong>Special Skills</strong>
  <p>Describe a special skill you want / would like / would love to attain/achieve.</p>
  <p>You should say:</p>
  <ul>
    <li>what the skill is</li>
    <li>why you want to attain/achieve it</li>
    <li>how you are going to attain/achieve it</li>
    <li>and explain how you think it will help/benefit you</li>
  </ul>
</div>

<div>
  <strong>Special Talents</strong>
  <p>Describe a person who has some special talents.</p>
  <p>You should say:</p>
  <ul>
    <li>who the person is</li>
    <li>how you know him/her</li>
    <li>what sort of talents he/she has</li>
    <li>and explain how it helps him/her and/or others</li>
  </ul>
</div>

<div>
  <strong>Speeches/Talks/Lectures</strong>
  <p>Describe a speech/talk/lecture you enjoyed most.</p>
  <p>You should say:</p>
  <ul>
    <li>who delivered the speech</li>
    <li>where it was delivered</li>
    <li>what the speech was about</li>
    <li>and explain how it helped/influenced you</li>
  </ul>
</div>

<div>
  <strong>Sports</strong>
  <p>Describe a sports event you (have) enjoyed (recently).</p>
  <p>You should say:</p>
  <ul>
    <li>what it was</li>
    <li>where it was</li>
    <li>who you enjoyed it with</li>
    <li>and explain why you enjoyed the event</li>
  </ul>
</div>

<div>
  <strong>Stage/Theatrical Shows</strong>
  <p>Describe a show/performance on stage / a theatrical show/performance you enjoyed.</p>
  <p>You should say:</p>
  <ul>
    <li>what show it was</li>
    <li>where it took place</li>
    <li>what the quality of the show/production was</li>
    <li>and explain why you enjoyed the show</li>
  </ul>
</div>

<div>
  <strong>Start-ups</strong>
  <p>Describe a (small) business you want to start.</p>
  <p>You should say:</p>
  <ul>
    <li>what the business is</li>
    <li>why you want to start this business</li>
    <li>how it is going to benefit you</li>
    <li>and explain how you are preparing yourself for it</li>
  </ul>
</div>

<div>
  <strong>Traditional Events/Festivals</strong>
  <p>Describe a traditional event/festival (of/in your country) you enjoy most.</p>
  <p>You should say:</p>
  <ul>
    <li>what the event is</li>
    <li>when you celebrate it</li>
    <li>what its traditional value/importance is</li>
    <li>and explain why you enjoy celebrating it</li>
  </ul>
</div>

<div>
  <strong>Toys</strong>
  <p>Describe a toy you had.</p>
  <p>You should say:</p>
  <ul>
    <li>what it was</li>
    <li>who you got it from</li>
    <li>what its special features were</li>
    <li>and explain how you used to play with it</li>
  </ul>
</div>

<div>
  <strong>TV Programmes/Series/Shows</strong>
  <p>Describe a TV programme/series/show you watch regularly / your favourite TV programme/series/show.</p>
  <p>You should say:</p>
  <ul>
    <li>what the programme is</li>
    <li>which channel it is on</li>
    <li>what the programme is about</li>
    <li>and explain why you enjoy it</li>
  </ul>

  <p>Describe a TV programme/series/show you (have) watched recently/regularly.</p>
  <p>You should say:</p>
  <ul>
    <li>what the programme was</li>
    <li>which channel it was on</li>
    <li>what the programme was about</li>
    <li>and explain why you enjoyed it</li>
  </ul>
</div>

<div>
  <strong>Visiting/Travelling</strong>
  <p>Describe a (natural/historical) place you want / would like / would love to visit.</p>
  <p>You should say:</p>
  <ul>
    <li>what the place is</li>
    <li>how you know about the place</li>
    <li>when you are planning to travel</li>
    <li>and explain what you think you can enjoy the most</li>
  </ul>

  <p>Describe a (natural/historical) place you (have) visited (recently).</p>
  <p>You should say:</p>
  <ul>
    <li>what the place was</li>
    <li>who you travelled with</li>
    <li>how you knew about the place</li>
    <li>and explain what you enjoyed the most</li>
  </ul>
</div>

<div>
  <strong>Unique Places</strong>
  <p>Describe a unique place you (have) (ever) visited (recently).</p>
  <p>You should say:</p>
  <ul>
    <li>what the place was</li>
    <li>who you visited with</li>
    <li>how you knew about it</li>
    <li>and explain what you enjoyed the most</li>
  </ul>
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
