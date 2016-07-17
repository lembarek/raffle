<form action="{{ route('question.store.qualitative') }}" method="POST">
<div class="formbg row hide question-container" id="qualitative_question">
    <h2>Qualitative Question</h2>
    <div class="form-horizontal textboxPadding question-holder" question="1">
        <div class="clearfix" style="margin-bottom: 15px;">
        <div class="col-md-12">
            <div class="question-textarea-container">
                <textarea class="form-control" name="question[qualitative_question][1][question_description]" style="height: 150px;"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="text-right" style="margin-top: 15px;">
                <button class="btn btn-primary done-question" type="button">next Question</button>
            </div>
        </div>
        </div>
    </div>
</div>
</form>
