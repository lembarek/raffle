var participate = new participate();

function participate()
{
    init();
    function init()
    {
        document_ready();
    }
    function document_ready()
    {
        event_show_current_question();
    }
    function event_show_current_question()
    {
        var raffle_id = $(".raffle-id-container").val();
        
        $.ajax({
        	url: '/participate_check_question',
        	type: 'GET',
        	dataType: 'json',
        	data: {raffle_id: raffle_id},
        })
        .done(function(data) {
        	console.log("success");
        	action_show_current_question(data);
        	event_submit_answer(data);
        })
        .fail(function() {
        	console.log("error");
        })
        .always(function() {
        	console.log("complete");
        });
    }
    function action_show_current_question(data)
    {
        if ((data.number_question) == data.total_question) 
        {
            $(".question-proceed").text("Finish");
        }
        
        if (data.number_question > data.total_question) 
        {
            location.href="/";
        }
        else
        {
            $(".total-question").text("Question # " + data.number_question + "/" + data.total_question);
            $('.question-container').addClass("hide");
            $('.question-container[question="'+data.question_id+'"]').removeClass("hide");
        }
    }
    function event_submit_answer(data)
    {
        $(".question-proceed").unbind("click");
        $(".question-proceed").bind("click", function()
        {
            $(this).prop("disabled", true);
            $(this).attr("disabled", "disabled");
            
            action_submit_answer(data);
        });
    }
    function action_submit_answer(data)
    {
        var raffle_id = $(".raffle-id-container").val();
        var question_type = $('.question-container[question="'+data.question_id+'"] input[name=answer]').attr("question-type");
        if (!question_type) 
        {
            var question_type = $('.question-container[question="'+data.question_id+'"] textarea[name=answer]').attr("question-type");
        }
        var question_id = $('.question-container[question="'+data.question_id+'"] input[name=answer]').attr("question-id");
        if (!question_id) 
        {
            var question_id = $('.question-container[question="'+data.question_id+'"] textarea[name=answer]').attr("question-id");
        }

        if (question_type == "multiple_choice")
        {
            var answer = $('.question-container[question="'+data.question_id+'"] input[name=answer]:checked').val();
        }
        else if (question_type == "quantative_question") 
        {
            var answer = $('.question-container[question="'+data.question_id+'"] input[name=answer]').val();
        }
        else if (question_type == "qualitative_question")
        {
            var answer = $('.question-container[question="'+data.question_id+'"] textarea[name=answer]').val();
        }

        if(answer)
        {
            $.ajax({
            	url: '/participate_add_answer',
            	type: 'GET',
            	dataType: 'json',
            	data: {
            	    raffle_id: raffle_id,
            	    answer: answer,
                    question_type: question_type,
                    question_id: question_id
            	},
            })
            .done(function(data) {
            	console.log("success");
            	if (data.number_question > data.total_question) 
                {
                    location.href="/";
                }
                else
                {
                    event_show_current_question();
                }
            })
            .fail(function() {
            	console.log("error");
            })
            .always(function() {
            	console.log("complete");
            });
        }
        else
        {
            $('.question-container[question="'+data.question_id+'"] .question-proceed').removeProp("disabled");
            $('.question-container[question="'+data.question_id+'"] .question-proceed').removeAttr("disabled");
            
            if (data.number_question > data.total_question) 
            {
                location.href="/";
            }
            else
            {
                alert("Pick an answer first.");
            }
        }
    }
}
