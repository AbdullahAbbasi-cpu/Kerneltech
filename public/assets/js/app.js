
(function () {
    const header = select(".navigation-container")
    const body = select("body")
    body.style.setProperty("--header-height", header.offsetHeight + 'px')
    const sliderVisualViewer = select(".slider-visual-status")
    const bannerSlider = jQuery("#banner-slider")
    bannerSlider.on('initialized.owl.carousel', manageSliderNavigationState)
    bannerSlider.owlCarousel({
        loop: true,
        autoplay: true,
        margin: 10,
        nav: false,
        items: 1,
        mouseDrag:false,
        touchDrag:false,
        dots: false,
        smartSpeed: 1500,
        autoplayTimeout: 6000,
        animateOut: 'fadeOut'
    })
    if($('.owl-item .item h1').hasClass('slide-left')){
        $('.owl-item .item h1').removeClass('slide-left')
    }
    if($('.owl-item .item p').hasClass('slide-left1')){
        $('.owl-item .item p').removeClass('slide-left1')
    }
    if($('.owl-item .item a.bg-orange').hasClass('slide-left2')){
        $('.owl-item .item a.bg-orange').removeClass('slide-left2')
    }
    $('.owl-item.active .banner-image img').addClass('zoom')
    setTimeout(function(){
        $(document).on('click', '.banner-slider-navigation button', function(){
            $('.owl-item .item h1').removeClass('slide-left');
            $('.owl-item.active .item h1').addClass('slide-left');
            $('.owl-item .item p').removeClass('slide-left1');
            $('.owl-item.active .item p').addClass('slide-left1');
            $('.owl-item .item a.bg-orange').removeClass('slide-left2');
            $('.owl-item.active .item a.bg-orange').addClass('slide-left2');
            $('.owl-item .item .banner-image img').removeClass('zoom');
            $('.owl-item.active .banner-image img').addClass('zoom');
        })
    },1000)
    jQuery(window).on("load", () => {
        jQuery('body').removeClass("opacity-0")
    })

    jQuery(".close-announcement-bar").on("click", () => {
        jQuery(".announcement-bar-javlin.header-announcment").slideUp()
    })
    var autoplayPrevNext = true;
    jQuery(".arrow-up.banner-slider-nav-button").on("click", () => {
        let counterUpdated = parseInt($('input.counterUpdater').val()) - 1;
        if(counterUpdated == 0) {
            $('input.counterUpdater').val($('input[name="totalSlides"]').val());
        } else {
            $('input.counterUpdater').val(counterUpdated);
        }
        autoplayPrevNext = false;
        bannerSlider.trigger('prev.owl.carousel');
        bannerSlider.trigger('stop.owl.autoplay');
        setTimeout(() => {
            bannerSlider.trigger('play.owl.autoplay');
        }, 2000);
    })
    jQuery(".arrow-down.banner-slider-nav-button").on("click", () => {
        let counterUpdated = parseInt($('input.counterUpdater').val()) + 1;
        if(counterUpdated > $('input[name="totalSlides"]').val()){
            $('input.counterUpdater').val(1);
        } else {
            $('input.counterUpdater').val(counterUpdated);
        }
        autoplayPrevNext = false;
        bannerSlider.trigger('next.owl.carousel')
        bannerSlider.trigger('stop.owl.autoplay');
        setTimeout(() => {
            bannerSlider.trigger('play.owl.autoplay');
        }, 2000);
    })

    jQuery(".main-navigation-toggle,.close-navigation-list,.close-navigation-list").on("click", function () {
        jQuery(this).toggleClass("active")
        jQuery('.main-navigation').toggleClass("active")
        jQuery('body').toggleClass("navigation-active")
        jQuery('body').toggleClass("no-scroll")
    })

    bannerSlider.on('changed.owl.carousel', manageSliderNavigationState)
    function manageSliderNavigationState(event) {

        // working for autoplay
        if(autoplayPrevNext == true) {
            let something = parseInt($('input.counterUpdater').val()) + 1;
            if(something > $('input[name="totalSlides"]').val()){
                $('input.counterUpdater').val(1);
            } else {
                $('input.counterUpdater').val(something);
            }
        }
        autoplayPrevNext = true;

        $('input[name="totalSlides"]').val(event.item.count);
        let another = $('input.counterUpdater').val();
        $('.slider-slide-number').text(another);
        $('.slider-slides-number').text(event.item.count);
        sliderVisualViewer.style.setProperty("--blip-height", `${((another) / event.item.count)}`)
    }
    window.addEventListener("resize", () => {
        body.style.setProperty("--header-height", header.offsetHeight + 'px')
    })

    function select(selector) {
        return document.querySelector(selector)
    }
    function selectAll(selector) {
        return document.querySelectorAll(selector)
    }
    const subMenus = selectAll(".item-has-sub-menu")

    subMenus.forEach(item => {
        item.addEventListener("click", () => {
            item.classList.toggle("expanded")
        })
    })
    subMenus.closeAll = () => {
        subMenus.forEach(item => {
            if (!item.classList.contains("expanded")) return
            item.classList.remove("expanded")
        })
    }
    body.addEventListener("click", e => {
        if (!e.target.classList.contains("item-has-sub-menu")) {
            subMenus.closeAll()
        }
    })


    connectWidths()
    function connectWidths() {
        const trackedWidths = selectAll('[data-track-width]')
        trackWidths()
        window.addEventListener("resize", trackWidths)
        function trackWidths() {
            trackedWidths.forEach(item => {
                let itemWidth = item.offsetWidth + "px"
                let id = item.getAttribute('data-track-width')
                let appliedElements = selectAll(`[data-get-width="${id}"]`)
                appliedElements.forEach(childItem => {
                    childItem.style.width = itemWidth
                })
            });
        }
    }

})()

jQuery(document).ready(function(){
    $(document).on('click', '.footer-support', function(e){
        e.preventDefault();
        $('.support-us-button').trigger('click');
        $('.close-navigation-list').trigger('click');
    })
})
// support modal carousel
jQuery('.responsive-support-modal-gallery').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    // autoplay:true,
    navText: [`<span class="d-flex align-c just-c support-modal-previous-button">
    <svg xmlns=http://www.w3.org/2000/svg width=22 height=22 viewBox="0 0 22 22" fill=none>
    <path d="M11.052 13.829L12.466 15.243L16.71 11L12.467 6.75696L11.053 8.17196L12.88 9.99996H5.343V12H12.88L11.052 13.829Z" fill=#E76C13></path>
    <path fill-rule=evenodd clip-rule=evenodd d="M18.778 18.778C23.074 14.482 23.074 7.518 18.778 3.222C14.482 -1.074 7.518 -1.074 3.222 3.222C-1.074 7.518 -1.074 14.482 3.222 18.778C7.518 23.074 14.482 23.074 18.778 18.778ZM17.364 17.364C18.1997 16.5283 18.8627 15.5361 19.315 14.4442C19.7673 13.3522 20.0001 12.1819 20.0001 11C20.0001 9.8181 19.7673 8.64777 19.315 7.55583C18.8627 6.46389 18.1997 5.47173 17.364 4.636C16.5283 3.80027 15.5361 3.13733 14.4442 2.68503C13.3522 2.23274 12.1819 1.99994 11 1.99994C9.8181 1.99994 8.64777 2.23274 7.55583 2.68503C6.46389 3.13733 5.47173 3.80027 4.636 4.636C2.94816 6.32384 1.99994 8.61304 1.99994 11C1.99994 13.387 2.94816 15.6762 4.636 17.364C6.32384 19.0518 8.61304 20.0001 11 20.0001C13.387 20.0001 15.6762 19.0518 17.364 17.364Z" fill=#E76C13></path>
    </svg>
    </span>`, `<span class="d-flex align-c just-c">
    <svg xmlns=http://www.w3.org/2000/svg width=22 height=22 viewBox="0 0 22 22" fill=none>
    <path d="M11.052 13.829L12.466 15.243L16.71 11L12.467 6.75696L11.053 8.17196L12.88 9.99996H5.343V12H12.88L11.052 13.829Z" fill=#E76C13></path>
    <path fill-rule=evenodd clip-rule=evenodd d="M18.778 18.778C23.074 14.482 23.074 7.518 18.778 3.222C14.482 -1.074 7.518 -1.074 3.222 3.222C-1.074 7.518 -1.074 14.482 3.222 18.778C7.518 23.074 14.482 23.074 18.778 18.778ZM17.364 17.364C18.1997 16.5283 18.8627 15.5361 19.315 14.4442C19.7673 13.3522 20.0001 12.1819 20.0001 11C20.0001 9.8181 19.7673 8.64777 19.315 7.55583C18.8627 6.46389 18.1997 5.47173 17.364 4.636C16.5283 3.80027 15.5361 3.13733 14.4442 2.68503C13.3522 2.23274 12.1819 1.99994 11 1.99994C9.8181 1.99994 8.64777 2.23274 7.55583 2.68503C6.46389 3.13733 5.47173 3.80027 4.636 4.636C2.94816 6.32384 1.99994 8.61304 1.99994 11C1.99994 13.387 2.94816 15.6762 4.636 17.364C6.32384 19.0518 8.61304 20.0001 11 20.0001C13.387 20.0001 15.6762 19.0518 17.364 17.364Z" fill=#E76C13></path>
    </svg>
    </span>`],
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})


