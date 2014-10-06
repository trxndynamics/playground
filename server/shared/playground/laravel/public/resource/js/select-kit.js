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
            var thirdKit = $('#third-kit');
            var goalkeeperKit = $('#goalkeeper-kit');

            if(homeKit.attr('src') !== $(this).attr('src')){
                goalkeeperKit.attr('src',thirdKit.attr('src'));
                thirdKit.attr('src', awayKit.attr('src'));
                awayKit.attr('src', homeKit.attr('src'));
                homeKit.attr('src', $(this).attr('src'));
            }
        });
    };

    loadImages = function(){
        $('#example img.kit').each(function(){
            $(this).attr('src', $(this).data('src-ref'));
        });
    }

    $('#example_wrapper').change(function(){
        changeKitBindings();
        loadImages();
    });

    $('.dataTables_paginate').on('click', function(){
        changeKitBindings();
        loadImages();
    });

    changeKitBindings();
    loadImages();
} );