$(document).ready(function() {
    $('#example').DataTable();

    $('img').on('click', function(){
        $.ajax({
            type: "POST",
            url: '/team/select-kit/chosen',
            data: {
                'src': $(this).attr('src')
            }
        });

        var homeKit = $('#home-kit');
        var awayKit = $('#away-kit');

        awayKit.attr('src', homeKit.attr('src'));
        homeKit.attr('src', $(this).attr('src'));
    });
} );