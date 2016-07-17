var make = new make();
var question = 1;

function make()
{
    init();

    function init()
    {
        document_ready();
    }

    function document_ready()
    {
        $(document).ready(function()
        {
            event_done_question();
            event_question_type();
            action_question_type();
        });
    }

    function event_done_question()
    {
        var really_done = 0;
        $(".done-question").unbind("click");
        $(".done-question").bind("click", function()
        {
            var question_type = $(this).parent().parent().parent().parent().parent().attr("type");

            if (question_type == "multiple_choice") 
            {
              $('.question-container[type="'+question_type+'"] .answerino').each(function()
              {
                    if($(this).val() == "")
                    {
                        really_done = 0;
                    }
                    else
                    {
                        really_done = 1;
                    }
              });
            }
            else
            {
              if ($('.question-container[type="'+question_type+'"] .question-textarea-container textarea').val() == "") 
              {
                really_done = 0
              }
              else
              {
                really_done = 1;
              }
            }

            if(really_done == 1)
            {
                action_done_question(question_type);
                document_ready();

                really_done = 0;
            }
            else
            {
                if (question_type == "multiple_choice") 
                {
                  alert("Fill up all answers.");
                }
                else
                {
                  alert("Fill the question.");
                }
            }
        });
    }

    function action_done_question(question_type)
    {
        question += 1;

        if(question_type == "multiple_choice")
        {
            var append_question = '<div class="form-horizontal textboxPadding question-holder" question="' + question + '">' +
                '<div class="clearfix" style="margin-bottom: 15px;">' +
                '<div class="col-md-6">' +
                '<div class="question-textarea-container">' +
                '<textarea class="form-control" name="question[' + question_type + '][' + question + '][question_description]" style="height: 150px;"></textarea>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-6">' +
                '<div class="question-radio-container">' +
                '<div class="radio">' +
                '<label class="labelWidth">' +
                '<input style="margin-top: 10px;" type="radio" name="question[' + question_type + '][' + question + '][answer_question]" value="1" checked>' +
                '<input type="text" class="form-control customPlaceholder answerino" name="question[' + question_type + '][' + question + '][answer][1]" id="answer" placeholder="Enter Answer">' +
                '</label>' +
                '</div>' +
                '<div class="radio">' +
                '<label class="labelWidth">' +
                '<input style="margin-top: 10px;" type="radio" name="question[' + question_type + '][' + question + '][answer_question]" value="2" checked>' +
                '<input type="text" class="form-control customPlaceholder answerino" name="question[' + question_type + '][' + question + '][answer][2]" id="answer" placeholder="Enter Answer">' +
                '</label>' +
                '</div>' +
                '<div class="radio">' +
                '<label class="labelWidth">' +
                '<input style="margin-top: 10px;" type="radio" name="question[' + question_type + '][' + question + '][answer_question]" value="3" checked>' +
                '<input type="text" class="form-control customPlaceholder answerino" name="question[' + question_type + '][' + question + '][answer][3]" id="answer" placeholder="Enter Answer">' +
                '</label>' +
                '</div>' +
                '<div class="radio">' +
                '<label class="labelWidth">' +
                '<input style="margin-top: 10px;" type="radio" name="question[' + question_type + '][' + question + '][answer_question]" value="4" checked>' +
                '<input type="text" class="form-control customPlaceholder answerino" name="question[' + question_type + '][' + question + '][answer][4]" id="answer" placeholder="Enter Answer">' +
                '</label>' +
                '</div>' +
                '</div>' +
                '<div class="text-right" style="margin-top: 15px;">' +
                '<button class="btn btn-primary done-question" type="button">Done</button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
        }
        else if(question_type == "quantative_question" || question_type == "qualitative_question")
        {
          var append_question = '<div class="form-horizontal textboxPadding question-holder" question="'+question+'">'+
                                   '<div class="clearfix" style="margin-bottom: 15px;">'+
                                      '<div class="col-md-12">'+
                                          '<div class="question-textarea-container">'+
                                              '<textarea class="form-control" name="question['+question_type+']['+question+'][question_description]" style="height: 150px;"></textarea>'+
                                          '</div>'+
                                      '</div>'+
                                      '<div class="col-md-12">'+
                                         '<div class="text-right" style="margin-top: 15px;">'+
                                             '<button class="btn btn-primary done-question" type="button">Done</button>'+
                                         '</div>'+
                                      '</div>'+
                                   '</div>'+
                                '</div>'
        }

        $('.question-container[type="'+question_type+'"] .question-holder').addClass("hide");

        $('.question-container[type="'+question_type+'"]').append(append_question);
    }

    function event_question_type()
    {
      $('.question-type-checkbox input[type="checkbox"]').change(function(event) 
      {
        action_question_type();
      });
    }

    function action_question_type()
    {
      $('.question-container').addClass('hide');
      $('.question-container').find('input, textarea, button, select').attr('disabled','disabled');
      
      $('.question-type-checkbox input[type="checkbox"]:checked').each(function(index, el) 
      {
        var question_type = $(el).val();
        
        $('.question-container[type="'+question_type+'"]').removeClass('hide');
        $('.question-container[type="'+question_type+'"]').find('input, textarea, button, select').removeAttr('disabled');
      });
    }
}
