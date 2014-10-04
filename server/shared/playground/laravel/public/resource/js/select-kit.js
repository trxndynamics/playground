$(document).ready(function() {
    $('#example').DataTable();

    changeKitBindings = function(){
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

            if(homeKit.attr('src') !== $(this).attr('src')){
                awayKit.attr('src', homeKit.attr('src'));
                homeKit.attr('src', $(this).attr('src'));
            }
        });
    };

    $('#example_wrapper').change(function(){
        changeKitBindings();
    });

    $('.dataTables_paginate').on('click', function(){
        changeKitBindings();
    });

    changeKitBindings();
} );