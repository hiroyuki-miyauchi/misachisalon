<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="hiroyuki miyauchi">
<?php if ( is_home() ) : // homeのみ読み込み ?>
  <meta name="keywords" content="みさち,misachi,サロン,salon,みさちサロン,悩み,相談,相談塾,人間関係,純愛,愛,お悩み相談,心理,心理学,テクニック,解決,診断,トレーニング,ワーク,メンタル,改善,記憶定着リスト">
  <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/img/home/main_visual_01.jpg" as="image">
<?php else : // home以外読み込み ?>
  <?php if( get_field('keywords') ) : // カスタムフィールドの「keywords」があるか判定 ?>
  <meta name="keywords" content="みさち,サロン,みさちサロン,悩み,相談,心理,テクニック,解決,診断,改善,メンタル,<?php the_field('keywords'); ?>">
  <?php endif; ?>
  <?php if( get_the_post_thumbnail() ) : // アイキャッチ画像があるか判定 ?>
  <link rel="preload" href="<?php the_post_thumbnail_url(); // アイキャッチ画像のURLのみ取得 ?>" as="image">
  <?php endif; ?>
<?php endif; ?>
<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo.jpg" as="image">

<?php // CSS（全ページ読み込み）
wp_enqueue_style('misachisalon-default', get_template_directory_uri() . '/assets/css/default.min.css', array(), '1.0.0');
wp_enqueue_style('misachisalon-common', get_template_directory_uri() . '/assets/css/common.min.css', array(), '1.0.4');
?>
<?php // CSS（条件に一致するページ毎に読み込み）
if ( is_home() ) { // homeのみ読み込み
  wp_enqueue_style('misachisalon-home', get_template_directory_uri() . '/assets/css/home.min.css', array(), '1.0.4');
} else if ( is_page('profile') ) { // profileのみ読み込み
  wp_enqueue_style('misachisalon-contents', get_template_directory_uri() . '/assets/css/contents.min.css', array(), '1.0.6');
  wp_enqueue_style('misachisalon-profile', get_template_directory_uri() . '/assets/css/profile.min.css', array(), '1.0.1');
} else { // 「home」や「profile」以外の全ページ読み込み
  wp_enqueue_style('misachisalon-contents', get_template_directory_uri() . '/assets/css/contents.min.css', array(), '1.0.6');
}
?>
<?php // CSS（全ページ読み込み）
wp_enqueue_style('misachisalon-wp_style', get_template_directory_uri() . '/assets/css/wp_style.min.css', array(), '1.0.0');
wp_enqueue_style('misachisalon-plugins', get_template_directory_uri() . '/assets/css/plugins.min.css', array(), '1.0.0');
wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.6.1/css/all.css', array(), '1.0.0');
?>

<?php wp_head(); // WordPressのプラグインなどの機能が使えなくなるので入れるのが推奨されている ?>

<?php if ( get_field('html_codes_head') ) : // Advanced Custom Fields（カスタムフィールド）の指定フィールド名に値があるか判定 ?>
<?php the_field('html_codes_head') ; // Advanced Custom Fields（カスタムフィールド）の読み込み ?><?php echo "\n" ?>
<?php endif; ?>
<?php if ( get_field('css_codes_head') ) : // Advanced Custom Fields（カスタムフィールド）の指定フィールド名に値があるか判定 ?>
<?php the_field('css_codes_head') ; // Advanced Custom Fields（カスタムフィールド）の読み込み ?><?php echo "\n" ?>
<?php endif; ?>
<?php if ( get_field('javascript_codes_head') ) : // Advanced Custom Fields（カスタムフィールド）の指定フィールド名に値があるか判定 ?>
<?php the_field('javascript_codes_head') ; // Advanced Custom Fields（カスタムフィールド）の読み込み ?><?php echo "\n" ?>
<?php endif; ?>
</head>

<body <?php body_class(); ?> >
<?php wp_body_open(); // body要素の直後に何かを挿入する際に使用するwp_body_openアクションを実行する ?>

<header class="header">
  <div class="header_inner">
    <div class="header_desc">
      <p class="header_caption">〜心理学の力であなたのお悩み解決〜</p>
      <?php if ( is_home() ) : // homeのみ読み込み ?>
        <h1 class="header_title"><a href="<?php echo home_url(); // サイトトップのURLを表示 ?>" class="header_titleLink"><?php bloginfo('name');//サイトのタイトルを表示 ?></a></h1>
      <?php else : // home以外読み込み ?>
        <div class="header_title"><a href="<?php echo home_url(); // サイトトップのURLを表示 ?>" class="header_titleLink"><?php bloginfo('name');//サイトのタイトルを表示 ?></a></div>
      <?php endif; ?>
    </div>

    <div class="header_logo">
      <a class="header_logoLink" href="<?php echo home_url(); // サイトトップのURLを表示 ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/logo.jpg" alt="misachisalon" width="50" height="50" class="header_logoImage"></a>
    </div>

    <ul class="header_sns">
      <li class="header_snsList"><a href="https://twitter.com/misachisalon" target="_blank" rel="noopener noreferrer" class="header_snsLink"><i class="fab fa-twitter"></i></a></li>
      <li class="header_snsList"><a href="https://www.facebook.com/misachisalon" target="_blank" rel="noopener noreferrer" class="header_snsLink"><i class="fab fa-facebook-f"></i></a></li>
      <li class="header_snsList"><a href="https://www.instagram.com/misachisalon/" target="_blank" rel="noopener noreferrer" class="header_snsLink"><i class="fab fa-instagram"></i></a></li>
    </ul>

    <?php if ( is_home() ) : // homeのみ読み込み ?>
    <div class="header_search">
      <?php get_search_form(); // 検索フォームを読み込む ?>
    </div>
    <?php endif; ?>

    <?php //get_search_form(); // 検索フォームを読み込む ?>
  </div>

  <div id="headerLinks" class="header_links">
    <div class="header_linksInner">
      <nav class="gnav">
        <?php
        $args = array(
          'menu' => 'global-navigation', // 管理画面で作成したメニューの名前
          'menu_class' => 'gnav_box', // メニューを構成するulタグのクラス名
          'container' => false, // <ul>タグを囲んでいる<div>タグを削除
        );
        wp_nav_menu($args);
        ?>
      </nav>

      <ul class="header_linksSns">
        <li class="header_snsList"><a href="https://twitter.com/misachisalon" target="_blank" rel="noopener noreferrer" class="header_snsLink"><i class="fab fa-twitter"></i></a></li>
        <li class="header_snsList"><a href="https://www.facebook.com/misachisalon" target="_blank" rel="noopener noreferrer" class="header_snsLink"><i class="fab fa-facebook-f"></i></a></li>
        <li class="header_snsList"><a href="https://www.instagram.com/misachisalon/" target="_blank" rel="noopener noreferrer" class="header_snsLink"><i class="fab fa-instagram"></i></a></li>
      </ul>
    </div>

    <div class="fixedNavigationClose js-fixedNavigationClose">
      <div class="fixedNavigationClose_inner">
        <span class="fixedNavigationClose_line fixedNavigationClose_lineTop"></span>
        <span class="fixedNavigationClose_line fixedNavigationClose_lineBottom"></span>
      </div>
    </div>
  </div>

  <div class="header_menu">
    <div class="header_menuInner">
      <span class="header_menuLine header_menuLineTop"></span>
      <span class="header_menuLine header_menuLineMiddle"></span>
      <span class="header_menuLine header_menuLineBottom"></span>
    </div>
  </div>
</header>

<div id="wrapper">