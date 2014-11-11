$(document).ready(function(){
    var playerList = $('#playerList');
    var counter = 0;

    $('.playerSelect').on('click', function(){
        if(counter < 11) {
            counter++;

            var playerFace = $('#player-face-id-' + counter);
            var playerName = $('#player-name-id-' + counter);

            playerFace.attr('src', $(this).data('image-ref'));
            playerFace.css('width', '100%');
            playerName.text($(this).data('name'));

            $(this).closest('tr').addClass('hidden');

            playerList.append('<input type="hidden" name="player[]" value="'+$(this).data('id')+'" />');
            if(counter == 11){
                playerList.append('<input type="submit"  class="squadSelectSubmit">');
            }
        } else {
            alert('only 11 players can be selected');
        }
    });

    $('.plaaayerSelect').on('click', function(){
        var playerCount = playerList.children('div').length;

        if(playerCount < 11){
            $(this).closest('tr').addClass('hidden');

            if(playerList.children('#pid_'+$(this).data('id')).length < 1){
                playerList.append(
                    '<div id="pid_' + $(this).data('id') + '">' +
                    '<span style="font-weight:bold">' + $(this).data('position') + '</span>   ' +
                    $(this).data('name') + ' ' +
                    '</div><input type="hidden" name="player[]" value="'+$(this).data('id')+'" />'
                );

                if(playerList.children('div').length == 11){
                    playerList.append('<input type="submit" class="squadSelectSubmit">');
                }
            } else {
                alert('the same player cannot be added twice');
            }
        } else {
            alert('only 11 players can be selected');
        }
    });
});