@extends('index')

@section('content')
<div class="app-ecommerce">
    <form action="{{ route('reading.answer.store') }}" method="POST">
        @csrf

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-6 row-gap-4">
            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1">Add Reading Answers</h4>
            </div>
        </div>

        <div class="row">
            <!-- Main Form -->
            <div class="col-12 col-lg-9">
                <div class="card mb-6">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Test Information</h5>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-label-secondary" onclick="window.history.back()">Discard</button>
                            <button type="submit" class="btn btn-label-primary">Save All Answers</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="testName">Test Name</label>
                            <select name="test_name" id="testName" class="form-control mt-2" required>
                                <option value="">Select Test</option>
                                <optgroup label="Academic Reading">
                                    <option value="class18_reading">01 : Reading</option>
                                    <option value="class19_reading">02 : Reading</option>
                                    <option value="class20_reading">03 : Reading</option>
                                    <option value="class04_reading">04 : Reading</option>
                                    <option value="class05_reading">05 : Reading</option>
                                    <option value="class06_reading">06 : Reading</option>
                                    <option value="class07_reading">07 : Reading</option>
                                    <option value="class08_reading">08 : Reading</option>
                                    <option value="class09_reading">09 : Reading</option>
                                    <option value="class10_reading">10 : Reading</option>
                                    <option value="class11_reading">11 : Reading</option>
                                    <option value="class12_reading">12 : Reading</option>
                                </optgroup>
                                <optgroup label="GT Reading">
                                    <option value="gt_class1_reading">01 : Reading GT</option>
                                    <option value="gt_class2_reading">02 : Reading GT</option>
                                    <option value="gt_class3_reading">03 : Reading GT</option>
                                    <option value="gt_class4_reading">04 : Reading GT</option>
                                    <option value="gt_class5_reading">05 : Reading GT</option>
                                    <option value="gt_class6_reading">06 : Reading GT</option>
                                    <option value="class22_reading">07 : Reading GT</option>
                                </optgroup>
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
                questionContainer.innerHTML = '';
                questionContainer.appendChild(createQuestionInput(1));
                return;
            }

            fetch(`/reading/answer/${testName}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.answers) {
                        questionContainer.innerHTML = '';

                        Object.entries(data.answers).forEach(([questionNum, answer]) => {
                            questionContainer.appendChild(createQuestionInput(questionNum, answer));
                        });
                    } else {
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
