@extends('admin.layout.layout')
@section('main-content')
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <h2>Add Terms & Conditions</h2>
    <form action="{{ route('terms_conditions.store') }}" method="POST">
        @csrf
        <div id="terms-container">
            <div class="term-group">
                <div class="mb-3">
                    <label>Heading</label>
                    <input type="text" name="terms[0][heading]" class="form-control heading" required>
                </div>
                <div class="questions-container">
                    <div class="question-group">
                        <label>Question</label>
                        <input type="text" name="terms[0][questions][0][question]" class="form-control" required>
                        <label>Answer</label>
                        <textarea name="terms[0][questions][0][answer]" class="form-control" required></textarea>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary add-question">Add Question</button>
            </div>
        </div>
        <button type="button" class="btn btn-primary add-heading">Add Heading</button>
        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
</div>

<script>
    let headingIndex = 0;
    let questionIndex = [0];

    document.querySelector('.add-heading').addEventListener('click', function() {
        headingIndex++;
        questionIndex[headingIndex] = 0;

        const termGroup = `
            <div class="term-group">
                <div class="mb-3">
                    <label>Heading</label>
                    <input type="text" name="terms[${headingIndex}][heading]" class="form-control heading" required>
                </div>
                <div class="questions-container">
                    <div class="question-group">
                        <label>Question</label>
                        <input type="text" name="terms[${headingIndex}][questions][0][question]" class="form-control" required>
                        <label>Answer</label>
                        <textarea name="terms[${headingIndex}][questions][0][answer]" class="form-control" required></textarea>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary add-question">Add Question</button>
            </div>`;
        document.getElementById('terms-container').insertAdjacentHTML('beforeend', termGroup);
    });

    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('add-question')) {
            const container = e.target.previousElementSibling;
            const index = Array.from(document.querySelectorAll('.term-group')).indexOf(e.target.closest('.term-group'));
            questionIndex[index]++;
            const questionGroup = `
                <div class="question-group">
                    <label>Question</label>
                    <input type="text" name="terms[${index}][questions][${questionIndex[index]}][question]" class="form-control" required>
                    <label>Answer</label>
                    <textarea name="terms[${index}][questions][${questionIndex[index]}][answer]" class="form-control" required></textarea>
                </div>`;
            container.insertAdjacentHTML('beforeend', questionGroup);
        }
    });
</script>
@endsection