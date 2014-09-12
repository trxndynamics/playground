$(document).ready(function(){
    $('.playerSelect').on('click', function(){
        var playerCount = $('#playerList > div').length;

        if(playerCount < 11){
            if($('#playerList > #pid_'+$(this).data('id')).length < 1){
                $('#playerList').append(
                    '<div id="pid_' + $(this).data('id') + '">' +
                        '<span style="font-weight:bold">' + $(this).data('position') + '</span>   ' +
                        $(this).data('name') + ' ' +
                        '</div><input type="hidden" name="player[]" value="'+$(this).data('id')+'" />'
                );

                if($('#playerList > div').length == 11){
                    $('#playerList').append('<input type="submit">');
                }
            } else {
                alert('the same player cannot be added twice');
            }
        } else {
            alert('only 11 players can be selected');
        }
    });
});