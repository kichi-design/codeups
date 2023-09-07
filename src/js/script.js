
jQuery(function ($) { // この中であればWordpressでも「$」が使用可能になる
// ----------------------------------------
//ドロワーメニュー
// ----------------------------------------

        $(".js-hamburger").click(function () {
        if($(".js-hamburger").hasClass("is-open")){
            $(".js-drawer-menu").fadeOut();
            $(".js-hamburger").removeClass("is-open");
            $("body").removeClass("is-open");
        }else{
            $(".js-drawer-menu").fadeIn();
            $(".js-hamburger").addClass("is-open");
        // この記述でドロワーメニューを開いた時に背景画像がスクロールしないようになる
            $("body").addClass("is-open");
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
            loopAdditionalSlides: 1,
            spaceBetween: 24,
            slidesPerView: "1",
            width: 280,
            
            speed: 3000,
            autoplay: {
            delay: 2000,
            disableOnInteraction: false,
            },
            breakpoints: { //ブレークポイントの設定 小さい順に設定する！！
            768: {
                slidesPerView: "3.5",
                spaceBetween: 40,
                width: 1265,

            },
            1920: {
                slidesPerView: "4",
                spaceBetween: 40,
                // width: 1440,
                width: 1825,
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
        delay: 4000,
        disableOnInteraction: false,
        },
        speed: 2000,
    });

// ----------------------------------------
// メインビューアニメーションの表示設定
// ----------------------------------------
// １
    // $(window).on('load',function(){
    //     $(".fv-anim").delay(2500).fadeOut('slow');//ローディング画面を1.5秒（1500ms）待機してからフェードアウト
    // });

// 2
    // var splash_text = $.cookie('accessdate'); //キーが入っていれば年月日を取得
    // var myD = new Date();//日付データを取得
    // var myYear = String(myD.getFullYear());//年
    // var myMonth = String(myD.getMonth() + 1);//月
    // var myDate = String(myD.getDate());//日

    // if (splash_text != myYear + myMonth + myDate) {//cookieデータとアクセスした日付を比較↓
    //     $(".fv-anim").css("display", "block");//１回目はローディングを表示
    //     setTimeout(function () {
    //         $(".fv-anim").delay(2500).fadeOut('slow');//ローディング画面を1.5秒（1500ms）待機してからフェードアウト
    //     });
    // }else{
    //     $(".fv-anim").css("display", "none");//同日2回目のアクセスでローディング画面非表示
    // }

// 3
    var splash_text = $.cookie('accessdate'); // Cookieからアクセス日付を取得
    var myD = new Date(); // 現在の日付データを取得
    var myYear = myD.getFullYear().toString(); // 年を文字列として取得
    var myMonth = (myD.getMonth() + 1).toString().padStart(2, '0'); // 月を文字列として取得（2桁で表示）
    var myDate = myD.getDate().toString().padStart(2, '0'); // 日を文字列として取得（2桁で表示）
    var currentDate = myYear + myMonth + myDate; // 現在の年月日を結合

    if (splash_text !== currentDate) { // Cookieの値と現在の年月日を比較
        $(".fv-anim").css("display", "block"); // ローディングを表示
        setTimeout(function () {
            $(".fv-anim").delay(2500).fadeOut('slow'); // ローディング画面を1.5秒待機してからフェードアウト
        }, 0); // ゼロミリ秒遅延で実行（次のイベントループまで待たない）
    } else {
        $(".fv-anim").css("display", "none"); // 同日2回目のアクセスでローディング画面非表示
    }

// 4
    // var splash_text = $.cookie('accessdate'); // Cookieからアクセス日付を取得

    // if (!splash_text) { // Cookieが存在しない場合（初回アクセス）
    //     var myD = new Date(); // 現在の日付データを取得
    //     var myYear = myD.getFullYear().toString(); // 年を文字列として取得
    //     var myMonth = (myD.getMonth() + 1).toString().padStart(2, '0'); // 月を文字列として取得（2桁で表示）
    //     var myDate = myD.getDate().toString().padStart(2, '0'); // 日を文字列として取得（2桁で表示）
    //     var currentDate = myYear + myMonth + myDate; // 現在の年月日を結合

    //     $.cookie('accessdate', currentDate); // Cookieにアクセス日付をセット
    //     $(".fv-anim").css("display", "block"); // ローディングを表示

    //     setTimeout(function () {
    //         $(".fv-anim").delay(2500).fadeOut('slow'); // ローディング画面を1.5秒待機してからフェードアウト
    //     }, 0); // ゼロミリ秒遅延で実行（次のイベントループまで待たない）
    // } else {
    //     $(".fv-anim").css("display", "none"); // 同日2回目のアクセスでローディング画面非表示
    // }

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
