<?php if( get_field('area_served_city') ): ?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "MovingCompany",
  "name": "Cross Country Movers",
  "image": "https://crosscountrymovers.com/wp-content/uploads/2020/07/logo-desktop.svg",
  "url": "https://crosscountrymovers.com/",

    <?php 
    $values = get_field( 'phone_number_city_single' );
    if ( $values ) { ?>
        "telephone": "<?php the_field('phone_number_city_sidebar'); ?>",
    <?php 
    } else { ?>
        "telephone": "<?php the_field('phone_number_top_general', 'options'); ?>",
    <?php } ?>


  "priceRange": "$ - $$$",
  "slogan": "We Work Hard So You Can Move Smart",
  "description": "Cross Country Movers is one of the top recommended long-distance moving service providers in the United States.",
  "foundingDate": "2010",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "",
    "addressLocality": "<?php the_field('area_served_city'); ?>",
    "addressRegion": "<?php the_field('region_city_schema'); ?>",
    "postalCode": "",
    "addressCountry": "US"
  },

  "areaServed":
  [
  "<?php the_field('area_served_city'); ?>"
  ],
  
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday"
    ],
    "opens": "08:00",
    "closes": "19:00"
  },

  "contactPoint" : {
     "@type" : "ContactPoint",

        <?php 
        $values = get_field( 'phone_number_city_single' );
        if ( $values ) { ?>
            "telephone": "<?php the_field('phone_number_city_sidebar'); ?>",
        <?php 
        } else { ?>
            "telephone": "<?php the_field('phone_number_top_general', 'options'); ?>",
        <?php } ?>

      "contactType" : "customer service"
    },

        <?php $post_objects = get_field('choose_reviews_city_single'); ?>
        <?php $count = count(get_field('choose_reviews_city_single')); ?>
        <?php $rowCount = $count; //GET THE COUNT ?>    

 

       "review": [
        
            <?php $i = 1; ?>


                <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                    <?php setup_postdata($post); ?>


                {
                    "@type": "Review",
                    "name": "<?php the_field('review_title_reviwer'); ?>",
                    "reviewBody": "<?php the_field('review_content_box', false, false); ?>",
                    "reviewRating": {
                    "@type": "Rating",

                    <?php if (get_field('score_reviwer') == '5') { ?>
                        "ratingValue": "5",
                    <?php } elseif (get_field('score_reviwer') == '4.5') { ?>
                        "ratingValue": "4",
                    <?php } elseif (get_field('score_reviwer') == '4') { ?>
                        "ratingValue": "4",
                    <?php } ?>  

                    "bestRating": "5",
                    "worstRating": "1"
                    },
                    "datePublished": "<?php echo get_the_date( 'F j, Y' ); ?>",
                    "author": {"@type": "Person", "name": "<?php the_title(''); ?>"},
                    "publisher": {"@type": "Organization", "name": "State2State Movers"}
                }


                <?php if($i < $rowCount): ?>
                    ,
                <?php endif; ?>


                <?php
                $rating = get_field('score_reviwer');
                $ratingsArray[$i++] += get_field('score_reviwer');
                ?>                
           

                <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>
        
        ] ,

        "aggregateRating": {
            "@type": "AggregateRating",
            <?php
                $totalRatings =  array_sum($ratingsArray);      
                $totalCountReview = $totalRatings  / $rowCount ;
            ?>
            "ratingValue": "<?php echo round($totalCountReview , 1); ?>",
            "bestRating": "5",
            "worstRating": "1",
            "ratingCount": "<?php echo $rowCount; ?>",
            "reviewCount": "<?php echo $rowCount; ?>"
        },
  

  "sameAs": [

    "https://www.facebook.com/crosscountrymove",
    "https://www.youtube.com/channel/UCCEtYHs-FDHNTlcBBhXSChA",
    "https://www.instagram.com/crosscountrymovers/",
    "https://member.angi.com/app/reviews/vrf?serviceProviderId=20355891"

  ] 
}
</script>

<?php endif; ?>