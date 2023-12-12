<?

function recc_adjust_queries($query)
{
    if (!is_admin() and is_post_type_archive('service') and $query->is_main_query()) {
        $today = date('Ymd');
        $query->set('posts_per_page', 5);
        $query->set('meta_key', 'service_date');
        $query->set('orderby', 'meta_value');
        $query->set('order', 'DES');
        $query->set('meta_query', array(
            array(
                'key' => 'service_date',
                'value' => $today,
                'compare' => '<=',
                'type' => 'DATE'
            )
        ));
    }
    if (!is_admin() and is_post_type_archive('event') and $query->is_main_query()) {
        $today = date('Ymd');
        $query->set('posts_per_page', 5);
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'value' => $today,
                'compare' => '>=',
                'type' => 'DATE'
            )
        ));
    }
}
