$(document).ready(function() { 
    
    var swiper = new Swiper('.swiper-main', {
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: '.fa-chevron-right',
        prevEl: '.fa-chevron-left',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    // breakpoints: {
    //     2560: {
    //         slidesPerView: 5
    //     },
    //     1440: {
    //         slidesPerView: 4
    //     },
    //     767: {
    //         slidesPerView: 3
    //     },
    //     414: {
    //         slidesPerView: 2
    //     }
    // }
    });
    
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === !1) {
                event.preventDefault();
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, !1)
    });
    
    $('[data-fancybox="gallery"]').fancybox();
    
    $('.eq-height').matchHeight();

    $('a.page-scroll').bind('click',function(event){
        var $anchor = $(this);
        $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top - 0
        }, 1000,'swing');
        // Outras Animações
        // linear, swing, easeInQuad, easeInCubic, easeInQuart, easeInQuint, easeInSine, easeInExpo, easeInCirc, easeInElastic, easeInBack, easeInBounce, easeOutQuad, easeOutCubic, easeOutQuart, easeOutQuint, easeOutSine, easeOutExpo, easeOutCirc, easeOutElastic, easeOutBack, easeOutBounce, easeInOutQuad, easeInOutCubic, easeInOutQuart, easeInOutQuint, easeInOutSine, easeInOutExpo, easeInOutCirc, easeInOutElastic, easeInOutBack, easeInOutBounce
    });

    // fechar menu mobile
    $(document).on('click','.nav-link',function(e) {
        $("div#navbarSupportedContent").collapse('hide');
    });
    
    // menu flutuante
    // $(window).scroll(function () { 
    //     if ($(this).scrollTop() > 177) { 
    //         $( '.menu-fixo' ).css( "display", "block");
    //     } else { 
    //         $( '.menu-fixo' ).css( "display", "none" ); 
    //     } 
    // }); 

    //INI - Integrando block gallery com fancybox
    $('.blocks-gallery-item').click(function() {
        var idx_w = $(".blocks-gallery-item").index(this) // indice do elemento pai
        var idx = $(".blocks-gallery-item:eq('" + idx_w + "') figure img").index(this)// indice da imagem
        
        // obtem path da imgem em cada src do elemento
        var src = $(".blocks-gallery-item:eq('" + idx_w + "') figure img").eq(idx).attr('src')

        // verifica se existe pela quantidade
        var elem = $(".blocks-gallery-item:eq('" + idx_w + "') a").length
        if (elem == 0) {
            $(".blocks-gallery-item:eq('" + idx_w + "') figure").wrap("<a href='" + src + "'data-fancybox='gallery'></a>");
        }
    });

    var elem2 = $(".blocks-gallery-item a").length
    if (elem2 == 0) {
        for (let x = 0; x < $(".blocks-gallery-item figure").length; x++) {
            let src = $(".blocks-gallery-item:eq('" + x + "') figure img").attr('src')
            $(".blocks-gallery-item:eq('" + x + "') figure").wrap("<a href='" + src + "'data-fancybox='gallery'></a>");
            console.log(x + '-' + src)
        }
    }

});

