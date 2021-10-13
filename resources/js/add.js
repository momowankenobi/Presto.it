$(function(){
    if($('#drophere').length > 0){
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let uniqueSecret = $('input[name="uniqueSecret"]').attr('value');
        let myDropzone = new Dropzone('#drophere', {
            url: '/add/images/upload',
            params: {
                _token: csrfToken,
                uniqueSecret: uniqueSecret
            },
            addRemoveLinks: true,
            init: function(){
                $.ajax({
                    type: 'GET',
                    url: '/add/images',
                    data: {
                        uniqueSecret: uniqueSecret
                    },
                    dataType: 'json'
                }).done(function(data){
                    $.each(data, function(key, value){
                        let file = {
                            serverId: value.id
                        };
                        myDropzone.options.addedfile.call(myDropzone, file);
                        myDropzone.options.thumbnail.call(myDropzone, file, value.src);
                    });
                });
            }
        });
        myDropzone.on("success", function(file, response){
            file.serverId = response.id;
        });
        myDropzone.on("removedfile", function(file){
            $.ajax({
                type: 'DELETE',
                url: '/add/images/remove',
                data: {
                    _token: csrfToken,
                    id: file.serverId,
                    uniqueSecret: uniqueSecret
                },
                dataType: 'json'
            });
        });
    }
})

const swiper = new Swiper('.swiper', {
// Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    speed: 2000,
    autoplay: {
        enabled: true,
        delay: 3000,
    }
});