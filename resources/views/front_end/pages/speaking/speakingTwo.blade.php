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
                    
                    <h4><strong>Speaking  </strong></h4>
                     <p><strong>Part Three </strong></p>

                </div>
                <div class="mt-2 mb-5 border p-5">
                    <div>
  <p><strong>Let's have a look at some general questions you could be asked relating to the topic in part 2 (holidays).</strong></p>
  <strong>Holidays — General Questions</strong>
  <ul>
    <li>Is it important to travel and take holidays in different places?</li>
    <li>Are people travelling more these days?</li>
    <li>Is it better to travel alone or in a group?</li>
    <li>What kind of problems is travel and tourism causing?</li>
    <li>What's the travel and tourism sector like in your country?</li>
  </ul>
</div>

<div>
  <strong>PART-3</strong>
</div>

<div>
  <strong>Clothing</strong>
  <p>What clothes do people wear for formal occasions in your country?</p>
  <p>Do clothes represent people's culture?</p>
  <p>What are the traditional clothes of your country?</p>
  <p>Do you think people's clothing tells about their personality?</p>
  <p>Is it important for people to maintain certain dress code for certain occasions?</p>
</div>

<div>
  <strong>Exhibitions</strong>
  <p>Are exhibitions important?</p>
  <p>How do you think exhibitions influence people?</p>
  <p>Do you think there are more exhibitions being arranged these days?</p>
  <p>Should students be encouraged to visit exhibitions?</p>
  <p>Should exhibitions be patronised/funded by the government?</p>
</div>

<div>
  <strong>Elderly/Old People</strong>
  <p>Is your country with a large number of elderly populations?</p>
  <p>What are some problems elderly people face in your country?</p>
  <p>How do you think old people should be treated?</p>
  <p>How important do you think it is to respect and admire elderly people?</p>
  <p>What should be done to make old people's life better and smoother?</p>
</div>

<div>
  <strong>Gifts</strong>
  <p>Is it important to give other people gifts?</p>
  <p>What occasions do people give gifts in your country?</p>
  <p>Is it better to give someone money or some object as gifts?</p>
  <p>Is it a good idea to give children gifts if they do something good (e.g. good result)?</p>
  <p>What do you consider reasonable gifts to give children?</p>
</div>

<div>
  <strong>Historical Places</strong>
  <p>Is it important to preserve the historical/natural places in a country?</p>
  <p>Do people in your country visit historical/natural places quite often?</p>
  <p>Do you think people visit historical/natural places these days more than ever before?</p>
  <p>Why do you think foreigners should visit the historical/natural places in your country?</p>
  <p>What do you think should be done to attract people to visit these places?</p>
</div>

<div>
  <strong>Important/Happy Events</strong>
  <p>What do you think makes someone happy?</p>
  <p>Is happiness important?</p>
  <p>Do you think people living earlier were happier than people living now?</p>
  <p>Can a family party or get together make someone happy?</p>
  <p>What should someone do when they're upset?</p>
</div>

<div>
  <strong>Leisure/Free Time</strong>
  <p>What are some common activities people do in their free time in your country?</p>
  <p>Is it important for people to relax in their leisure time?</p>
  <p>Is it better to spend your free time doing outdoor activities or indoor activities?</p>
  <p>How should students spend their free time?</p>
  <p>Do you think people should do something creative or productive in their leisure time?</p>
</div>

<div>
  <strong>Lessons/Trainings</strong>
  <p>What do you think makes a lesson/training enjoyable?</p>
  <p>Is it important for people to take different lessons/trainings?</p>
  <p>What are some popular lessons/trainings people take in your country?</p>
  <p>Are people more interested to take practical lessons/trainings these days?</p>
  <p>How do you think some extra training can benefit people's career?</p>
</div>

<div>
  <strong>Libraries</strong>
  <p>How important do you think libraries are?</p>
  <p>Are there enough public libraries in your country?</p>
  <p>Do people visit libraries more often now than they did in the past?</p>
  <p>Should children be encouraged to join and visit libraries?</p>
  <p>How do you feel about online libraries?</p>
</div>

<div>
  <strong>Making Decisions</strong>
  <p>Is it important for people to make their own decisions?</p>
  <p>Should people talk to their families before they make any important decisions?</p>
  <p>Should children be allowed to make their own decisions?</p>
  <p>Do you think parents should decide what their children study?</p>
  <p>Do children now have more freedom to make their own decisions?</p>
</div>

<div>
  <strong>Movies</strong>
  <p>Are movies a popular means of entertainment in your country?</p>
  <p>Do you think the contents of movies are changing these days?</p>
  <p>How do you think movies affect people's life?</p>
  <p>How do you feel about working in the film industry?</p>
  <p>Should children be allowed to watch all sorts of movies?</p>
</div>

<div>
  <strong>Open Air/Outdoor Activities</strong>
  <p>Do people enjoy outdoor activities in your country?</p>
  <p>What do you think is the importance of open air activities?</p>
  <p>How do outdoor activities influence a country's culture?</p>
  <p>Do you think the attraction of open air activities is mounting?</p>
  <p>Should young people be encouraged to spend more time on outdoor activities?</p>
</div>

<div>
  <strong>Open Air/Street Markets</strong>
  <p>Are there a lot of open air/street markets in your country?</p>
  <p>Who usually shops from these open air/street markets?</p>
  <p>Why do you think some people prefer open air/street markets?</p>
  <p>Is it better to shop in an open air/street market than to shop in a shopping mall or superstore?</p>
  <p>What problems do people experience while shopping in an open air/street market?</p>
</div>

<div>
  <strong>Public Holidays</strong>
  <p>What are some public holidays in your country?</p>
  <p>How important do you think it is to celebrate public holidays?</p>
  <p>What are some common activities people do on public holidays in your country?</p>
  <p>How do public holidays differ in your country from other countries?</p>
  <p>Is there anything you would love to change about the way people celebrate public holidays in your country?</p>
</div>

<div>
  <strong>Radio Programmes</strong>
  <p>Do radio programmes benefit people?</p>
  <p>How do you think radio programmes affect people's everyday life?</p>
  <p>How do you feel about internet radio?</p>
  <p>Is it alright to listen to radio programmes while driving?</p>
  <p>Do you think people listen to radio programmes these days more often than ever before?</p>
</div>

<div>
  <strong>Reading Books</strong>
  <p>How important do you think reading books is?</p>
  <p>How do you think reading books benefits people?</p>
  <p>How do you feel about e-books?</p>
  <p>Is it better to read a paper book or an e-book?</p>
  <p>Should students be encouraged to read books other than their textbooks?</p>
</div>

<div>
  <strong>Restaurants</strong>
  <p>Do you think people eat out more these days than ever before?</p>
  <p>Why do you think people go to have their meals at a restaurant?</p>
  <p>What are some problems people experience due to eating at restaurants?</p>
  <p>Are there a lot of restaurants in your hometown?</p>
  <p>Do you think running a restaurant business has become a trend these days?</p>
</div>

<div>
  <strong>Seasons</strong>
  <p>What's the weather like in your country?</p>
  <p>Does weather change from season to season in your country?</p>
  <p>How has the climate changed in your country during the last couple of decades?</p>
  <p>Does changing of seasons affect people's mood?</p>
  <p>Do seasons affect the farming/production of your country?</p>
</div>

<div>
  <strong>Speaking Foreign Languages</strong>
  <p>Is it important to learn or be able to speak foreign languages?</p>
  <p>What languages do you think are good choices to learn as foreign languages?</p>
  <p>Do people learn more foreign languages these days?</p>
  <p>Do you think globalization influences people to learn foreign languages?</p>
  <p>What problems do people knowing no foreign languages encounter at their work?</p>
</div>

<div>
  <strong>Special Skills</strong>
  <p>Is it important for people to learn different skills?</p>
  <p>What practical skills do you think people should learn?</p>
  <p>Is the ability to speak foreign languages a useful skill?</p>
  <p>Do you think having extra skills helps people with their career?</p>
  <p>When's the best age for someone to start learning practical skills?</p>
</div>

<div>
  <strong>Special Talents</strong>
  <p>Can special talents make any difference?</p>
  <p>How do you think children with special talents should be raised up?</p>
  <p>Do people who have special talents get more importance these days?</p>
  <p>What are some difficulties people with special talents experience?</p>
  <p>Do you think it's a blessing to have some special talents?</p>
</div>

<div>
  <strong>Speeches/Talks/Lectures</strong>
  <p>What makes a speech a great/attractive speech?</p>
  <p>How do you think a good speech influences others?</p>
  <p>Is it important for someone to be knowledgeable to deliver a great speech?</p>
  <p>Does a good speech require a lot of practice beforehand?</p>
  <p>Is it better to speak slow or fast when you deliver your speech?</p>
</div>

<div>
  <strong>Sports</strong>
  <p>Is it important for people to play sports?</p>
  <p>How do you think sports benefit people?</p>
  <p>How do you feel about international sport events?</p>
  <p>Are young people more interested in choosing sports as career these days?</p>
  <p>Do you think parents should encourage their children to play or watch sports?</p>
</div>

<div>
  <strong>Stage/Theatrical Shows</strong>
  <p>Do people enjoy stage shows in your country?</p>
  <p>What do you think is the importance of stage shows?</p>
  <p>How do stage shows influence a country's culture?</p>
  <p>Do you think the attraction of stage shows is falling?</p>
  <p>Should young people be encouraged to get involved in theatrical activities?</p>
</div>

<div>
  <strong>Start-ups</strong>
  <p>Is it a good idea to start your own business rather than working for others?</p>
  <p>What do you think is a good business to start?</p>
  <p>What qualities do you think someone should have to run a business?</p>
  <p>Why are young people more interested to start their own business?</p>
  <p>Is it important for someone to study business before they start a business?</p>
</div>

<div>
  <strong>Traditional Events</strong>
  <p>Is it important for people to celebrate their traditional events?</p>
  <p>How do you think people's attitude towards traditional events is changing?</p>
  <p>Should parents or schools introduce traditional events to children?</p>
  <p>Why do you think some people are unaware of their culture and tradition?</p>
  <p>How important is it for young people to know their own culture and tradition?</p>
</div>

<div>
  <strong>Toys</strong>
  <p>Why is it important for children to play with toys?</p>
  <p>What kind of toys do children in your country usually play with?</p>
  <p>Is it a good idea to give children toys as gifts?</p>
  <p>Why do you think some people keep their toys even after being adult?</p>
  <p>Do you think the kinds of toys children play with vary from country to country?</p>
</div>

<div>
  <strong>TV Programmes</strong>
  <p>Do you think people watch TV programmes these days more often than ever before?</p>
  <p>Do TV programmes reflect the real picture of society?</p>
  <p>How do you think TV programmes affect people's everyday life?</p>
  <p>Is it okay for children to watch cartoons on TV?</p>
  <p>How long should children be allowed to watch TV every day?</p>
</div>

<div>
  <strong>Visiting/Travelling</strong>
  <p>Is it important to visit different places?</p>
  <p>Why do you think people travel more these days?</p>
  <p>What problems do people experience when they visit a new place?</p>
  <p>Is it better to visit a natural place than a historical place?</p>
  <p>Why do you think people should visit your hometown?</p>
</div>

<div>
  <strong>Unique Places</strong>
  <p>What do you think makes a place unique?</p>
  <p>Is it important for the government to take good care of unique places?</p>
  <p>Should unique places be open to everyone to visit?</p>
  <p>Why do you think people should visit the unique places in your country?</p>
  <p>Is it better to travel alone or in a group?</p>
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
