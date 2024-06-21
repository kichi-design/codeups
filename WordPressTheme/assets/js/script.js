"use strict";

jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる
  // ----------------------------------------
  //ドロワーメニュー
  // ----------------------------------------

  $(".js-hamburger").click(function () {
    if ($(".js-hamburger").hasClass("is-open")) {
      $(".js-drawer-menu").fadeOut();
      $(".js-hamburger").removeClass("is-open");
      $("body").removeClass("is-open");
    } else {
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
      prevEl: ".swiper-button-prev"
    },
    loop: true,
    loopAdditionalSlides: 1,
    spaceBetween: 24,
    slidesPerView: "1",
    width: 280,
    speed: 3000,
    autoplay: {
      delay: 500,
      disableOnInteraction: false
    },
    breakpoints: {
      //ブレークポイントの設定 小さい順に設定する！！
      768: {
        slidesPerView: "3.5",
        spaceBetween: 40,
        width: 1265
      },
      1920: {
        slidesPerView: "4",
        spaceBetween: 40,
        // width: 1440,
        width: 1825
      }
    }
  });
  // ----------------------------------------
  // メインビュー　スライダー
  // ----------------------------------------
  var swiper = new Swiper(".js-fv-swiper", {
    loop: true,
    effect: 'fade',
    autoplay: {
      delay: 4000,
      disableOnInteraction: false
    },
    speed: 2000
  });

  // ----------------------------------------
  // メインビューアニメーションの表示設定
  // ----------------------------------------

// Cookieをセットする関数
function setCookie(name, value, days) {
  let expires = "";
  if (days) {
    const date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

// Cookieを取得する関数
function getCookie(name) {
  const nameEQ = name + "=";
  const ca = document.cookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) === ' ') c = c.substring(1);
    if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length);
  }
  return null;
}

// アニメーションの表示設定
let splashText = getCookie('accessdate');

if (!splashText) {
  // Cookieが存在しない場合（初回アクセス）
  const myD = new Date();
  const myYear = myD.getFullYear().toString();
  const myMonth = (myD.getMonth() + 1).toString().padStart(2, '0');
  const myDate = myD.getDate().toString().padStart(2, '0');
  const currentDate = myYear + myMonth + myDate;

  // Cookieにアクセス日付をセット（1日間有効）
  setCookie('accessdate', currentDate, 1);

  // ローディングを表示
  const animationElement = document.querySelector(".fv-animation");
  if (animationElement) {
    animationElement.style.display = "block";

    setTimeout(function() {
      animationElement.style.opacity = 0;
      animationElement.style.transition = "opacity 1.5s";

      // アニメーション終了後に要素を非表示にする
      setTimeout(() => {
        animationElement.style.display = "none";
      }, 1500);
    }, 3000); // 1.5秒遅延で実行
  }
} else {
  // Cookieが存在する場合はローディング画面非表示
  document.querySelector(".fv-animation").style.display = "none";
}

  // ----------------------------------------
  // ページトップのボタン
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

  // ボタンをクリックしたらスクロールして上に戻る
  topBtn.click(function () {
    $('body,html').animate({
      scrollTop: 0
    }, 0, 'swing');
    // }, 300, 'swing');
    return false;
  });

  // ----------------------------------------
  // 背景色の後に画像やテキストが表示されるエフェクト
  // ----------------------------------------
  //要素の取得とスピードの設定
  var box = $('.colorbox'),
    speed = 700;

  //.colorboxの付いた全ての要素に対して下記の処理を行う
  box.each(function () {
    $(this).append('<div class="color"></div>');
    var color = $(this).find($('.color')),
      image = $(this).find('img');
    var counter = 0;
    image.css('opacity', '0');
    color.css('width', '0%');

    //inviewを使って背景色が画面に現れたら処理をする
    color.on('inview', function () {
      if (counter == 0) {
        $(this).delay(200).animate({
          'width': '100%'
        }, speed, function () {
          image.css('opacity', '1');
          $(this).css({
            'left': '0',
            'right': 'auto'
          });
          $(this).animate({
            'width': '0%'
          }, speed);
        });
        counter = 1;
      }
    });
  });

  // ----------------------------------------
  // モーダル
  // ----------------------------------------

  $(".gallery__item img").click(function () {
    $(".modal-window-image").html($(this).prop('outerHTML'));
    $(".modal-window-image").fadeIn(100);
  });
  $(".modal-window-image, .modal-window-image img").click(function () {
    $(".modal-window-image").fadeOut(100);
  });

  // ----------------------------------------
  // アコーディオン
  // ----------------------------------------
  jQuery('.faq-item__question-wrapper').click(function () {
    jQuery(this).next().slideToggle();
    jQuery(this).children('.faq-item__icon').toggleClass('is-open');
  });

  // ----------------------------------------
  // formエラー
  // ----------------------------------------

  $(document).ready(function () {
    // エラーメッセージ要素を取得
    var errorMessageDiv = $('.page-contact__form-error.js-error');
  
    // フォームの送信ボタンクリックイベントにバインド
    $('.wpcf7-form').on('submit', function (e) {
      e.preventDefault(); // フォームの自動送信を防ぐ
  
      var hasError = false; // エラーの有無を追跡するフラグ
      var form = $(this);
  
      // フォーム内のすべての必須入力フィールドをチェック
      form.find('.wpcf7-form-control-wrap').each(function () {
        var input = $(this).find('input, textarea, select');
        var type = input.attr('type');
  
        // チェックボックスのチェック
        if (type === 'checkbox') {
          var name = input.attr('name');
          // 同じname属性を持つチェックボックスが一つも選択されていないかチェック
          if ($('input[name="' + name + '"]:checked').length === 0) {
            hasError = true;
            // 同じグループのチェックボックスにエラースタイルを適用
            $('input[name="' + name + '"]').next('span').css({
              'background-color': 'rgba(201, 72, 0, 0.2)',
              'border': '1px solid #C94800'
            });
          } else {
            $('input[name="' + name + '"]').next('span').css({
              'background-color': '',
              'border': ''
            });
          }
        }
        // その他のフィールドのチェック
        else if (input.val() === '') {
          hasError = true;
          input.css({
            'background-color': 'rgba(201, 72, 0, 0.2)',
            'border': '1px solid #C94800'
          });
        } else {
          input.css({
            'background-color': '',
            'border': ''
          });
        }
      });
  
      // エラーがある場合、エラーメッセージを表示し、その位置までスクロール
      if (hasError) {
        errorMessageDiv.show();
        errorMessageDiv[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
      } else {
        errorMessageDiv.hide();
        form.off('submit').submit(); // フォームの送信を再試行
      }
    });
  });
    
  // ----------------------------------------
  // インフォメーション タブメニュー フッターリンクからタブ先へ遷移
  // ----------------------------------------
  $(function () {
    // URLからクエリパラメータを取得
    var urlParams = new URLSearchParams(window.location.search);
    var tabParam = urlParams.get('id');

    // ページ内のタブとメニューの要素を取得
    var $tabs = $('.tabs-information__item');
    var $tabContents = $('.tab-information-area');

    // クエリパラメータがある場合
    if (tabParam) {
        // タブの非表示・非アクティブ化
        $tabs.removeClass('is-active');
        $tabContents.removeClass('is-active');

        // クエリパラメータに対応するタブが存在するか確認
        var $matchingTab = $tabs.has('a[href="#' + tabParam + '"]');
        if ($matchingTab.length > 0) {
            // タブをアクティブにする
            $matchingTab.addClass('is-active');

            // クエリパラメータに対応するタブのコンテンツを表示
            $('#' + tabParam).addClass('is-active');

            // スクロール処理を追加
            $('html, body').animate({
                scrollTop: $('#' + tabParam).offset().top - 200 // ヘッダーなどの高さ調整が必要な場合は値を変更
            }, 1000); // スクロールにかかる時間（ミリ秒）
        }
    } else {
        // クエリパラメータがない場合はデフォルトの処理を行う
        // ここでは最初のタブを表示
        $tabs.first().addClass('is-active');
        $tabContents.first().addClass('is-active');
    }

    // タブをクリックしたときの処理
    $tabs.find('a').on('click', function (event) {
        event.preventDefault();
        var tabId = $(this).attr('href').substring(1);

        // タブの非表示・非アクティブ化
        $tabs.removeClass('is-active');
        $tabContents.removeClass('is-active');

        // クリックされたタブをアクティブにする
        $(this).parent().addClass('is-active');

        // クリックされたタブに対応するコンテンツを表示
        $('#' + tabId).addClass('is-active');

        // クリックされたタブのコンテンツへスムーズスクロール
        $('html, body').animate({
            scrollTop: $('#' + tabId).offset().top - 250 // ヘッダーなどの高さ調整が必要な場合は値を変更
        }, 300); // スクロールにかかる時間（ミリ秒）
    });
});

// ----------------------------------------
// price 特定のタブの位置までスクロールする機能
// ----------------------------------------
jQuery(document).ready(function($) {
  // スクロール関数定義
  function scrollToSection() {
      var hash = window.location.hash; // 現在のURLからハッシュ値を取得
      var headerHeight = $('.header').outerHeight(); // ヘッダーの高さを取得

      // ハッシュ値が存在し、対象の要素が存在する場合のみスクロールを実行
      if (hash && $(hash).length) {
          $('html, body').animate({
              scrollTop: $(hash).offset().top - headerHeight // ヘッダーの高さを考慮したスクロール位置へ移動
          }, 1000);
      }
  }

  // ページ読み込み時にスクロールを実行
  scrollToSection();

  // ハッシュ値が変更されたときにスクロールを実行
  $(window).on('hashchange', function() {
      scrollToSection();
  });
});







});



