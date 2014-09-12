$(document).ready(function(){
    $('button#submit').on('click', function(){
        var submittedDate = $('.weekday').text()+' '+$('.date').text()+' '+$('.year').text();
        $('#finalDate').val(submittedDate);

        $('#finalForm').submit();
    });

    $('.teamSelect').on('click', function(){
        event.preventDefault();
        $('.teamSelect').removeClass('chosen-team');
        var selectedTeam = $(this).text();
        $('#finalClub').val(selectedTeam);
        $(this).addClass('chosen-team');
    });
});
