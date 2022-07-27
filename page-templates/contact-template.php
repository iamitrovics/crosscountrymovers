<?php
/**
 * Template Name: Contact Template
 */

get_header(); ?>

    <div class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="intro">
                        <h1><?php the_field('main_title_contact_header'); ?></h1>     
                        <?php the_field('intro_text_contact_header'); ?>   
                    </div>
                    <!-- /.intro -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>

    <div id="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-content">
                        <h2><?php the_field('main_title_loc_page'); ?></h2>
                        <?php the_field('location_text_loc_page'); ?>
                        <div class="contact-ways">
                            <span class="tel"><a href="tel:<?php the_field('phone_number_contact_page'); ?>"><?php the_field('phone_number_contact_page'); ?></a></span>
                            <span class="mail"><a href="mailto:<?php the_field('email_address_contact_page'); ?>"><?php the_field('email_address_contact_page'); ?></a></span>
                        </div>
                        <!-- /.contact-ways -->
                    </div>
                    <!-- /.contact-content -->
                </div>
                <!-- /.col-md-6 -->
                <div class="col-md-6">
                    <div class="contact-form">
                        <?php the_field('form_code_contact_page'); ?>
                    </div>
                    <!-- /.contact-form -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#contact-page -->

<?php get_footer(); ?>