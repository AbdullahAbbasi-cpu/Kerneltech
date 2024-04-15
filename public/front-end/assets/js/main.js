$(document).ready(function() {
    // Show the modal when the button is clicked
    $(document).on('click', '.class__open-modal', function(){
        $("#modal").fadeIn();
        $('#modal').css('display', 'flex')
        $('body').css('overflow', 'hidden')
    });

    $(document).on('click', '.responsive-support-button', function(){
        $('.close-navigation-list').trigger('click');
    });
    $(document).on('click', 'button.button-main', function(){
        $('.modal-content').animate({
            scrollTop: $('.modal-content').offset().top
        });
    })

    // Close the modal when the close button is clicked
    $(".cross-button").click(function() {
        $("#modal").fadeOut();
        $('body').css('overflow', 'auto')
        $('.support-tab-content').css('display', 'none')
        $('#default-tab').css('display', 'block')
        $('.support-tab-content-button button').css('background', '#ffffff')
        $('.support-tab-content-button button').css('color', '#073C66')
        $('.support-tab-content-button button span.d-flex.align-c.just-c svg path:first-child').css('fill', '#E76C13');
        $('.support-tab-content-button button').removeClass('active');
    });

    $(".support-tab-content-button button").mouseenter(function(){
        $(this).find('span.d-flex.align-c.just-c svg path:first-child').css('fill', '#ffffff');
        $(this).css('color', '#ffffff');
        $(this).css('background', '#073C66')
    });
    $('.support-tab-content-button button').mouseleave(function(){
        if($(this).hasClass('active')){
            console.log('some element contains the active class');
        } else {
            $(this).find('span.d-flex.align-c.just-c svg path:first-child').css('fill', '#E76C13');
            $(this).css('color', '#073C66');
            $(this).css('background', '#ffffff')
        }
    })
    
    $('.support-tab-content-button button').on('click', function(){
        $('.support-tab-content-button button').css('background', '#ffffff')
        $('.support-tab-content-button button').css('color', '#073C66')
        $('.support-tab-content-button button span.d-flex.align-c.just-c svg path:first-child').css('fill', '#E76C13');
        $(this).css('color', '#ffffff');
        $(this).css('background', '#073C66')
        $(this).find('span.d-flex.align-c.just-c svg path:first-child').css('fill', '#ffffff');
    })
    
    // Close the modal when the user clicks outside the modal content
    $(window).click(function(event) {
        if (event.target == document.getElementById("modal")) {
            $("#modal").fadeOut();
            $('body').css('overflow', 'auto')
        }
    });
    $(document).on('change', '.general-donation', function () {
        if ($('#building-year4').prop('checked')) {
          $('.other-hidden').show(); // Show the element if the "Other" radio button is checked
        } else {
          $('.other-hidden').hide(); // Hide the element if the "Other" radio button is not checked
        }
    });

    $(document).on('input', '#other-amount', function(){
        $('#building-year4').val($('#other-amount').val());
        var otherAmount = $('#other-amount').val();
        var Amount = 'Pay ' + '$' + otherAmount + ' Now';
        $('.general-btn').text(Amount);

    });
    // $('.general-tab').on('click', function() {
    //     if (localStorage.selectedTab !== undefined && localStorage.selectedTab !== null) {            
    //         $('#' + localStorage.selectedTab + '-btn').addClass('active');
    //         $('#' + localStorage.selectedTab).css('display', 'block');
    //         $('#default-tab').css('display', 'none');
    //         $('#' + localStorage.selectedTab + '-btn').css({
    //             'color': 'rgb(255, 255, 255)',
    //             'background': 'rgb(7, 60, 102)',
    //         });    
    //     }
    //     else{
    //         $('#building-sponsorship-btn').addClass('active');
    //         $('#building-sponsorship').css('display', 'block');
    //         $('#default-tab').css('display', 'none');
    //         $('#building-sponsorship-btn').css({
    //             'color': 'rgb(255, 255, 255)',
    //             'background': 'rgb(7, 60, 102)',
    //         });
    //     }
    // });

    $(document).on('click','.general-tab', function() {
        $('#building-sponsorship-btn').addClass('active');
        $('.building-sponsorship').css('display', 'block');
        $('#default-tab').css('display', 'none');
        $('#building-sponsorship-btn').css({
            'color': 'rgb(255, 255, 255)',
            'background': 'rgb(7, 60, 102)',
        });
    });
    $(document).on('click','.tution-tab', function() {
        $('#tuition-sponsorship-btn').addClass('active');
        $('.tuition-sponsorship').css('display', 'block');
        $('#default-tab').css('display', 'none');
        $('#tuition-sponsorship-btn').css({
            'color': 'rgb(255, 255, 255)',
            'background': 'rgb(7, 60, 102)',
        });
    });

    // $('.tution-tab').on('click', function() {
    //     if (localStorage.selectedTab !== undefined && localStorage.selectedTab !== null) {
    //         $('#' + localStorage.selectedTab + '-btn').addClass('active');
    //         $('#' + localStorage.selectedTab).css('display', 'block');
    //         $('#default-tab').css('display', 'none');
    //         $('#' + localStorage.selectedTab + '-btn').css({
    //             'color': 'rgb(255, 255, 255)',
    //             'background': 'rgb(7, 60, 102)',
    //         });
    //     } else {
    //         $('#tuition-sponsorship-btn').addClass('active');
    //         $('#tuition-sponsorship').css('display', 'block');
    //         $('#default-tab').css('display', 'none');
    //         $('#tuition-sponsorship-btn').css({
    //             'color': 'rgb(255, 255, 255)',
    //             'background': 'rgb(7, 60, 102)',
    //         });
    //     }
    // });
});
// modal jQuery ends here

// var button = document.getElementsByClassName('button-main'),
//     tabContent = document.getElementsByClassName('support-tab-content');

// function supportTabs(e, tabsButton) {
//     var i;
//     for (i = 0; i < button.length; i++) {
//         tabContent[i].style.display = 'none';
//         button[i].classList.remove('active');
//     }
//     document.getElementById(tabsButton).style.display = 'block';
//     e.currentTarget.classList.add('active');
//     localStorage.setItem('selectedTab', tabsButton);
// }




// working code 

// var button = document.getElementsByClassName('button-main'),
// tabContent = document.getElementsByClassName('support-tab-content');
    
// function supportTabs(e, tabsButton) {
//     var i;
//     for (i = 0; i < button.length; i++) {
//         tabContent[i].style.display = 'none';
//         button[i].classList.remove('active');
//     }
//     document.getElementById(tabsButton).style.display = 'block';
//     e.currentTarget.classList.add('active');
// }



if($(window).width() > 1209) {
    function supportTabs(e, tabsButton){
        var button = $('.button-main');
        var tabContent = $('.support-tab-content');
        var i;
        for(i=0; i<=button.length; i++) {
            $(tabContent[i]).css('display', 'none');
            $(button[i]).removeClass('active');
        }
        let mainId = '.' + tabsButton;
        $(mainId).css('display','block');
        $(e.currentTarget).addClass('active');
    }
} else {
    function supportTabs(e, tabsButton) {
        // let buttonChecker = tabsButton + '-btn';
        // $('.support-tab-content-button button').each(function(){
        //     if($(this).attr('id') === buttonChecker){
        //         if($(this).css('color') == 'rgb(255, 255, 255)'){
        //             alert('hi nadh ow areou');
        //             $(this).parent().find('.responsive-section .tab-content').css('display', 'none');
        //         } else {
        //             $(this).parent().find('.responsive-section .tab-content').css('display', 'block');
        //         }
        //     }
        // })
        $('.right-support-container .tab-content-container .support-tab-content').each(function(){
            if($(this).hasClass(tabsButton)) {
                let dynamicHTML = $(this).html();
                let mainHTML = `<div class="support-tab-content tab-content ${tabsButton}" style="display:block;">` + dynamicHTML + '</div>';
                let buttonChecker = tabsButton + '-btn';
                $('.support-tab-content-button button').each(function(){
                    if($(this).attr('id') === buttonChecker){
                        if($(this).parent().find('.responsive-section .tab-content').css('display') == 'block'){
                            $(this).parent().find('.responsive-section .tab-content').slideUp();
                        } else {
                            $('.responsive-section').html('');
                            $(this).parent().find('.responsive-section').html(mainHTML).hide();
                            $(this).parent().find('.responsive-section').slideDown();
                        }
                    }
                })
            }
        })
    }
}


// media modal starts from here
$(document).ready(function() {
    $(".shorts-video-cross-button").click(function() {
        $("#shorts-video-modal").fadeOut();
        $('body').css('overflow', 'auto')
    });
    // $(window).click(function(event) {
    //     if (event.target == document.getElementById("shorts-video-modal")) {
    //         $("#shorts-video-modal").fadeOut();
    //         $('body').css('overflow', 'auto')
    //     }
    // });
    $(".long-video-cross-button").click(function() {
        $("#long-video-modal").fadeOut();
        $('body').css('overflow', 'auto')
    });
    // $(window).click(function(event) {
    //     if (event.target == document.getElementById("long-video-modal")) {
    //         $("#long-video-modal").fadeOut();
    //         $('body').css('overflow', 'auto')
    //     }
    // });
    $(".gallery-cross-button").click(function() {
        $("#gallery-modal").fadeOut();
        $('body').css('overflow', 'auto')
    });
});


// triggering the shorts video modal on click of the short format video
function shortsModal(shortsVideoURL) {
    var shortsVideoMain = $(".shorts-video-main");
    shortsVideoMain.html(shortsVideoURL);
    $("#shorts-video-modal").css('display','block');
}

// triggering the long videos modal on click of the long format video
function longModal(longVideoURL) {
    var longVideoMain = $(".long-video-main");
    longVideoMain.html(longVideoURL);
    $("#long-video-modal").css('display','block');
}

// triggering the gallery pictures modal on click of the image
function galleryModal(galleryImageURL) {
    $('.gallery-main img').attr('src', galleryImageURL);
    $("#gallery-modal").css('display','block');
}

$(document).ready(function() {
    $("#open").click(function() {
        $(".main-navigation").addClass("active");
        $(".close-navigation-list").addClass("active");
        $(".overlay-on-navigation-active").addClass("overlay-active");
    });
    $(".close-navigation-list ").click(function() {
        $(".overlay-on-navigation-active").removeClass("overlay-active");
        $("body").removeClass("no-scroll");
    });
});


// media modal ends here



// document.getElementById("close-modal1").addEventListener("click", function() {
//     // Hide the video modal
//     document.getElementById("video-modal").style.display = "none";

//     // Pause the video when the modal is closed
//     var iframe = document.querySelector("#video-modal iframe");
//     iframe.src = "";
// });

// function changeVideo1(videoURL) {
//     var iframe = document.querySelector("#long-video-modal iframe");
//     iframe.src = videoURL;
    
//     // Show the video modal
//     document.getElementById("long-video-modal").style.display = "block";
// }

// document.getElementById("close-modal1").addEventListener("click", function() {
//     // Hide the video modal
//     document.getElementById("long-video-modal").style.display = "none";

//     // Pause the video when the modal is closed
//     var iframe = document.querySelector("#long-video-modal iframe");
//     iframe.src = "";
// });

// var button = document.getElementsByClassName('button-main'),
// tabContent = document.getElementsByClassName('support-tab-content');
    
