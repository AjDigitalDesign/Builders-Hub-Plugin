
<div id="xml-feed">
    <div class="header pb-3">
        <h3>Builders Feed Dashboard.</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci animi cumque iure mollitia pariatur qui quis ratione tempore ullam vitae?</p>
    </div>
     <?php
        $args = array(
            'post_type' => 'communities',
            'post_status'   => 'publish'
        );
        $communities_query = new WP_Query($args);
     ?>
    <?php if($communities_query->have_posts()) : ?>
       <table class="table">
           <thead>
             <tr>
                 <th scope="col">ID</th>
                 <th class="col">Name</th>
                 <th class="col">Location</th>
                 <th class="col">Price Range</th>
                 <th class="col">Status</th>
                 <th class="col">Updated</th>
             </tr>
           </thead>
           <tbody>
            <tr>
                <?php while($communities_query->have_posts()) : $communities_query->the_post(); ?>
                    <?php
                        $danger = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>';
                        $status = get_field('status');
                        var_dump($status);
                        if($status['label'] === 'Select'){
                            $display_status = $danger . 'missing Status';
                        } else{
                            $display_status = $status['label'];
                        }

                        $comm_address = get_field('comm_address');
                        $comm_city = get_field('comm_city');
                        $comm_state = get_field('comm_state');
                        $comm_postal_code = get_field('comm_postal_code');
                        $comm_price = get_field('comm_price');

                        if($comm_address && $comm_postal_code && $comm_state && $comm_state){
                            $display_address = $comm_address .' ';
                            $display_address .= '' . $comm_city . ' ';
                            $display_address .= '' . $comm_state . ', ';
                            $display_address .= ''. $comm_postal_code;
                        }else {
                            $display_address = $danger;
                            $display_address .= '' .$comm_address .' ';
                            $display_address .= '' . $comm_city . ' ';
                            $display_address .= '' . $comm_state . ', ';
                            $display_address .= ''. $comm_postal_code;
                        }
                    ?>
                    <th scope="row"><?php the_ID(); ?></th>
                    <td class="td"><strong><?php edit_post_link(' Edit ', '', the_title(), ''); ?></strong></td>
                    <td class="td">
                        <p><?php echo $display_address; ?></p>
                    </td>
                    <td class="td"><p><?php the_title(); ?></p></td>
                    <td class="td"><p><?php echo $display_status; ?></p></td>
                    <td class="td"><p><?php printf( __( '%s', 'textdomain' ), get_the_modified_date() ); ?></p></td>

                    <tr>
                        <th scope="row"><?php the_ID(); ?></th>
                        <td>testing</td>
                    </tr>
                <?php endwhile; ?>
            </tr>
           </tbody>
       </table>
    <?php endif; ?>
</div>