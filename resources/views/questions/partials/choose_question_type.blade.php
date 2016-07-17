<div class="form-inline" role="form" style="padding: 15px 0;">
<div class="container">
<div class ="form-group">

  <label class="control-label labelFont">Questionnaires</label>
</div>

<div class="form-group">
    <label class="control-label" for="choice" style="margin-left: 10px;">Choose Question Type</label>
</div>

<div class="form-group">
    <div class="paddingLeft question-type-checkbox" style="margin-left: 10px;">

        <button
           class="btn btn-primary question_button"
           id="multiple_choice_button"
           disabled
           onclick="show_question('#multiple_choice')"
        >
           Multiple Choice
        </button>

        <button
            class="btn btn-primary question_button"
            id="quantative_question_button"
            onclick="show_question('#quantative_question')"
            >
            Quantative Question
        </button>

        <button
            class="btn btn-primary question_button"
            id="qualitative_question_button"
            onclick="show_question('#qualitative_question')"
            >
            Qualitative Question
        </button>

 </div>

</div>
</div>
</div>
