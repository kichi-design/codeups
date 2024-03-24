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

  var splash_text = $.cookie('accessdate'); // Cookieからアクセス日付を取得

  if (!splash_text) {
    // Cookieが存在しない場合（初回アクセス）
    var myD = new Date(); // 現在の日付データを取得
    var myYear = myD.getFullYear().toString(); // 年を文字列として取得
    var myMonth = (myD.getMonth() + 1).toString().padStart(2, '0'); // 月を文字列として取得（2桁で表示）
    var myDate = myD.getDate().toString().padStart(2, '0'); // 日を文字列として取得（2桁で表示）
    var currentDate = myYear + myMonth + myDate; // 現在の年月日を結合

    // Cookieにアクセス日付をセット
    $.cookie('accessdate', currentDate, {
      expires: 1
    }); // 1日間有効
    $(".fv-animation").css("display", "block"); // ローディングを表示
    setTimeout(function () {
      $(".fv-animation").delay(2500).fadeOut('slow'); // ローディング画面を1.5秒待機してからフェードアウト
    }, 0); // ゼロミリ秒遅延で実行（次のイベントループまで待たない）
  } else {
    $(".fv-animation").css("display", "none"); // Cookieが存在する場合はローディング画面非表示
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
  // タブメニュー インフォメーション
  // ----------------------------------------
  // $(document).ready(function () {
  //     // 最初のタブとエリアにis-activeクラスを追加
  //     var initialTab = $('.tabs-information__item:first-of-type a').attr('href');
  //     $(initialTab).addClass('is-active');
  //     $('.tabs-information__item:first-of-type').addClass('is-active');

  //     // タブをクリックしたときの処理
  //     $('.tabs-information a').on('click', function () {
  //         var idName = $(this).attr('href');
  //         $('.tab-information-area').removeClass('is-active');
  //         $(idName).addClass('is-active');
  //         $('.tabs-information__item').removeClass('is-active');
  //         $(this).parent().addClass('is-active');
  //         return false;
  //     });
  // });
  // ----------------------------------------
  // formエラー
  // ----------------------------------------

  var contactFormButton = document.querySelector('.button--contact-form');
  if (contactFormButton) {
    contactFormButton.addEventListener('click', function () {
      var form = document.getElementById('form');

      // フォームが存在する場合のみ処理を実行
      if (form) {
        var isValid = true;
        form.querySelectorAll('[required]').forEach(function (input) {
          if (input.type !== 'checkbox' && input.type !== 'radio') {
            if (!input.value) {
              input.classList.add('error');
              isValid = false;
            } else {
              input.classList.remove('error');
            }
          } else if (input.type === 'checkbox' || input.type === 'radio') {
            var inputName = input.getAttribute('name');
            var checked = form.querySelector("input[name=\"".concat(inputName, "\"]:checked"));
            if (!checked) {
              isValid = false;
              var checkboxGroup = form.querySelector("input[name=\"".concat(inputName, "\"]"));
              if (checkboxGroup) {
                checkboxGroup.classList.add('error');
              }
            } else {
              var _checkboxGroup = form.querySelector("input[name=\"".concat(inputName, "\"]"));
              if (_checkboxGroup) {
                _checkboxGroup.classList.remove('error');
              }
            }
          }
        });
        var errorDiv = document.querySelector('.js-error');
        var breadcrumbDiv = document.querySelector('.js-error-breadcrumb');
        if (!isValid) {
          errorDiv.style.display = 'block';
          breadcrumbDiv.style.display = 'inline-block';

          // ヘッダーの高さを取得
          var headerHeight = document.querySelector('header').offsetHeight;
          var errorDivPosition = errorDiv.getBoundingClientRect().top + window.scrollY - headerHeight;
          window.scrollTo({
            top: errorDivPosition,
            behavior: 'smooth'
          });
        } else {
          errorDiv.style.display = 'none';
          breadcrumbDiv.style.display = 'none';
        }
      }
    });
  }

  // フォームの送信をキャンセル
  var formElement = document.getElementById('form');
  if (formElement) {
    formElement.addEventListener('submit', function (event) {
      event.preventDefault();
    });
  }

  // ----------------------------------------
  // タブメニュー インフォメーション
  // ダイビング情報ページ　フッターリンクからタブ先へ遷移
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
    });
  });


  // ----------------------------------------
  // ブラウザ上でタブごとにタームが切り替わる JS使用した場合
  // ----------------------------------------
  // jQuery(document).ready(function ($) {
  //   $('.tabs__item').click(function (e) {
  //     e.preventDefault();
  //     $('.tabs__item').removeClass('active');
  //     $(this).addClass('active');

  //     var selectedTab = $(this).text();
  //     $('.tab-area__item').hide();

  //     if (selectedTab === "ALL") {
  //       $('.tab-area__item').show();
  //     } else {
  //       $('.tab-area__item').each(function () {
  //         if ($(this).find('.campaign-card__tag').text() === selectedTab) {
  //           $(this).show();
  //         }
  //       });
  //     }
  //   });
  // });





});



