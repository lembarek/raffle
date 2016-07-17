@extends('layout.master')

@section('content')

    @include('questions.partials.choose_question_type')

    @include('questions.partials.multiple_choice')

    @include('questions.partials.quantative_question')

    @include('questions.partials.qualitative_question')

@stop


@section("script")
    <script type="text/javascript">
        function show_question(id){
            $('.question_button').prop('disabled', false);

            $(id+'_button').prop('disabled', true);

            $('.question-container').each(function(key, item){
                $(item).addClass('hide');
            });

            $(id).removeClass('hide');
        }
    </script>
@stop
