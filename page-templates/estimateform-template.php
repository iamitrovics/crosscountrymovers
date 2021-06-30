<?php
/**
 * Template Name: Estimate Form Template
 */

get_header(); ?>

<div class="moving-steps">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li class="step-num-1 active">
                        <span>1</span><i>My <em>move </em>plan</i>
                    </li>
                </ul>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /.moving-steps -->
<div class="moving-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>What are you moving?</h1>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    <div id="moving-forms">
        <div class="container">

        <?php echo do_shortcode('[gravityform id="3"  ajax="true" tabindex="1"]'); ?>

        </div>
    </div>
    <!-- /.moving-forms -->
</div>
<!-- /.moving-body -->

<?php get_footer(); ?>