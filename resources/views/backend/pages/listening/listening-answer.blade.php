@extends('index')

@section('content')
<div class="app-ecommerce">
    <form action="{{ route('listening.answer.store') }}" method="POST">
        @csrf

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1">Add Listening Answers</h4>
            </div>
        </div>

        <div class="row">
            <!-- Main Form -->
            <div class="col-12 col-lg-9">
                <div class="card mb-6">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Test Information</h5>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-label-secondary" onclick="window.history.back()">Discard</button>
                            <button type="submit" class="btn btn-sm btn-primary">Save All Answers</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="testName">Test Name</label>
                            <select name="test_name" id="testName" class="form-control mt-2" required>
                                <option value="">Select Test</option>
                                <option value="listeningOne">101 Listening</option>
                                <option value="class05-listening">102 Listening</option>
                                <option value="listeningThree">103 Listening</option>
                                <option value="listeningFourOne">104 Listening</option>
                                <option value="listeningFour">105 Listening</option>
                                <option value="listeningFive">106 Listening</option>
                                <option value="listeningSeven">107 Listening</option>
                                <option value="listeningEight">108 Listening</option>
                                <option value="listeningNine">109 Listening</option>
                                <option value="listeningTen">110 Listening</option>
                                <option value="listeningEleven">111 Listening</option>
                                <option value="listeningtwelve">112 Listening</option>
                            </select>
                        </div>

                        <div id="question-container">
                            <!-- FIRST QUESTION FIELD SHOWING BY DEFAULT -->
                            <div class="input-group mb-2">
                                <span class="input-group-text" style="min-width: 50px;">1</span>
                                <input type="hidden" name="q_numbers[]" value="1">
                                <input type="text" name="answers[]" class="form-control" placeholder="Enter correct answer" required>
                            </div>
                        </div>

                        <button type="button" id="add-question" class="btn btn-sm btn-success mt-3">
                            + Add Answer
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">

            </div>
        </div>
    </form>
</div>

{{-- SCRIPT --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let questionContainer = document.getElementById('question-container');
        let addButton = document.getElementById('add-question');
        let testNameSelect = document.getElementById('testName');

        function updateQuestionNumbers() {
            const allGroups = document.querySelectorAll('#question-container .input-group');
            allGroups.forEach((group, index) => {
                const num = index + 1;
                group.querySelector('.input-group-text').textContent = num;
                group.querySelector('input[name="q_numbers[]"]').value = num;
            });
        }

        function createQuestionInput(number, answer = '') {
            const questionDiv = document.createElement('div');
            questionDiv.classList.add('input-group', 'mb-2');
            questionDiv.innerHTML = `
                <span class="input-group-text" style="min-width: 50px;">${number}</span>
                <input type="hidden" name="q_numbers[]" value="${number}">
                <input type="text" name="answers[]" class="form-control" placeholder="Enter correct answer" value="${answer}" required>
            `;

            return questionDiv;
        }

        // Load answers when test is selected
        testNameSelect.addEventListener('change', function() {
            const testName = this.value;
            
            if (!testName) {
                // Clear container and add one empty input
                questionContainer.innerHTML = '';
                questionContainer.appendChild(createQuestionInput(1));
                return;
            }

            // Fetch answers from database
            fetch(`/listening/answer/${testName}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.answers) {
                        // Clear existing inputs
                        questionContainer.innerHTML = '';
                        
                        // Add inputs for each answer
                        Object.entries(data.answers).forEach(([questionNum, answer]) => {
                            questionContainer.appendChild(createQuestionInput(questionNum, answer));
                        });
                    } else {
                        // No answers found, show one empty input
                        questionContainer.innerHTML = '';
                        questionContainer.appendChild(createQuestionInput(1));
                    }
                })
                .catch(error => {
                    console.error('Error loading answers:', error);
                    alert('Failed to load answers');
                });
        });

        addButton.addEventListener('click', function() {
            const count = questionContainer.querySelectorAll('.input-group').length + 1;
            questionContainer.appendChild(createQuestionInput(count));
        });
    });
</script>
@endsection
