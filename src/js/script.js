
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
    //     $(".fv-animation").delay(2500).fadeOut('slow');//ローディング画面を1.5秒（1500ms）待機してからフェードアウト
    // });

// 2
    // var splash_text = $.cookie('accessdate'); //キーが入っていれば年月日を取得
    // var myD = new Date();//日付データを取得
    // var myYear = String(myD.getFullYear());//年
    // var myMonth = String(myD.getMonth() + 1);//月
    // var myDate = String(myD.getDate());//日

    // if (splash_text != myYear + myMonth + myDate) {//cookieデータとアクセスした日付を比較↓
    //     $(".fv-animation").css("display", "block");//１回目はローディングを表示
    //     setTimeout(function () {
    //         $(".fv-animation").delay(2500).fadeOut('slow');//ローディング画面を1.5秒（1500ms）待機してからフェードアウト
    //     });
    // }else{
    //     $(".fv-animation").css("display", "none");//同日2回目のアクセスでローディング画面非表示
    // }

// 3
    var splash_text = $.cookie('accessdate'); // Cookieからアクセス日付を取得
    var myD = new Date(); // 現在の日付データを取得
    var myYear = myD.getFullYear().toString(); // 年を文字列として取得
    var myMonth = (myD.getMonth() + 1).toString().padStart(2, '0'); // 月を文字列として取得（2桁で表示）
    var myDate = myD.getDate().toString().padStart(2, '0'); // 日を文字列として取得（2桁で表示）
    var currentDate = myYear + myMonth + myDate; // 現在の年月日を結合

    if (splash_text !== currentDate) { // Cookieの値と現在の年月日を比較
        $(".fv-animation").css("display", "block"); // ローディングを表示
        setTimeout(function () {
            $(".fv-animation").delay(2500).fadeOut('slow'); // ローディング画面を1.5秒待機してからフェードアウト
        }, 0); // ゼロミリ秒遅延で実行（次のイベントループまで待たない）
    } else {
        $(".fv-animation").css("display", "none"); // 同日2回目のアクセスでローディング画面非表示
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
    //     $(".fv-animation").css("display", "block"); // ローディングを表示

    //     setTimeout(function () {
    //         $(".fv-animation").delay(2500).fadeOut('slow'); // ローディング画面を1.5秒待機してからフェードアウト
    //     }, 0); // ゼロミリ秒遅延で実行（次のイベントループまで待たない）
    // } else {
    //     $(".fv-animation").css("display", "none"); // 同日2回目のアクセスでローディング画面非表示
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
// ----------------------------------------
// タブメニュー　キャンペーン
// ----------------------------------------
// 自分で追加した部分（初めにallを表示させるため）
$(window).on('load', function () {
    // 関連するコンテンツを表示する
    $('#all').addClass("is-active");
    var hashName = location.hash;
    GethashID(hashName);
});

// 最初のタブをアクティブにする
$('#all').addClass("active");

// ここまで自分で追加した部分

//任意のタブにURLからリンクするための設定
function GethashID (hashIDName){
	if(hashIDName){
		//タブ設定
		$('.tabs li').find('a').each(function() { //タブ内のaタグ全てを取得
			var idName = $(this).attr('href'); //タブ内のaタグのリンク名（例）#lunchの値を取得	
			if(idName == hashIDName){ //リンク元の指定されたURLのハッシュタグ（例）http://example.com/#lunch←この#の値とタブ内のリンク名（例）#lunchが同じかをチェック
				var parentElm = $(this).parent(); //タブ内のaタグの親要素（li）を取得
				$('.tabs li').removeClass("active"); //タブ内のliについているactiveクラスを取り除き
				$(parentElm).addClass("active"); //リンク元の指定されたURLのハッシュタグとタブ内のリンク名が同じであれば、liにactiveクラスを追加
				//表示させるエリア設定
				$(".tab-area").removeClass("is-active"); //もともとついているis-activeクラスを取り除き
				$(hashIDName).addClass("is-active"); //表示させたいエリアのタブリンク名をクリックしたら、表示エリアにis-activeクラスを追加	
			}
		});
	}
}

//タブをクリックしたら
$('.tabs a').on('click', function() {
	var idName = $(this).attr('href'); //タブ内のリンク名を取得	
	GethashID (idName);//設定したタブの読み込みと
	return false;//aタグを無効にする
});


// 上記の動きをページが読み込まれたらすぐに動かす
$(window).on('load', function () {
    $('.tabs li:first-of-type').addClass("active"); //最初のliにactiveクラスを追加
    $('.tab-area:first-of-type').addClass("is-active"); //最初の.areaにis-activeクラスを追加
	var hashName = location.hash; //リンク元の指定されたURLのハッシュタグを取得
	GethashID (hashName);//設定したタブの読み込み
});


$(".gallery__item img").click(function() {
        $(".modal-window-image").html($(this).prop('outerHTML'));
        $(".modal-window-image").fadeIn(100);
    });
    $(".modal-window-image, .modal-window-image img").click(function() {
        $(".modal-window-image").fadeOut(100);
    });
});

// ----------------------------------------
// タブメニュー インフォメーション
// ----------------------------------------
// 自分で追加した部分（初めにallを表示させるため）
// $(window).on('load', function () {
//     // 関連するコンテンツを表示する
//     $('#license-course').addClass("is-active");
//     var hashName = location.hash;
//     GethashID(hashName);
// });

// 最初のタブをアクティブにする
// $('#license-course').addClass("active");

// ここまで自分で追加した部分

//任意のタブにURLからリンクするための設定
function GethashID (hashIDName){
	if(hashIDName){
		//タブ設定
		$('.tabs-information li').find('a').each(function() { //タブ内のaタグ全てを取得
			var idName = $(this).attr('href'); //タブ内のaタグのリンク名（例）#lunchの値を取得	
			if(idName == hashIDName){ //リンク元の指定されたURLのハッシュタグ（例）http://example.com/#lunch←この#の値とタブ内のリンク名（例）#lunchが同じかをチェック
				var parentElm = $(this).parent(); //タブ内のaタグの親要素（li）を取得
				$('.tabs-information li').removeClass("active"); //タブ内のliについているactiveクラスを取り除き
				$(parentElm).addClass("active"); //リンク元の指定されたURLのハッシュタグとタブ内のリンク名が同じであれば、liにactiveクラスを追加
				//表示させるエリア設定
				$(".tab-information-area").removeClass("is-active"); //もともとついているis-activeクラスを取り除き
				$(hashIDName).addClass("is-active"); //表示させたいエリアのタブリンク名をクリックしたら、表示エリアにis-activeクラスを追加	
			}
		});
	}
}

//タブをクリックしたら
$('.tabs-information a').on('click', function() {
	var idName = $(this).attr('href'); //タブ内のリンク名を取得	
	GethashID (idName);//設定したタブの読み込みと
	return false;//aタグを無効にする
});


// 上記の動きをページが読み込まれたらすぐに動かす
$(window).on('load', function () {
    $('.tabs-information li:first-of-type').addClass("active"); //最初のliにactiveクラスを追加
    $('.tab-information-area:first-of-type').addClass("is-active"); //最初の.areaにis-activeクラスを追加
	var hashName = location.hash; //リンク元の指定されたURLのハッシュタグを取得
	GethashID (hashName);//設定したタブの読み込み
});


$(".gallery__item img").click(function() {
        $(".modal-window-image").html($(this).prop('outerHTML'));
        $(".modal-window-image").fadeIn(100);
    });
    $(".modal-window-image, .modal-window-image img").click(function() {
        $(".modal-window-image").fadeOut(100);
});

jQuery('.faq-item__question-wrapper').click(function() {
    jQuery(this).next().slideToggle();
    jQuery(this).children('.faq-item__icon').toggleClass( 'is-open' );
});