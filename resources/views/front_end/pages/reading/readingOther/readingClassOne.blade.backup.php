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
            height: auto;
            font-weight: bold;
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
            padding: 5px;
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

        .scroll-box {
            height: 70vh;
            overflow-y: auto;
            overflow-x: hidden;
            /* white-space: pre-line; */
            word-wrap: break-word;
            font-size: 16px;
        }

        .question_site {
            height: 70vh;
            overflow-y: auto;
            overflow-x: hidden;

        }

        .highlight {
            background-color: yellow;
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

        .ques {
            font-weight: bold;
        }

        ul.options {
            line-height: 5px;
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
    <form action="{{ route('reading.submit') }}" method="POST" id="testForm">
        @csrf

        {{-- hidden input  --}}
        <input type="hidden" name="test_name" value="class18_reading">
        <input type="hidden" name="student_id" value="{{ auth()->user()->id }}">
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
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#"><strong id="timer">60
                                        minutes
                                        remaining</strong></a>
                            </li>

                        </ul>
                        <!-- Aligning the Finish button and note icon to the right -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item me-3">
                                <button class="btn btn-outline-dark" id="finishButton">Finish test</button>
                            </li>
                            <li class="nav-item">
                                <span id="noteToggle" class="material-icons-outlined">note_alt</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- CUSTOM CONTEXT MENU -->
            <div id="customContextMenu"
                style="
                position: absolute;
                background: white;
                border: 1px solid #ccc;
                border-radius: 4px;
                padding: 5px;
                z-index: 999;
                display: none;
                box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
                <div id="highlightOption" style="padding: 5px; cursor: pointer;">🖍️ Highlight</div>
                <div id="notesOption" style="padding: 5px; cursor: pointer;">📝 Notes</div>
                <div id="allClear" style="padding: 5px; cursor: pointer;">📝 clear all</div>
            </div>
            <!-- question part 1 -->
            <div class=" container-fluid px-5">
                <div class="tab-content active" id="part1" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Reading</h4>
                        <p> Notes<br>
                        </p>
                    </div>
                    <div class="mt-4">


                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">


                                <div class="scroll-box" style="text-align:left;">
                                    <h3><strong>Astoria's Private Rental Accommodation Market </strong></h3>
                                    <p>You should spend about 20 minutes on Questions 1-14, which are based on Reading
                                        Passage 1 below.</p>

                                    <p>People spend time in private rental accommodation for a variety of reasons. The two most common ones are while waiting for public housing allocation and while saving to move on to home ownership. However, rental accommodation is losing its transitional status in Astoria. The percentage of long-term renters is increasing as these people are unable to have access to public housing or home ownership.<br><br>
                                    
                                    
                                    Many studies have shown that discrimination on the basis of age, marital status, sex or race may affect some groups in their attempts to gain access to private rental housing. In practical terms, the significant costs associated with payments of a bond and rent in advance can be a barrier for lower income groups. Furthermore, many landlords and real estate agents believe that young single women, single mothers and women dependent on welfare benefits are unable to afford accommodation and, therefore, fail tenant selection criteria. Even though some of these women are not on low incomes, they experience discrimination. Single mothers face discrimination in greater numbers than any other groups. Moreover, the rental problems faced by this group generally worse in non-metropolitan areas.<br><br>

                                    There is a range of factors that affect the demand for private rental accommodation in Astoria. In the past, the 20-29 year age group has had highest rental participation rates. A continued decline over the next decade in the size of this (20-29 years age group) group indicates a long-term easing of demand. Other factors may also have an adverse effect on rental demand, such as falls in the rates of overseas immigration or high unemployment rates, especially among younger age groups. Furthermore, a decline in the participation in fulltime employment of those on the 18-24 year age group will also have a negative influence on demand. On the other hand, a factor that may reverse these trends will be the ongoing difficulties faced by low to moderate income groups in buying their own homes and the long waiting periods for public housing.<br><br>

                                    In Astoria, landlords play an important role as suppliers of housing in the private rental market. Generally, they fall into one of six categories. Firstly, the absentee landlord is an individual who, rather than making a conscious investment decision, is forced to rent out his or her own home while away for a period of time. The absentee landlord typically holds no more than one property but, as a group, they control approximately 25% of rental properties in Astoria. The survey found that this group represents approximately 37% of landlords. Next, the equity investor is the type of landlord who holds between two and four properties over many years with the intention of complete ownership to provide income in retirement. This group controls about 25% of private rental properties. Similarly, the negative gearer owns a number of properties in the same range but only for a medium-term period. The investment is used to reduce overall taxation and the properties generally are sold when equity reaches 40%-50%. This type of investor controls approximately 20% of all private rental properties. Another type of landlord is the property speculator who holds at least five properties and is always trying to increase the number. Property speculators generally own properties for a moderate to long period. Furthermore, they generate levels of equity equal to about 50% of the value of their properties. The equity is then reinvested in additional properties. Rental income approximately equals costs. The property manager and the property speculator equally share 25% of the private rental properties in Astoria. The former type of landlord also has large numbers of properties. A property manager is typically an incorporated company whose main business is in the property field. The properties are held for long periods and the rental income generated significantly exceeds costs. The final category is that of the casual landlord who is typically a person who informally lets a room or shares the house he or she lives in, usually as a means of easing loan costs. Landlords in this group tend to own only the building they live in and are thought of to make up the remaining share of the rental market.<br><br>

                                    A 1995 independent study on the characteristics of landlords in Astoria showed that their age tends to be slightly higher than the average age of the population. Sixty percent of all landlords are male. This percentage actually increases with an increase in the numbers of properties owned by each individual. It was also found that 35% of landlords are not in the paid work due to age. In addition, the study revealed that approximately 94% of landlords own property in only one city and over half had owned rental property for more than ten years.<br><br>
                                    
                                    </p><br>

                                    <h3><strong>Job Sharing</strong></h3>

                                    <p>
                                        <strong>Section A</strong><br>
                                        Job sharing refers to a situation in which two people divide the responsibility of one full-time job. The two people willingly act as part-time workers, working enough hours between them to fulfil the duties of a
full-time worker. If they each work half the hours of the job, for example, they each receive 50 per cent of the job's wages, its holidays and its other benefits. Of course, some job sharers take a smaller or larger share of the responsibilities of the position, receiving a lesser or greater share of the benefits.<br><br>

Job sharing differs from conventional part-time work in that it is mainly, although not exclusively, occurring in the more highly skilled and professional areas, which entail higher levels of responsibilities and employee commitment. Until recently, these characteristics were not generally seen as compatible with anything less than full-time employment. Thus, the demands of job sharing are reciprocated by better pay and conditions and, ideally, more satisfaction than conventional part-time work.<br><br>

<strong>Section B</strong><br>

Job sharing should not be confused with the term work sharing, which pertains to increasing the number of jobs by reducing the number of hours of each existing job, thus offering more positions to the growing number of unemployed people. Job sharing, by contrast, is not designed to address unemployment problems; its focus, rather, is to provide well-paid work for skilled workers and professionals who want more free time for other pursuits.<br><br>

<strong>Section C</strong><br>
As would be expected, women comprise the bulk of job sharers. A survey carried out in 1988 by Britain's Equal Opportunities Commission (EOC) revealed that 78% of shares were female, the majority of whom were between the ages of 20 and 40 years of age. Subsequent studies have come up with similar results. Many of these women were re-entering the job market after having had children, but they chose not to seek<br>
part-time work because it would have meant reduced wages and lower status. Job sharing also offered an acceptable transition back into full-time work after a long absence.<br><br>

<strong>Section D</strong><br>

Although job sharing is still seen as too radical by many companies, those that have chosen to experiment with it include large businesses with conservative reputations. One of Britain's major banks, the National Westminster Bank, for example, offers a limited number of shared positions intended to give long-serving employees a break from full-time work. British Telecom, meanwhile, maintains 25 shared posts because, according to its personnel department, 'some of the job sharers might otherwise have left the company and we are now able to retain them.' Two wide-ranging surveys carried out in the country in 1989 revealed the proportion of large and medium-sized private-sector businesses that allow job sharing to be between 16% and 25%. Some 78% of job sharers, however, work in public-sector jobs.<br><br>

<strong>Section E</strong><br>

The types of jobs that are shared vary, but include positions that involve responsibility for many subordinates. Research into shared senior management positions suggests that even such high-pressure work can be shared between two people with little adjustment, provided the personalities and temperaments of the sharers are not vastly different from one another. A 1991 study of employees working under supervisory positions shared by two people showed that those who prefer such a situation do so for several reasons. Most prevalent were those who felt there was less bias in the evaluation of their work because having two assessments provided for a greater degree of fairness.<br><br>

<strong>Section F</strong><br>

The necessity of close cooperation and collaboration when sharing a job with another person makes the actual work quite different from conventional one-position, one-position jobs. However, to ensure a greater chance that the partnership will succeed, each person needs to know the strengths, weaknesses and preferences of his or her partner before applying for a position. Moreover, there must be an equitable allocation of both routine tasks and interesting ones. In sum, for a position to be job-shared well, the two individuals must be well-matched and must treat each other as equals.<br><br>
                                    </p><br><br>

                                    <h3> <strong>Rapid Police Response</strong> </h3>
                                    <p><strong>Paragraph A</strong><br>
                                        Police departments in the United States and Canada see it as central to their role that they respond to calls for help as quickly as possible. This ability to react fast has been greatly improved with the aid of technology. The telephone and police radio, already long in use, assist greatly in the reduction of police response time. In more recent times there has been the introduction of the '911' emergency system, which allows the public easier and faster contact with police, and the use of police computer systems, which assist police in planning patrols and assigning emergency requests to the police officers nearest to the scene of the emergency.<br><br>

                                        <strong>Paragraph B</strong><br>
                                        An important part of police strategy, rapid police response is seen by police officers and the public alike as offering tremendous benefits. The more obvious ones are the ability of police to apply first-aid life-saving techniques quickly and the greater likelihood of arresting people who may have participated in a crime. It aids in identifying those who witnessed an emergency or crime, as well as in collecting evidence. The overall reputation of a police department, too, is enhanced if rapid response is consistent, and this in itself promotes the prevention of crime. Needless to say, rapid response offers the public some degree of satisfaction in its police force.<br><br>

                                        <strong>Paragraph C</strong><br>
                                        While these may be the desired consequences of rapid police response, actual research has not shown it to be quite so beneficial. For example, it has been demonstrated that rapid response leads to a greater likelihood of arrest only if responses are in the order of 1-2 minutes after a call is received by the police. When response times increase to 3-4 minutes — still quite a rapid response — the likelihood of an arrest is substantially reduced. Similarly, in identifying witnesses to emergencies or crimes, police are far more likely to be successful if they arrive at the scene no more than four minutes, on average, after receiving a call for help. Yet both police officers and the public define 'rapid response' as responding up to 10-12 minutes after calling the police for help.<br><br>

                                        <strong>Paragraph D</strong><br>
                                        Should police assume all the responsibility for ensuring a rapid response? Studies have shown that people tend to delay after an incident occurs before contacting the police. A crime victim may be injured and thus unable to call for help, for example, or no telephone may be available at the scene of the incident. Often, however, there is no such physical barrier to calling the police. Indeed, it is very common for crime victims to call their parents, their minister, or even their insurance company first. When the police are finally called in such cases, the effectiveness of even the most rapid of responses is greatly diminished.<br><br>

                                        <strong>Paragraph E</strong><br>
                                        The effectiveness of rapid response also needs to be seen in light of the nature of the crime. For example, when someone rings the police after discovering their television set has been stolen from their home, there is little point, in terms of identifying those responsible for the crime, in ensuring a very rapid response. It is common in such burglary or theft cases that the victim discovers the crime hours, days, even weeks after it has occurred. When the victim is directly involved in the crime, however, as in the case of a robbery, rapid response, provided the victim was quickly able to contact the police, is more likely to be advantageous. Based on statistics comparing crimes that are discovered and those in which the victim is directly involved,<br><br>

                                        <strong>Paragraph F</strong><br>
                                        It becomes clear that the importance of response time in collecting evidence or catching criminals after a crime must be weighed against a variety of factors. Yet because police department officials assume the public strongly demands rapid response, they believe that every call to the police should be met with it. Studies have shown, however, that while the public wants quick response, more important is the information given by the police to the person asking for help. If a caller is told the police will arrive in five minutes but in fact it takes ten minutes or more, waiting the extra time can be extremely frustrating. But if a caller is told he or she will have to wait 10 minutes and the police indeed arrive within that time, the caller is normally satisfied. Thus, rather than emphasizing rapid response, the focus of energies should be on establishing realistic expectations in the caller and making every effort to meet them.<br><br>
                                    
                                    </p>



                                </div>


                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">
                                <h3><strong>Astoria's Private Rental Accommodation Market</strong></h3>
                                <p><strong>Questions 6 and 7</strong></p>
                                <p><i>Identify TWO TYPES of women that regularly experience discrimination when seeking private rental accommodation.</i></p>
                                <p><i>Choose NO MORE THAN THREE WORDS for each answer from the passage.</i></p>
                                <p><i>Write your answers in boxes 6 and 7 on your answer sheet.</i></p>
                                <p><strong>NB</strong>        Your answers may be given in either order.</p>

                                <p><strong>6</strong> <input type="text" name="q1" placeholder="1" style="padding:0px 5px;" id="1"></p>
                                <p><strong>7</strong> <input type="text" name="q2" placeholder="2" style="padding:0px 5px;" id="2"></p>

                                <div class="mt-5">
                                    <h3><strong>Job Sharing</strong></h3>
                                    <p><strong>Questions 6-10</strong></p>
                                    <p>Complete the notes below.</p>
                                    <p>Choose <strong>ONE OR TWO WORDS</strong> from the passage for each answer.</p>
                                    <p>Write your answers in boxes 6-10 on your answer sheet.</p>
                                    <p><strong>JOB SHARING</strong></p>
                                    <p>Common job sharing areas:<br>

                                       - highly skilled<br>
                                       - <strong>6 </strong> <input type="text" name="q3" placeholder="6" style="padding:0px 5px;" id="3">
                                    </p>
                                    <p>Job sharing requires a greater degree of:</p>
                                    <p>- <strong>7 </strong><input type="text" name="q4" placeholder="7" style="padding:0px 5px;" id="4"></p>
                                    <p>- <strong>8 </strong><input type="text" name="q5" placeholder="8" style="padding:0px 5px;" id="5"></p>

                                    <p>Benefits of job sharing over part-time work:</p>
                                   <p> - <strong>9 </strong> <input type="text" name="q6" placeholder="9" style="padding:0px 5px;" id="6"></p>
                                   <li> Better conditions</li><br>
                                     <p>- <strong>10 </strong> <input type="text" name="q7" placeholder="10" style="padding:0px 5px;" id="7"></p>
                                </div>
                                <div class="mt-5">
                                    <h3> <strong>Rapid Police Response</strong> </h3>
                                    <p><strong>Questions 20 and 21</strong></p>
                                    <p><i>Name the <strong>TWO LATEST</strong> technological developments that reduce police response time.</i></p>
                                    <p>Choose <strong>NO MORE THAN THREE WORDS</strong> from the passage for each answer.</p>
                                    <p>Write your answers in boxes 20 and 21 on your answer sheet.</p>
                                    <p><strong>NB</strong>        Your answers may be given in either order</p>
                                    <p><strong>20. </strong> <input type="text" name="q8" placeholder="20" style="padding:0px 5px;" id="8"></p>
                                    <p><strong>21. </strong> <input type="text" name="q9" placeholder="21" style="padding:0px 5px;" id="9"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- question part 2 -->
                <div class="tab-content " id="part2" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Reading</h4>
                        <p> Notes <br>
                        </p>
                    </div>
                    <div class="mt-4">

                        <div class="row">
                            <!-- Column 1 -->
                            <div class="col-md-6">
                                
                            </div>
                            <!-- Column 2 -->
                            <div class="col-md-6 question_site">

                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- question part 3 -->
                <div class="tab-content " id="part3" style="margin-bottom: 80px;">
                    <div class="question_part">
                        <h4>Reading</h4>
                        <p> Notes <br>
                    </div>

                </div>

    </form>
    <!--Alart Modal exam start-->
    <div class="modal fade" id="startModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Start Reading Test</h5>
                </div>
                <div class="modal-body">
                    Please click OK to begin the reading test.
                </div>
                <div class="modal-footer">
                    <button id="startTestButton" type="button" class="btn btn-primary"
                        data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Finish Test Modal -->
    <div class="modal fade" id="finishModal" tabindex="-1" aria-labelledby="finishModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="finishModalLabel">Are you sure you want to complete the test?
                    </h5>
                </div>
                <div class="modal-body">
                    Once you continue, you'll be taken back to the index page.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Go back</button>
                    <button type="button" class="btn btn-primary" id="continueButton">Continue</button>
                </div>
            </div>
        </div>
    </div>

    </div>



    <div class="tabs fixed-bottom " style="background-color: white; margin:0px; margin-top: 100px;">

        <div class="tab active" data-tab="part1">
            <span class="tab-title">Notes</span>
            <div class="question-links">
                <!--<a href="#" class="question-link" data-question="1">1</a>-->
                <!--<a href="#" class="question-link" data-question="2">2</a>-->
                <!--<a href="#" class="question-link" data-question="3">3</a>-->
                <!--<a href="#" class="question-link" data-question="4">4</a>-->
                <!--<a href="#" class="question-link" data-question="5">5</a>-->
                <!--<a href="#" class="question-link" data-question="6">6</a>-->
                <!--<a href="#" class="question-link" data-question="7">7</a>-->
                <!--<a href="#" class="question-link" data-question="8">8</a>-->
                <!--<a href="#" class="question-link" data-question="9">9</a>-->
                <!--<a href="#" class="question-link" data-question="10">10</a>-->
                <!--<a href="#" class="question-link" data-question="11">11</a>-->
                <!--<a href="#" class="question-link" data-question="12">12</a>-->
                <!--<a href="#" class="question-link" data-question="13">13</a>-->
                <!--<a href="#" class="question-link" data-question="14">14</a>-->
                <!--<a href="#" class="question-link" data-question="15">15</a>-->


            </div>
            <span class="question-placeholder">0 of 14</span>
        </div>
        <div class="tab " data-tab="part2">
            <span class="tab-title">Notes</span>
            <div class="question-links">

                <!--<a href="#" class="question-link" data-question="16">16</a>-->
                <!--<a href="#" class="question-link" data-question="17">17</a>-->
                <!--<a href="#" class="question-link" data-question="18">18</a>-->
                <!--<a href="#" class="question-link" data-question="19">19</a>-->
                <!--<a href="#" class="question-link" data-question="20">20</a>-->
                <!--<a href="#" class="question-link" data-question="21">21</a>-->
                <!--<a href="#" class="question-link" data-question="22">22</a>-->
                <!--<a href="#" class="question-link" data-question="23">23</a>-->
                <!--<a href="#" class="question-link" data-question="24">24</a>-->
                <!--<a href="#" class="question-link" data-question="25">25</a>-->
                <!--<a href="#" class="question-link" data-question="26">26</a>-->
                <!--<a href="#" class="question-link" data-question="27">27</a>-->
                <!--<a href="#" class="question-link" data-question="28">28</a>-->
                <!--<a href="#" class="question-link" data-question="29">29</a>-->
                <!--<a href="#" class="question-link" data-question="30">30</a>-->



            </div>
            <span class="question-placeholder">0 of 13</span>
        </div>
        <div class="tab " data-tab="part3">
            <span class="tab-title">Notes</span>
            <div class="question-links">


                <!--<a href="#" class="question-link" data-question="31">31</a>-->
                <!--<a href="#" class="question-link" data-question="32">32</a>-->
                <!--<a href="#" class="question-link" data-question="33">33</a>-->
                <!--<a href="#" class="question-link" data-question="34">34</a>-->
                <!--<a href="#" class="question-link" data-question="35">35</a>-->
                <!--<a href="#" class="question-link" data-question="36">36</a>-->
                <!--<a href="#" class="question-link" data-question="37">37</a>-->
                <!--<a href="#" class="question-link" data-question="38">38</a>-->
                <!--<a href="#" class="question-link" data-question="39">39</a>-->
                <!--<a href="#" class="question-link" data-question="40">40</a>-->
            </div>
            <span class="question-placeholder">0 of 13</span>
        </div>

    </div>
    <div class="fixed-bottom d-flex justify-content-end mb-5 px-5">
        <!-- Left Arrow -->
        <button id="prev-question" type="button" class="btn btn-dark me-2" style="font-size: 1.5rem;">&#8592;</button>
        <!-- Right Arrow -->
        <button id="next-question" type="button" class="btn btn-dark ms-2" style="font-size: 1.5rem;">&#8594;</button>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active from all tabs and content
                tabs.forEach(t => {
                    t.classList.remove('active');
                    t.querySelector('.question-links').style.display = 'none';
                    t.querySelector('.question-placeholder').style.display = 'block';
                });

                tabContents.forEach(content => content.classList.remove('active'));

                // Activate current tab and content
                tab.classList.add('active');
                const tabId = tab.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');

                // Show question-links, hide placeholder
                const qLinks = tab.querySelector('.question-links');
                const qPlaceholder = tab.querySelector('.question-placeholder');
                if (qLinks && qPlaceholder) {
                    qLinks.style.display = 'flex';
                    qPlaceholder.style.display = 'none';
                }
            });
        });

        // Initial setup: show only part1 question links
        window.addEventListener('DOMContentLoaded', () => {
            tabs.forEach(tab => {
                const qLinks = tab.querySelector('.question-links');
                const qPlaceholder = tab.querySelector('.question-placeholder');
                if (tab.getAttribute('data-tab') === 'part1') {
                    tab.classList.add('active');
                    qLinks.style.display = 'flex';
                    qPlaceholder.style.display = 'none';
                } else {
                    qLinks.style.display = 'none';
                    qPlaceholder.style.display = 'block';
                }
            });
        });
    </script>

    <script>
        document.querySelectorAll('.question-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const qNum = this.getAttribute('data-question');

                // Remove existing active styles
                document.querySelectorAll('.question-number').forEach(num => num.classList.remove(
                'active'));

                // If question has a number span (1-6), add active style
                const numberBox = document.getElementById(`question-${qNum}-number`);
                if (numberBox) {
                    numberBox.classList.add('active');

                    // Scroll to label (1–6)
                    const questionLabel = document.getElementById(qNum);
                    if (questionLabel) {
                        questionLabel.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                }

                // If it's an input field (7–10), focus it
                const inputField = document.getElementById(qNum);
                if (inputField && inputField.tagName === 'INPUT') {
                    inputField.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    inputField.focus();
                }
            });
        });
    </script>
    <script>
        const questionLinks = document.querySelectorAll('.question-link');

        questionLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();

                // Remove "active" class from all links
                questionLinks.forEach(l => l.classList.remove('active'));

                // Add "active" class to clicked link
                this.classList.add('active');
            });
        });
    </script>

    {{-- alart and timer script and finished test script  added in frontend layout  CommonScript --}}

    @include('front_end.layout.commonScript');

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const testForm = document.getElementById('testForm');

            function autosaveInput(input) {
                const formData = new FormData();
                formData.append('student_id', '{{ auth()->user()->id }}');
                formData.append('test_name', document.querySelector('input[name="test_name"]').value);

                if (input.type === 'checkbox') {
                    const groupName = input.name;
                    const selectedValues = Array.from(document.querySelectorAll(
                            `input[name="${groupName}"]:checked`))
                        .map(cb => cb.value);
                    formData.append('question_number', groupName.replace('q', '').replace('[]', ''));
                    formData.append('answer', selectedValues.join(','));
                } else {
                    formData.append('question_number', input.name.replace('q', ''));
                    formData.append('answer', input.value);
                }

                fetch('{{ route('reading.autosave') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Network response was not ok');
                        console.log(`✅ Autosaved: ${input.name}`);
                    })
                    .catch(err => console.error('❌ Autosave failed', err));
            }

            // Radio & checkbox on change
            document.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(input => {
                input.addEventListener('change', function() {
                    autosaveInput(this);
                });
            });

            // Text input on change (not on every keystroke)
            document.querySelectorAll('input[type="text"]').forEach(input => {
                input.addEventListener('change', function() {
                    autosaveInput(this);
                });
            });
        });
    </script>




    <!-- arrow button script  -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const allLinks = Array.from(document.querySelectorAll('.question-link'));
            let currentIndex = 0;

            function highlightLinkAndNumber(qNum) {
                // Remove existing active styles
                allLinks.forEach(link => link.classList.remove('active'));
                document.querySelectorAll('.question-number').forEach(num => num.classList.remove('active'));

                // Activate the current question-link
                const currentLink = allLinks.find(l => l.getAttribute('data-question') === qNum);
                if (currentLink) currentLink.classList.add('active');

                // Highlight number box
                const numberBox = document.getElementById(`question-${qNum}-number`);
                if (numberBox) numberBox.classList.add('active');
            }

            function activateTabForQuestion(num) {
                const label = document.getElementById(num);
                if (!label) return;

                const partContent = label.closest('.tab-content');
                if (!partContent) return;

                document.querySelectorAll('.tab-content').forEach(tc => tc.classList.remove('active'));
                partContent.classList.add('active');

                document.querySelectorAll('.tab').forEach(tab => {
                    const qLinks = tab.querySelector('.question-links');
                    const qPlaceholder = tab.querySelector('.question-placeholder');

                    if (tab.getAttribute('data-tab') === partContent.id) {
                        tab.classList.add('active');
                        qLinks.style.display = 'flex';
                        qPlaceholder.style.display = 'none';
                    } else {
                        tab.classList.remove('active');
                        qLinks.style.display = 'none';
                        qPlaceholder.style.display = 'block';
                    }
                });
            }

            function scrollAndFocus(num) {
                const label = document.getElementById(num);
                if (label) label.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

                const inputField = document.getElementById(num);
                if (inputField && inputField.tagName === 'INPUT') {
                    setTimeout(() => inputField.focus(), 400); // wait till scroll completes
                }
            }

            function setActiveQuestion(index) {
                currentIndex = index;
                const qNum = allLinks[index].getAttribute('data-question');

                highlightLinkAndNumber(qNum);
                activateTabForQuestion(qNum);
                scrollAndFocus(qNum);
            }

            // Attach listener to question-number links
            allLinks.forEach((link, index) => {
                link.addEventListener('click', e => {
                    e.preventDefault();
                    setActiveQuestion(index);
                });
            });

            document.getElementById('prev-question').addEventListener('click', () => {
                if (currentIndex > 0) setActiveQuestion(currentIndex - 1);
            });

            document.getElementById('next-question').addEventListener('click', () => {
                if (currentIndex < allLinks.length - 1) setActiveQuestion(currentIndex + 1);
            });

            // Initial setup
            setActiveQuestion(0);
        });
    </script>


    <!-- sidebar js code  -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const noteToggle = document.getElementById('noteToggle');
            const closeBtn = sidebar.querySelector('.close-btn');

            noteToggle.addEventListener('click', () => {
                sidebar.classList.add('open');
                mainContent.classList.add('shifted');
            });

            closeBtn.addEventListener('click', () => {
                sidebar.classList.remove('open');
                mainContent.classList.remove('shifted');
            });
        });
    </script>


    <!-- highlight and note script  -->
    <script>
        const contextMenu = document.getElementById('customContextMenu');
        const highlightOption = document.getElementById('highlightOption');
        const notesOption = document.getElementById('notesOption');
        const allClearOption = document.getElementById('allClear');
        let selectionRange = null;
        let activePopup = null; // track the active popup

        // Show custom context menu on text selection
        document.addEventListener('contextmenu', function(e) {
            const selection = window.getSelection();
            if (selection.rangeCount > 0 && selection.toString().trim() !== '') {
                e.preventDefault();
                selectionRange = selection.getRangeAt(0).cloneRange();
                contextMenu.style.display = 'block';
                contextMenu.style.left = e.pageX + 'px';
                contextMenu.style.top = e.pageY + 'px';
            } else {
                contextMenu.style.display = 'none';
            }
        });

        // Highlight only
        highlightOption.addEventListener('click', function() {
            if (selectionRange) {
                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                mark.appendChild(selectionRange.extractContents());
                selectionRange.insertNode(mark);
            }
            contextMenu.style.display = 'none';
        });

        // Add note with popup
        notesOption.addEventListener('click', function() {
            if (selectionRange) {
                const mark = document.createElement('mark');
                mark.style.backgroundColor = 'yellow';
                mark.setAttribute('data-tooltip', '');
                mark.appendChild(selectionRange.extractContents());
                selectionRange.insertNode(mark);

                // Add click event to show note popup
                mark.addEventListener('click', function(e) {
                    e.stopPropagation();
                    showNotePopup(mark);
                });

                // Also add entry to sidebar
                const sidebar = document.getElementById('sidebar');
                const noteDiv = document.createElement('div');
                noteDiv.innerText = mark.innerText;
                noteDiv.style.borderBottom = '1px solid #ccc';
                noteDiv.style.padding = '5px 8px';
                sidebar.appendChild(noteDiv);

                // Immediately show popup for new note
                showNotePopup(mark);
            }
            contextMenu.style.display = 'none';
        });

        // Clear all highlights and notes
        allClearOption.addEventListener('click', function() {
            document.querySelectorAll('mark').forEach(marked => {
                marked.replaceWith(document.createTextNode(marked.innerText));
            });
            const notePopup = document.querySelector('.note-popup');
            if (notePopup) notePopup.remove();
            activePopup = null;

            const sidebar = document.getElementById('sidebar');
            sidebar.innerHTML = `
        <div class="sidebar-header">
            <h5>Notes</h5>
            <span class="close-btn">&times;</span>
        </div>
        `;
            sidebar.querySelector('.close-btn').addEventListener('click', () => {
                sidebar.classList.remove('open');
                document.getElementById('main-content').classList.remove('shifted');
            });

            sidebar.classList.remove('open');
            document.getElementById('main-content').classList.remove('shifted');
            contextMenu.style.display = 'none';
        });

        // Close context menu on outside click
        document.addEventListener('click', function(e) {
            if (!contextMenu.contains(e.target)) {
                contextMenu.style.display = 'none';
            }
        });

        // Function to show note popup for a mark element
        function showNotePopup(mark) {
            if (activePopup) {
                activePopup.remove();
                document.removeEventListener('click', handleOutsideClick);
            }

            const notePopup = document.createElement('div');
            notePopup.classList.add('note-popup');
            notePopup.innerHTML = `
        <span class="close-note">&times;</span>
        <div style="margin-top: 10px; font-weight: bold;">${mark.innerText}</div>
        <textarea placeholder="Add your note here..." style="width:100%; margin-top: 5px; border:none; background-color:yellow;">${mark.dataset.note || ''}</textarea>
        `;
            document.body.appendChild(notePopup);
            activePopup = notePopup;

            // Position popup near mark
            const rect = mark.getBoundingClientRect();
            notePopup.style.left = rect.left + window.scrollX + 'px';
            notePopup.style.top = rect.bottom + window.scrollY + 5 + 'px';

            // Close button
            notePopup.querySelector('.close-note').addEventListener('click', () => {
                notePopup.remove();
                activePopup = null;
                document.removeEventListener('click', handleOutsideClick);
            });

            // Save note text on blur
            const textarea = notePopup.querySelector('textarea');
            textarea.addEventListener('blur', () => {
                mark.dataset.note = textarea.value;
            });

            // Make popup draggable
            let isDragging = false,
                offsetX, offsetY;
            notePopup.addEventListener('mousedown', (e) => {
                if (e.target.tagName !== 'TEXTAREA') {
                    isDragging = true;
                    offsetX = e.clientX - notePopup.offsetLeft;
                    offsetY = e.clientY - notePopup.offsetTop;
                    e.preventDefault();
                }
            });
            document.addEventListener('mousemove', (e) => {
                if (isDragging) {
                    notePopup.style.left = (e.clientX - offsetX) + 'px';
                    notePopup.style.top = (e.clientY - offsetY) + 'px';
                }
            });
            document.addEventListener('mouseup', () => isDragging = false);

            setTimeout(() => {
                document.addEventListener('click', handleOutsideClick);
            }, 0);
        }

        function handleOutsideClick(e) {
            if (activePopup && !activePopup.contains(e.target) && e.target.tagName !== 'MARK') {
                activePopup.remove();
                activePopup = null;
                document.removeEventListener('click', handleOutsideClick);
            }
        }
    </script>
       {{-- input auto sujection off  --}}
    <script>
                document.addEventListener('DOMContentLoaded', function() {
            // Get all input fields within the form
            const inputs = document.querySelectorAll('#testForm input');

            // Loop through each input and set autocomplete="off"
            inputs.forEach(function(input) {
                input.setAttribute('autocomplete', 'off');
            });
        });
    </script>


</body>

</html>
