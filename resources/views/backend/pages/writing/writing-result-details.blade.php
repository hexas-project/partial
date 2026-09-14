@extends('index')

@section('content')
<style>
    .writing-eval-table {
        width: 100%;
        table-layout: fixed;
        border-collapse: separate;
        border-spacing: 0;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        overflow: hidden;
    }
    .writing-eval-table th.right-col,
    .writing-eval-table td.right-col,
    .writing-eval-table th.student-col,
    .writing-eval-table td.student-col {
        width: 50%;
    }
    .writing-eval-table thead th {
        background: #0f172a;
        color: #fff;
        font-weight: 600;
        font-size: 12px;
        letter-spacing: 0.6px;
        text-transform: uppercase;
        text-align: center;
        padding: 12px 14px;
        border-bottom: 1px solid #e5e7eb;
        vertical-align: middle;
    }
    .writing-eval-table thead th.student-col {
        border-left: 2px solid rgba(255, 255, 255, 0.25);
    }
    .writing-eval-table tbody td {
        padding: 14px;
        border-bottom: 1px solid #eef2f7;
        vertical-align: top;
    }
    .writing-eval-table tbody td.student-col {
        border-left: 2px solid #e5e7eb;
    }
    .writing-eval-table tbody tr:nth-child(odd) td {
        background: #f8fafc;
    }
    .writing-eval-table tbody tr:hover td {
        background: #eef2ff;
    }
    .writing-eval-table tbody tr:last-child td {
        border-bottom: none;
    }
    .writing-eval-table td.student-col {
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        font-size: 13px;
        line-height: 1.5;
        color: #0f172a;
        overflow-wrap: anywhere;
        word-break: break-word;
    }
    .writing-eval-table td.right-col {
        color: #111827;
        font-size: 13px;
        line-height: 1.5;
        overflow-wrap: anywhere;
        word-break: break-word;
    }
    .writing-topbar {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 16px;
        margin-bottom: 12px;
    }
    .writing-topbar h2 {
        margin: 0;
    }
    .writing-topbar p {
        margin: 6px 0 0 0;
    }
    .writing-eval-table .word-total {
        margin-top: 10px;
        padding-top: 8px;
        border-top: 1px solid #e5e7eb;
        font-weight: 700;
        font-size: 13px;
        color: #111827;
        display: flex;
        justify-content: flex-start;
        gap: 6px;
    }
    .writing-eval-table .word-total strong {
        font-weight: 800;
    }
    .writing-eval-table td:first-child {
        font-weight: 600;
        color: #334155;
        white-space: nowrap;
        width: 90px;
    }
    .writing-eval-table td.right-col img {
        max-width: 100%;
        height: auto;
        max-height: 320px;
        object-fit: contain;
        display: block;
    }
</style>
<div class=" mt-5">
    <div class="writing-topbar">
        <div>
            <h2>
                Result:
                {{ $displayName ?? ($student?->name ?? 'Student ID: ' . ($student?->id ?? 'N/A')) }}
            </h2>
            <p><strong>Attempted Date:</strong> {{ !empty($attemptedAt) ? $attemptedAt->format('M d, Y') : 'N/A' }}</p>
        </div>

        <div>
            <a href="{{ route('export.writing.result.pdf', ['testName' => $testName, 'submissionId' => request()->route('submissionId')]) }}" class="btn btn-success">
                Download PDF
            </a>
        </div>
    </div>

    @php
        $task1Right = '';
        $task2Right = '';
        $tn = strtolower((string) $testName);

        if (str_contains($tn, 'class12_writing')) {
            $task1Right = '<p><strong>The graph below shows usual water usage (in millions of cubic meters) by industries in some countries in a year.</strong></p>'
                . '<p><strong>Summarise the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <b>150 words.</b></p>'
                . '<img src="' . asset('images/writing/1.jpg') . '" class="img-fluid" alt="">';

            $task2Right = '<p><strong>Some people believe that success in sports depends on physical strength, while others believe that mental strength is more important.</strong></p>'
                . '<p><strong>Discuss both views and give your own opinion.</strong></p>'
                . '<p>You should write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class27_writing')) {
            $task1Right = '<p><strong>The pie charts show the average consumption of food in the world in 2008 compared to two countries; China and India.</strong></p>'
                . '<p><strong>Summarize the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <b>150 words.</b></p>'
                . '<img src="' . asset('images/writing/2.jpg') . '" class="img-fluid" alt="">';

            $task2Right = '<p><strong>Many people use written language in a less formal way and in a relaxed way than in the past.</strong></p>'
                . '<p><strong>Why is that so?</strong></p>'
                . '<p><strong>Does this development have more advantages or disadvantages?</strong></p>'
                . '<p>You should write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class28_writing')) {
            $task1Right = '<p><strong>The graph below shows radio and television audiences throughout the day in 1992.</strong></p>'
                . '<p><strong>Summarize the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <b>150 words.</b></p>'
                . '<img src="' . asset('images/writing/3.jpg') . '" class="img-fluid" alt="">';

            $task2Right = '<p><strong>These days many people leave their country to work abroad and take their family with them.</strong></p>'
                . '<p>Do you think the advantages of this development outweigh its disadvantages?</p>'
                . '<p>You should write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class29_writing')) {
            $task1Right = '<p><strong>The first chart below shows the results of a survey which sampled a cross-section of 100,000 people asking if they traveled abroad and why they traveled for the period 1994-98. The second chart shows their destinations over the same period.</strong></p>'
                . '<p><strong>Summarize the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <b>150 words.</b></p>'
                . '<table class="table table-bordered mt-3">'
                . '<thead>'
                . '<tr><th colspan="6" style="text-align: center;"><em>VISITS ABROAD BY UK RESIDENTS BY PURPOSE OF VISIT (1994-98)</em></th></tr>'
                . '<tr><th></th><th><em>1994</em></th><th><em>1995</em></th><th><em>1996</em></th><th><em>1997</em></th><th><em>1998</em></th></tr>'
                . '</thead>'
                . '<tbody>'
                . '<tr><td><em>Holiday</em></td><td>15,246</td><td>14,898</td><td>17,896</td><td>19,703</td><td>20,700</td></tr>'
                . '<tr><td><em>Business</em></td><td>3,155</td><td>3,188</td><td>3,249</td><td>3,639</td><td>3,957</td></tr>'
                . '<tr><td><em>Visits to friends & relatives</em></td><td>2,689</td><td>2,628</td><td>2,774</td><td>3,051</td><td>3,181</td></tr>'
                . '<tr><td><em>Other reasons</em></td><td>982</td><td>896</td><td>1,030</td><td>1,054</td><td>990</td></tr>'
                . '<tr><td><strong><em>TOTAL</em></strong></td><td><strong>22,072</strong></td><td><strong>21,610</strong></td><td><strong>24,949</strong></td><td><strong>27,447</strong></td><td><strong>28,828</strong></td></tr>'
                . '</tbody>'
                . '</table>'
                . '<img src="' . asset('images/writing/4.jpg') . '" class="img-fluid" alt="">';

            $task2Right = '<p><strong>Some people believe that only the government can bring about significant changes in society, while others think that even an individual can have a lot of influence on society.</strong></p>'
                . '<p><strong>Discuss both sides and give your opinion.</strong></p>'
                . '<p>You should write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class30_writing')) {
            $task1Right = '<p><strong>The chart below shows estimated world illiteracy rates by region and by gender in 2000.</strong></p>'
                . '<p><strong>Summarize the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <b>150 words.</b></p>'
                . '<p class="text-center mt-3"><em><strong>Estimated World illiteracy rates, by region and gender, 2000.</strong></em></p>'
                . '<img src="' . asset('images/writing/5.jpg') . '" class="img-fluid" alt="">';

            $task2Right = '<p><strong>Some people think that famous people can help international aid organizations to draw attention to important problems. Others believe that the celebrities can make the problems seem less important.</strong></p>'
                . '<p><strong>Discuss both views and give your opinion.</strong></p>'
                . '<p>You should write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class31_writing')) {
            $task1Right = '<p><strong>The graph below gives information about consumption of energy in the USA since 1980 with projections until 2030.</strong></p>'
                . '<p><strong>Summarize the information by selecting and reporting the main features, and making comparisons where relevant.</strong></p>'
                . '<p>Write at least <b>150 words.</b></p>'
                . '<img src="' . asset('images/writing/writing6.png') . '" class="img-fluid" alt="">';

            $task2Right = '<p><strong>Computers today can quickly and accurately translate languages; therefore, it is a waste of time to learn a foreign language.</strong></p>'
                . '<p><strong>To what extent do you agree or disagree?</strong></p>'
                . '<p>You should write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class32_writing')) {
            $task1Right = '<p><strong>The plans below show a public park when it first opened in 1920 and the same park today.</strong></p>'
                . '<p><strong>Summarise the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <b>150 words.</b></p>'
                . '<img src="' . asset('images/writing/writing7.png') . '" class="img-fluid" alt="">';

            $task2Right = '<p><strong>Some people think watching television is bad for children in every way. Others believe it is good for developing children as they grow up.</strong></p>'
                . '<p><strong>Discuss both views and give your own opinion.</strong></p>'
                . '<p>You should write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class33_writing')) {
            $task1Right = '<p><strong>The bar charts below show the Marriage and Divorce Statistics for eight countries in 1981 and 1994.</strong></p>'
                . '<p><strong>Write a short report for a university lecturer describing the information shown below.</strong></p>'
                . '<p>Write at least <b>150 words.</b></p>'
                . '<img src="' . asset('images/writing/writing8.png') . '" class="img-fluid" alt="">';

            $task2Right = '<p><strong>In many countries, people throw away a lot of food from restaurants and shops.</strong></p>'
                . '<p><strong>Why do you think people waste food in this way? What can be done to reduce the amount of food thrown away?</strong></p>'
                . '<p>Give reasons for your answer and include any relevant examples from your own knowledge or experience.</p>'
                . '<p>You should write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class34_writing')) {
            $task1Right = '<p><strong>The table below gives information about UK independent films.</strong></p>'
                . '<p><strong>Summarize the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <b>150 words.</b></p>'
                . '<img src="' . asset('images/writing/writing9.png') . '" class="img-fluid" alt="">';

            $task2Right = '<p><strong>The noise level around us is constantly increasing and affecting the quality of our lives.</strong></p>'
                . '<p><strong>What are the causes of this problem? What should be done to solve it?</strong></p>'
                . '<p>You should write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class35_writing')) {
            $task1Right = '<p><strong>The line graph below shows the number of annual visits to Australia by overseas residents. The table below gives information on the country of origin where the visitors came from.</strong></p>'
                . '<p><strong>Write a report for a university lecturer describing the information given.</strong></p>'
                . '<p>Write at least <b>150 words.</b></p>'
                . '<img src="' . asset('images/writing/writing10.png') . '" class="img-fluid" alt="">';

            $task2Right = '<p><strong>The best way to solve the world\'s environmental problems is to increase the cost of fuel for cars and other vehicles.</strong></p>'
                . '<p><strong>To what extent do you agree or disagree?</strong></p>'
                . '<p>You should write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class36_writing')) {
            $task1Right = '<p><strong>The graph and table below give information about water use worldwide and water consumption in two different countries.</strong></p>'
                . '<p><strong>Summarize the information by selecting and reporting the main features, and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <b>150 words.</b></p>'
                . '<img src="' . asset('images/writing/writing11.png') . '" class="img-fluid" alt="">';

            $task2Right = '<p><strong>Some people suggest that a country should try to produce all the food for its population and import as little food as possible.</strong></p>'
                . '<p><strong>To what extent do you agree or disagree?</strong></p>'
                . '<p>You should write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class37_writing')) {
            $task1Right = '<p><strong>The chart shows British Emigration to selected destinations between 2004 and 2007.</strong></p>'
                . '<p><strong>Summarize the information by selecting and reporting the main features and make comparisons where relevant.</strong></p>'
                . '<p>Write at least <b>150 words.</b></p>'
                . '<img src="' . asset('images/writing/writing12.png') . '" class="img-fluid" alt="">';

            $task2Right = '<p><strong>Some people believe that children that commit crimes should be punished. Others think parents should be punished instead.</strong></p>'
                . '<p><strong>Discuss both views and give your own opinion.</strong></p>'
                . '<p>You should write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class1_writing')) {
            $task1Right = '<p><strong>You are visiting another town next month for a short break. Write a letter to the tourist information centre. In your letter:</strong></p>'
                . '<ul><li>Tell them how long you are staying</li><li>Ask for some suggestions for what to do</li><li>Find out if there are any local events happening at the time</li></ul>'
                . '<p>Write at least <b>150</b> words.</p>';
            $task2Right = '<p><strong>In many countries, schoolchildren are required to wear school uniforms. Do you think this should be enforced in all schools?</strong></p>'
                . '<p>Give reasons for your answer and include any relevant examples from your own knowledge or experience.</p>'
                . '<p>Write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class2_writing')) {
            $task1Right = '<p><strong>You have seen an advertisement looking for volunteers to teach English overseas. Write to the recruitment office. In your letter:</strong></p>'
                . '<ul><li>Tell them where you saw the advertisement</li><li>Explain why you would like to go</li><li>Describe the skills that you have that you think would help</li></ul>'
                . '<p>Write at least <b>150</b> words.</p>';
            $task2Right = '<p><strong>Teenagers are spending an increasing amount of time on the Internet, and this is having a negative effect on their social skills.</strong></p>'
                . '<p>Do you agree or disagree? Give reasons for your answer and include any relevant examples from your own knowledge or experience.</p>'
                . '<p>Write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class3_writing')) {
            $task1Right = '<p><strong>You recently saw an advertisement in a newspaper seeking volunteers to do unpaid work with local children. You are interested in this work. Write a letter to the head of the organization. In your letter:</strong></p>'
                . '<ul><li>Express your interest</li><li>Ask for details of the work that needs to be done</li><li>Let them know when you are available</li></ul>'
                . '<p>Write at least <b>150</b> words.</p>';
            $task2Right = '<p><strong>Some people think that air travel should be reduced to protect the environment.</strong></p>'
                . '<p>Do you agree or disagree? Give reasons for your answer and include any relevant examples from your own knowledge or experience.</p>'
                . '<p>Write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class4_writing')) {
            $task1Right = '<p><strong>You came to know about a piece of equipment that would help you at your workplace. Write a letter to your manager. In your letter:</strong></p>'
                . '<ul><li>Describe the equipment</li><li>Explain how it might be useful at your workplace</li><li>Offer help in purchasing it</li></ul>'
                . '<p>Write at least <b>150</b> words.</p>';
            $task2Right = '<p><strong>In many schools, sports lessons are part of the timetable, because it is important for both boys and girls to participate in sports.</strong></p>'
                . '<p>Do you agree or disagree with this statement? Give reasons for your answer and include relevant examples from your knowledge or experience.</p>'
                . '<p>Write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class5_writing')) {
            $task1Right = '<p><strong>You are travelling next month to stay with a host family you do not know as part of a student exchange program. Write a letter to the family to introduce yourself. In your letter:</strong></p>'
                . '<ul><li>Say when and how you will be arriving</li><li>Tell the family a little about yourself</li><li>Ask about the weather to pack suitable clothes</li></ul>'
                . '<p>Write at least <b>150</b> words.</p>';
            $task2Right = '<p><strong>Some people believe that restoration of old buildings costs too much; we should demolish them and build new ones instead.</strong></p>'
                . '<p>To what extent do you agree or disagree?</p>'
                . '<p>Write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class6_writing')) {
            $task1Right = '<p><strong>You recently received an invitation to a three-day training program which should benefit you and the company. Write a letter to your manager and say:</strong></p>'
                . '<ul><li>Ask to attend the program</li><li>Describe the program</li><li>Explain how the program will benefit the company</li></ul>'
                . '<p>Write at least <b>150</b> words.</p>';
            $task2Right = '<p><strong>It is expected in the near future that there will be a higher proportion of old people compared to younger population in some countries.</strong></p>'
                . '<p>Is it a positive or negative development? Give your opinion and examples.</p>'
                . '<p>Write at least <b>250</b> words.</p>';
        } elseif (str_contains($tn, 'class7_writing')) {
            $task1Right = '<p><strong>Write a letter to your English speaking friend to invite him/her to see a movie about your country. In your letter say:</strong></p>'
                . '<ul><li>Describe the movie</li><li>Why would he/she find it interesting?</li><li>Suggest an arrangement to watch the movie together</li></ul>'
                . '<p>Write at least <b>150</b> words.</p>';
            $task2Right = '<p><strong>These days it is very common to have people from two different generations mix in the same workplace.</strong></p>'
                . '<p>Are there more advantages or disadvantages to this situation? Give your own opinion and include relevant examples.</p>'
                . '<p>Write at least <b>250</b> words.</p>';
        }
    @endphp

    <!--{{-- <table class="table">-->
    <!--    <thead>-->
    <!--        <tr>-->
    <!--            <th>Your Answer</th>-->
    <!--        </tr>-->
    <!--    </thead>-->
    <!--    <tbody>-->
    <!--        @forelse($resultDetails as $detail)-->
    <!--            <tr>-->
    <!--                <td style="white-space: pre-wrap;">{!! nl2br(e($detail['student_answer'])) !!}</td>-->
    <!--            </tr>-->
    <!--        @empty-->
    <!--            <tr><td colspan="2">No answers found.</td></tr>-->
    <!--        @endforelse-->
    <!--    </tbody>-->
    <!--</table> --}}-->

    <table class="table writing-eval-table">
        <thead>
            <tr>
                <th style="width: 90px;">Task</th>
                <th class="right-col">Question </th>
                <th class="student-col">Student's Answer</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Task 1</td>
                <td class="right-col" style="white-space: normal;">{!! $task1Right !!}</td>
                @php
                    $task1Answer = (string) ($resultDetails['testOne'] ?? '');
                    $task1Words = count(preg_split('/\s+/', trim($task1Answer), -1, PREG_SPLIT_NO_EMPTY));
                @endphp
                <td class="student-col" style="white-space: pre-wrap;">
                    <div>{!! nl2br(e($task1Answer)) !!}</div>
                    <div class="word-total"><strong>Total Words:</strong> <strong>{{ $task1Words }}</strong></div>
                </td>
            </tr>
            <tr>
                <td>Task 2</td>
                <td class="right-col" style="white-space: normal;">{!! $task2Right !!}</td>
                @php
                    $task2Answer = (string) ($resultDetails['testTwo'] ?? '');
                    $task2Words = count(preg_split('/\s+/', trim($task2Answer), -1, PREG_SPLIT_NO_EMPTY));
                @endphp
                <td class="student-col" style="white-space: pre-wrap;">
                    <div>{!! nl2br(e($task2Answer)) !!}</div>
                    <div class="word-total"><strong>Total Words:</strong> <strong>{{ $task2Words }}</strong></div>
                </td>
            </tr>
        </tbody>
    </table>

</div>
@endsection
