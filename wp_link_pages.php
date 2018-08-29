
<?php
add_filter('wp_link_pages', 'perch_bs4_link_pages', 10, 2);
function perch_bs4_link_pages( $output, $args = '' ) {
    global $page, $numpages, $multipage, $more;
 
    $defaults = array(
        'before'           => '<nav class="Page navigation><ul class="pagination justify-content-left"><li class="page-item"><span class="page-link">' . esc_attr(__( 'Pages:', 'text-domain' )) . '</span></li>',
        'after'            => '</ul></nav><hr>',
        'link_before'      => '<span class="page-link">',
        'link_after'       => '</span>',
        'next_or_number'   => 'number',
        'separator'        => '',
        'nextpagelink'     => __( 'Next', 'pergo'),
        'previouspagelink' => __( 'Previous', 'pergo' ),
        'pagelink'         => '%',
        'echo'             => 1
    );
 
    $params = wp_parse_args( $args, $defaults );
 
    /**
     * Filters the arguments used in retrieving page links for paginated posts.
     *
     * @since 3.0.0
     *
     * @param array $params An array of arguments for page links for paginated posts.
     */
    $r = apply_filters( 'wp_link_pages_args', $params );
 
    $output = '';
    if ( $multipage ) {
        if ( 'number' == $r['next_or_number'] ) {
            $output .= $r['before'];
            for ( $i = 1; $i <= $numpages; $i++ ) {
            	if( $page == $i ){
            		$link = '<li class="page-item active">'.$r['link_before'] . str_replace( '%', $i, $r['pagelink'] ) . $r['link_after'].'</li>';
            	}else{
            		$link = '<li class="page-item">'.$r['link_before'] . str_replace( '%', $i, $r['pagelink'] ) . $r['link_after'].'</li>';
            	}
                
                if ( $i != $page || ! $more && 1 == $page ) {
                    $link = '<li class="page-item">'._wp_link_page( $i ) . $link . '</a></li>';
                }
                /**
                 * Filters the HTML output of individual page number links.
                 *
                 * @since 3.6.0
                 *
                 * @param string $link The page number HTML output.
                 * @param int    $i    Page number for paginated posts' page links.
                 */
                $link = apply_filters( 'wp_link_pages_link', $link, $i );
 
                // Use the custom links separator beginning with the second link.
                $output .= ( 1 === $i ) ? ' ' : $r['separator'];
                $output .= $link;
            }
            $output .= $r['after'];
        } elseif ( $more ) {
            $output .= $r['before'];
            $prev = $page - 1;
            if ( $prev > 0 ) {
                $link = '<li class="page-item">'._wp_link_page( $prev ) . $r['link_before'] . $r['previouspagelink'] . $r['link_after'] . '</a></li>';
 
                /** This filter is documented in wp-includes/post-template.php */
                $output .= apply_filters( 'wp_link_pages_link', $link, $prev );
            }
            $next = $page + 1;
            if ( $next <= $numpages ) {
                if ( $prev ) {
                    $output .= $r['separator'];
                }
                $link = '<li class="page-item">'._wp_link_page( $next ) . $r['link_before'] . $r['nextpagelink'] . $r['link_after'] . '</a></li>';
 
                /** This filter is documented in wp-includes/post-template.php */
                $output .= apply_filters( 'wp_link_pages_link', $link, $next );
            }
            $output .= $r['after'];
        }
    }
 
    /**
     * Filters the HTML output of page links for paginated posts.
     *
     * @since 3.6.0
     *
     * @param string $output HTML output of paginated posts' page links.
     * @param array  $args   An array of arguments.
     */
    //$html = apply_filters( 'wp_link_pages', $output, $args );
 
   
    return $output;
}
?>
