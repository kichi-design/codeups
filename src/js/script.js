
jQuery(function ($) { // この中であればWordpressでも「$」が使用可能になる
// ----------------------------------------
//ドロワーメニュー
// ----------------------------------------

        $(".js-hamburger").click(function () {
        if($(".js-hamburger").hasClass("is-open")){
            $(".js-drawer-menu").fadeOut();
            $(".js-hamburger").removeClass("is-open");
        }else{
            $(".js-drawer-menu").fadeIn();
            $(".js-hamburger").addClass("is-open");
        // この記述でドロワーメニューを開いた時に背景画像がスクロールしないようになる
            $("body").toggleClass("is-open");
        }
        });
// ----------------------------------------
// キャンペーン　スライダー
// ----------------------------------------
        var swiper = new Swiper(".js-campaign-slider", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            
            loop: true,
            spaceBetween: 24,
            slidesPerView: "1",
            width: 280,
            
            speed: 2000,
            loopAdditionalSlides: 2,
            autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            },
            breakpoints: { //ブレークポイントの設定 小さい順に設定する！！
            768: {
                slidesPerView: "3.5",
                spaceBetween: 40,
                width: 1260,
                width: 1265.5,
                initialSlide: 0,

            },
            1920: {
                slidesPerView: "4",
                spaceBetween: 40,
                width: 1825,
                initialSlide: 0,
            },
            },
            });
// ----------------------------------------
// メインビュー　スライダー
// ----------------------------------------
    var swiper = new Swiper(".js-fv-swiper", {
        loop: true,
        effect: 'fade',
        autoplay: {
        delay: 2000,
        disableOnInteraction: false,
        },
        speed: 2000,
    });
// ----------------------------------------
// ボタンの表示設定
// ----------------------------------------
    var topBtn = $('.pagetop');
    topBtn.hide();

    if (window.matchMedia('(max-width: 767px)').matches) {
        //スマホ処理
        $(window).scroll(function () {
        if ($(this).scrollTop() > 770) {
            // 指定px以上のスクロールでボタンを表示
            topBtn.fadeIn();
        } else {
            // 画面が指定pxより上ならボタンを非表示
            topBtn.fadeOut();
        }
        });

    } else if (window.matchMedia('(min-width:768px)').matches) {
        //PC処理
            // ボタンの表示設定 pc
        $(window).scroll(function () {
        if ($(this).scrollTop() > 850) {
            // 指定px以上のスクロールでボタンを表示
            topBtn.fadeIn();
        } else {
            // 画面が指定pxより上ならボタンを非表示
            topBtn.fadeOut();
        }
        });
    }

// ----------------------------------------
// ボタンをクリックしたらスクロールして上に戻る
// ----------------------------------------
    topBtn.click(function () {
        $('body,html').animate({
        scrollTop: 0
        }, 300, 'swing');
        return false;
    });

// ----------------------------------------
// 背景色の後に画像やテキストが表示されるエフェクト
// ----------------------------------------
    //要素の取得とスピードの設定
    var box = $('.colorbox'),
    speed = 700;

    //.colorboxの付いた全ての要素に対して下記の処理を行う
    box.each(function(){
    $(this).append('<div class="color"></div>')
    var color = $(this).find($('.color')),
    image = $(this).find('img');
    var counter = 0;

    image.css('opacity','0');
    color.css('width','0%');

    //inviewを使って背景色が画面に現れたら処理をする
    color.on('inview', function(){
        if(counter == 0){
            $(this).delay(200).animate({'width':'100%'},speed,function(){
                image.css('opacity','1');
                $(this).css({'left':'0' , 'right':'auto'});
                $(this).animate({'width':'0%'},speed);
                })
            counter = 1;
        }
    });
    });

});
