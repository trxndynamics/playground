$(function(){
    $('a[title]').tooltip();

    $('#get-started-next').on('click', function(){
        event.preventDefault();
        $('#step-profile > a').trigger('click');
    });

    $('#profile-next').on('click', function(){
        event.preventDefault();
        $('#step-select-club > a').trigger('click');
    });

    $('#select-club-next').on('click', function(){
        event.preventDefault();

        $('#select-read-desc > a').trigger('click');
    });

    $('#select-target-next').on('click', function(){
        event.preventDefault();

        $('#displayForename').text($('#forename').val());
        $('#displaySurname').text($('#surname').val());
        $('#displayClubName').text($('#selectClub option:selected').text());
        $('#displayAims').text($('#selectAims option:selected').text());

        $('#step-confirm > a').trigger('click');
    });

    $('#select-confirm-next').on('click', function(){
        event.preventDefault();

        $('#finalForename').val($('#forename').val());
        $('#finalSurname').val($('#surname').val());
        $('#finalLeague').val($('#selectLeague option:selected').text());
        $('#finalClub').val($('#selectClub option:selected').text());
        $('#finalGender').val($('input[name="gender"]:checked').val());

        $('#finalForm').submit();
    });
});