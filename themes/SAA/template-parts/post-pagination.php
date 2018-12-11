<?php
function get_per_page(){
    global $wp_query;
    // 結果の件数を取得
    $fonud_posts = $wp_query->found_posts;
    // ページ当たりの件数を取得
    $page_range = get_query_var('posts_per_page');
    // 現在のページを取得
    $paged = get_query_var('paged') ?get_query_var('paged') :1 ;
    // 現在のページの開始件数を取得
    $start = $page_range * ($paged-1) + 1;
    // 現在のページの終了件数を取得
    $end = $page_range * $paged;
    if($fonud_posts <= $end){
        // 結果の件数が終了件数より小さい場合、終了件数に設定
        $end = $fonud_posts;
    }
    if($end == 0){
        // 終了件数が0の場合場合、開始件数も0に設定
        $start = 0;
    }
    return $fonud_posts . '件中 ' . $start .' - '. $end . "件";
}

$nav =  get_per_page();
the_posts_pagination( array (
                        'prev_text' => '&laquo; prev',
                        'next_text' => 'next &raquo;',
                        'type' => 'list',
                        'mid_size' => 1,
                        'screen_reader_text' => $nav
                    ) );
