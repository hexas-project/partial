<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Writing Result PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #111827; }
        .brand {
            text-align: center;
            font-weight: 800;
            font-size: 22px;
            letter-spacing: 1px;
            color: #e11d48;
            margin: 0 0 18px 0;
            padding: 6px 0 10px 0;
        }
        .meta h2 { margin: 0 0 8px 0; font-size: 20px; }
        .meta p { margin: 0 0 6px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 14px; table-layout: fixed; }
        th, td { border: 1px solid #cbd5e1; padding: 10px; vertical-align: top; }
        th { background-color: #0f172a; color: #fff; font-weight: 700; font-size: 11px; text-transform: uppercase; text-align: center; }
        td.qcol { width: 70px; font-weight: 700; color: #334155; }
        td.right-col, td.student-col { width: 45%; }
        .right-col img { max-width: 100%; height: auto; max-height: 260px; display: block; margin-top: 8px; }
        .student-answer { white-space: pre-wrap; word-break: break-word; overflow-wrap: anywhere; }
        .word-total { margin-top: 10px; padding-top: 6px; border-top: 1px solid #e5e7eb; font-weight: 800; }
        .meta-line { width: 100%; border-collapse: collapse; margin: 0 0 10px 0; }
        .meta-line td { border: none; padding: 0 14px 6px 0; vertical-align: top; }
    </style>
</head>
<body>
    <div class="brand">HEXA'S ZINDABAZAR</div>
    @php
        $task1Right = '';
        $task2Right = '';
        $tn = strtolower((string) $testName);

        $img = function (string $relative) {
            return public_path($relative);
        };

        if (str_contains($tn, 'class12_writing')) {
            $task1Right = '<p><strong>The graph below shows usual water usage (in millions of cubic meters) by industries in some countries in a year.</strong></p>'
                . '<p><strong>Summarise the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <strong>150</strong> words.</p>'
                . '<img src="' . $img('images/writing/1.jpg') . '" alt="">';

            $task2Right = '<p><strong>Some people believe that success in sports depends on physical strength, while others believe that mental strength is more important.</strong></p>'
                . '<p><strong>Discuss both views and give your own opinion.</strong></p>'
                . '<p>You should write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class27_writing')) {
            $task1Right = '<p><strong>The pie charts show the average consumption of food in the world in 2008 compared to two countries; China and India.</strong></p>'
                . '<p><strong>Summarize the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <strong>150</strong> words.</p>'
                . '<img src="' . $img('images/writing/2.jpg') . '" alt="">';

            $task2Right = '<p><strong>Many people use written language in a less formal way and in a relaxed way than in the past.</strong></p>'
                . '<p><strong>Why is that so?</strong></p>'
                . '<p><strong>Does this development have more advantages or disadvantages?</strong></p>'
                . '<p>You should write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class28_writing')) {
            $task1Right = '<p><strong>The graph below shows radio and television audiences throughout the day in 1992.</strong></p>'
                . '<p><strong>Summarize the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <strong>150</strong> words.</p>'
                . '<img src="' . $img('images/writing/3.jpg') . '" alt="">';

            $task2Right = '<p><strong>These days many people leave their country to work abroad and take their family with them.</strong></p>'
                . '<p>Do you think the advantages of this development outweigh its disadvantages?</p>'
                . '<p>You should write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class29_writing')) {
            $task1Right = '<p><strong>The first chart below shows the results of a survey which sampled a cross-section of 100,000 people asking if they traveled abroad and why they traveled for the period 1994-98. The second chart shows their destinations over the same period.</strong></p>'
                . '<p><strong>Summarize the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <strong>150</strong> words.</p>'
                . '<table border="1" cellpadding="6" cellspacing="0" style="width: 100%; border-collapse: collapse; margin: 12px 0; font-size: 10px;">'
                . '<thead>'
                . '<tr><th colspan="6" style="text-align: center; padding: 6px;"><em>VISITS ABROAD BY UK RESIDENTS BY PURPOSE OF VISIT (1994-98)</em></th></tr>'
                . '<tr><th style="padding: 6px;"></th><th style="padding: 6px;"><em>1994</em></th><th style="padding: 6px;"><em>1995</em></th><th style="padding: 6px;"><em>1996</em></th><th style="padding: 6px;"><em>1997</em></th><th style="padding: 6px;"><em>1998</em></th></tr>'
                . '</thead>'
                . '<tbody>'
                . '<tr><td style="padding: 6px;"><em>Holiday</em></td><td style="padding: 6px;">15,246</td><td style="padding: 6px;">14,898</td><td style="padding: 6px;">17,896</td><td style="padding: 6px;">19,703</td><td style="padding: 6px;">20,700</td></tr>'
                . '<tr><td style="padding: 6px;"><em>Business</em></td><td style="padding: 6px;">3,155</td><td style="padding: 6px;">3,188</td><td style="padding: 6px;">3,249</td><td style="padding: 6px;">3,639</td><td style="padding: 6px;">3,957</td></tr>'
                . '<tr><td style="padding: 6px;"><em>Visits to friends & relatives</em></td><td style="padding: 6px;">2,689</td><td style="padding: 6px;">2,628</td><td style="padding: 6px;">2,774</td><td style="padding: 6px;">3,051</td><td style="padding: 6px;">3,181</td></tr>'
                . '<tr><td style="padding: 6px;"><em>Other reasons</em></td><td style="padding: 6px;">982</td><td style="padding: 6px;">896</td><td style="padding: 6px;">1,030</td><td style="padding: 6px;">1,054</td><td style="padding: 6px;">990</td></tr>'
                . '<tr><td style="padding: 6px;"><strong><em>TOTAL</em></strong></td><td style="padding: 6px;"><strong>22,072</strong></td><td style="padding: 6px;"><strong>21,610</strong></td><td style="padding: 6px;"><strong>24,949</strong></td><td style="padding: 6px;"><strong>27,447</strong></td><td style="padding: 6px;"><strong>28,828</strong></td></tr>'
                . '</tbody>'
                . '</table>'
                . '<img src="' . $img('images/writing/4.jpg') . '" alt="">';

            $task2Right = '<p><strong>Some people believe that only the government can bring about significant changes in society, while others think that even an individual can have a lot of influence on society.</strong></p>'
                . '<p><strong>Discuss both sides and give your opinion.</strong></p>'
                . '<p>You should write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class30_writing')) {
            $task1Right = '<p><strong>The chart below shows estimated world illiteracy rates by region and by gender in 2000.</strong></p>'
                . '<p><strong>Summarize the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <strong>150</strong> words.</p>'
                . '<p><em><strong>Estimated World illiteracy rates, by region and gender, 2000.</strong></em></p>'
                . '<img src="' . $img('images/writing/5.jpg') . '" alt="">';

            $task2Right = '<p><strong>Some people think that famous people can help international aid organizations to draw attention to important problems. Others believe that the celebrities can make the problems seem less important.</strong></p>'
                . '<p><strong>Discuss both views and give your opinion.</strong></p>'
                . '<p>You should write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class31_writing')) {
            $task1Right = '<p><strong>The graph below gives information about consumption of energy in the USA since 1980 with projections until 2030.</strong></p>'
                . '<p><strong>Summarize the information by selecting and reporting the main features, and making comparisons where relevant.</strong></p>'
                . '<p>Write at least <strong>150</strong> words.</p>'
                . '<img src="' . $img('images/writing/writing6.png') . '" alt="">';

            $task2Right = '<p><strong>Computers today can quickly and accurately translate languages; therefore, it is a waste of time to learn a foreign language.</strong></p>'
                . '<p><strong>To what extent do you agree or disagree?</strong></p>'
                . '<p>You should write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class32_writing')) {
            $task1Right = '<p><strong>The plans below show a public park when it first opened in 1920 and the same park today.</strong></p>'
                . '<p><strong>Summarise the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <strong>150</strong> words.</p>'
                . '<img src="' . $img('images/writing/writing7.png') . '" alt="">';

            $task2Right = '<p><strong>Some people think watching television is bad for children in every way. Others believe it is good for developing children as they grow up.</strong></p>'
                . '<p><strong>Discuss both views and give your own opinion.</strong></p>'
                . '<p>You should write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class33_writing')) {
            $task1Right = '<p><strong>The bar charts below show the Marriage and Divorce Statistics for eight countries in 1981 and 1994.</strong></p>'
                . '<p><strong>Write a short report for a university lecturer describing the information shown below.</strong></p>'
                . '<p>Write at least <strong>150</strong> words.</p>'
                . '<img src="' . $img('images/writing/writing8.png') . '" alt="">';

            $task2Right = '<p><strong>In many countries, people throw away a lot of food from restaurants and shops.</strong></p>'
                . '<p><strong>Why do you think people waste food in this way? What can be done to reduce the amount of food thrown away?</strong></p>'
                . '<p>Give reasons for your answer and include any relevant examples from your own knowledge or experience.</p>'
                . '<p>You should write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class34_writing')) {
            $task1Right = '<p><strong>The table below gives information about UK independent films.</strong></p>'
                . '<p><strong>Summarize the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <strong>150</strong> words.</p>'
                . '<img src="' . $img('images/writing/writing9.png') . '" alt="">';

            $task2Right = '<p><strong>The noise level around us is constantly increasing and affecting the quality of our lives.</strong></p>'
                . '<p><strong>What are the causes of this problem? What should be done to solve it?</strong></p>'
                . '<p>You should write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class35_writing')) {
            $task1Right = '<p><strong>The line graph below shows the number of annual visits to Australia by overseas residents. The table below gives information on the country of origin where the visitors came from.</strong></p>'
                . '<p><strong>Write a report for a university lecturer describing the information given.</strong></p>'
                . '<p>Write at least <strong>150</strong> words.</p>'
                . '<img src="' . $img('images/writing/writing10.png') . '" alt="">';

            $task2Right = '<p><strong>The best way to solve the world\'s environmental problems is to increase the cost of fuel for cars and other vehicles.</strong></p>'
                . '<p><strong>To what extent do you agree or disagree?</strong></p>'
                . '<p>You should write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class36_writing')) {
            $task1Right = '<p><strong>The graph and table below give information about water use worldwide and water consumption in two different countries.</strong></p>'
                . '<p><strong>Summarize the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <strong>150</strong> words.</p>'
                . '<img src="' . $img('images/writing/writing11.png') . '" alt="">';

            $task2Right = '<p><strong>Some people suggest that a country should try to produce all the food for its population and import as little food as possible.</strong></p>'
                . '<p><strong>To what extent do you agree or disagree?</strong></p>'
                . '<p>You should write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class37_writing')) {
            $task1Right = '<p><strong>The chart shows British Emigration to selected destinations between 2004 and 2007.</strong></p>'
                . '<p><strong>Summarize the information by selecting and reporting the main features and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <strong>150</strong> words.</p>'
                . '<img src="' . $img('images/writing/writing12.png') . '" alt="">';

            $task2Right = '<p><strong>Some people believe that children that commit crimes should be punished. Others think parents should be punished instead.</strong></p>'
                . '<p><strong>Discuss both views and give your own opinion.</strong></p>'
                . '<p>You should write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class1_writing')) {
            $task1Right = '<p><strong>You are visiting another town next month for a short break. Write a letter to the tourist information centre. In your letter:</strong></p>'
                . '<ul><li>Tell them how long you are staying</li><li>Ask for some suggestions for what to do</li><li>Find out if there are any local events happening at the time</li></ul>'
                . '<p>Write at least <strong>150</strong> words.</p>';
            $task2Right = '<p><strong>In many countries, schoolchildren are required to wear school uniforms. Do you think this should be enforced in all schools?</strong></p>'
                . '<p>Give reasons for your answer and include any relevant examples from your own knowledge or experience.</p>'
                . '<p>Write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class2_writing')) {
            $task1Right = '<p><strong>You have seen an advertisement looking for volunteers to teach English overseas. Write to the recruitment office. In your letter:</strong></p>'
                . '<ul><li>Tell them where you saw the advertisement</li><li>Explain why you would like to go</li><li>Describe the skills that you have that you think would help</li></ul>'
                . '<p>Write at least <strong>150</strong> words.</p>';
            $task2Right = '<p><strong>Teenagers are spending an increasing amount of time on the Internet, and this is having a negative effect on their social skills.</strong></p>'
                . '<p>Do you agree or disagree? Give reasons for your answer and include any relevant examples from your own knowledge or experience.</p>'
                . '<p>Write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class3_writing')) {
            $task1Right = '<p><strong>You recently saw an advertisement in a newspaper seeking volunteers to do unpaid work with local children. You are interested in this work. Write a letter to the head of the organization. In your letter:</strong></p>'
                . '<ul><li>Express your interest</li><li>Ask for details of the work that needs to be done</li><li>Let them know when you are available</li></ul>'
                . '<p>Write at least <strong>150</strong> words.</p>';
            $task2Right = '<p><strong>Some people think that air travel should be reduced to protect the environment.</strong></p>'
                . '<p>Do you agree or disagree? Give reasons for your answer and include any relevant examples from your own knowledge or experience.</p>'
                . '<p>Write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class4_writing')) {
            $task1Right = '<p><strong>You came to know about a piece of equipment that would help you at your workplace. Write a letter to your manager. In your letter:</strong></p>'
                . '<ul><li>Describe the equipment</li><li>Explain how it might be useful at your workplace</li><li>Offer help in purchasing it</li></ul>'
                . '<p>Write at least <strong>150</strong> words.</p>';
            $task2Right = '<p><strong>In many schools, sports lessons are part of the timetable, because it is important for both boys and girls to participate in sports.</strong></p>'
                . '<p>Do you agree or disagree with this statement? Give reasons for your answer and include relevant examples from your knowledge or experience.</p>'
                . '<p>Write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class5_writing')) {
            $task1Right = '<p><strong>You are travelling next month to stay with a host family you do not know as part of a student exchange program. Write a letter to the family to introduce yourself. In your letter:</strong></p>'
                . '<ul><li>Say when and how you will be arriving</li><li>Tell the family a little about yourself</li><li>Ask about the weather to pack suitable clothes</li></ul>'
                . '<p>Write at least <strong>150</strong> words.</p>';
            $task2Right = '<p><strong>Some people believe that restoration of old buildings costs too much; we should demolish them and build new ones instead.</strong></p>'
                . '<p>To what extent do you agree or disagree?</p>'
                . '<p>Write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class6_writing')) {
            $task1Right = '<p><strong>You recently received an invitation to a three-day training program which should benefit you and the company. Write a letter to your manager and say:</strong></p>'
                . '<ul><li>Ask to attend the program</li><li>Describe the program</li><li>Explain how the program will benefit the company</li></ul>'
                . '<p>Write at least <strong>150</strong> words.</p>';
            $task2Right = '<p><strong>It is expected in the near future that there will be a higher proportion of old people compared to younger population in some countries.</strong></p>'
                . '<p>Is it a positive or negative development? Give your opinion and examples.</p>'
                . '<p>Write at least <strong>250</strong> words.</p>';
        } elseif (str_contains($tn, 'class7_writing')) {
            $task1Right = '<p><strong>Write a letter to your English speaking friend to invite him/her to see a movie about your country. In your letter say:</strong></p>'
                . '<ul><li>Describe the movie</li><li>Why would he/she find it interesting?</li><li>Suggest an arrangement to watch the movie together</li></ul>'
                . '<p>Write at least <strong>150</strong> words.</p>';
            $task2Right = '<p><strong>These days it is very common to have people from two different generations mix in the same workplace.</strong></p>'
                . '<p>Are there more advantages or disadvantages to this situation? Give your own opinion and include relevant examples.</p>'
                . '<p>Write at least <strong>250</strong> words.</p>';
        }

        $task1Answer = (string) ($resultDetails['testOne'] ?? '');
        $task2Answer = (string) ($resultDetails['testTwo'] ?? '');
        $task1Words = count(preg_split('/\s+/', trim($task1Answer), -1, PREG_SPLIT_NO_EMPTY));
        $task2Words = count(preg_split('/\s+/', trim($task2Answer), -1, PREG_SPLIT_NO_EMPTY));

        $chunkAnswer = function (string $text, int $maxChars = 1400) {
            $text = str_replace("\r\n", "\n", $text);
            $words = preg_split('/(\s+)/u', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
            $chunks = [];
            $buf = '';
            foreach ($words as $w) {
                if ($buf !== '' && (strlen($buf) + strlen($w)) > $maxChars) {
                    $chunks[] = $buf;
                    $buf = '';
                }
                $buf .= $w;
            }
            if ($buf !== '') {
                $chunks[] = $buf;
            }
            return $chunks ?: [''];
        };

        $task1Chunks = $chunkAnswer($task1Answer);
        $task2Chunks = $chunkAnswer($task2Answer);
    @endphp

    <div class="meta">
        <table class="meta-line">
            <tr>
                <td><strong>Student ID:</strong> {{ $customStudentId ?? ($student->id ?? 'N/A') }}</td>
                <td><strong>Test Name:</strong> {{ $formattedTestName ?? ($testName ?? 'N/A') }}</td>
                <td><strong>Attempted Date:</strong> {{ !empty($attemptedAt) ? $attemptedAt->format('M d, Y h:i A') : 'N/A' }}</td>
            </tr>
        </table>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width:70px;">Task</th>
                <th>Question</th>
                <th>Student's Answer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($task1Chunks as $i => $chunk)
                <tr>
                    <td class="qcol">{{ $i === 0 ? 'Task 1' : '' }}</td>
                    <td class="right-col">{!! $i === 0 ? $task1Right : '' !!}</td>
                    <td class="student-col">
                        <div class="student-answer">{!! nl2br(e($chunk)) !!}</div>
                        @if($i === count($task1Chunks) - 1)
                            <div class="word-total">Total Words: {{ $task1Words }}</div>
                        @endif
                    </td>
                </tr>
            @endforeach

            @foreach($task2Chunks as $i => $chunk)
                <tr>
                    <td class="qcol">{{ $i === 0 ? 'Task 2' : '' }}</td>
                    <td class="right-col">{!! $i === 0 ? $task2Right : '' !!}</td>
                    <td class="student-col">
                        <div class="student-answer">{!! nl2br(e($chunk)) !!}</div>
                        @if($i === count($task2Chunks) - 1)
                            <div class="word-total">Total Words: {{ $task2Words }}</div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
