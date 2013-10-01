<section id="main">


    <div class="body-text">

        <div class="container-fluid">

            <div class="row-fluid">

                <!-- right sidebar -->

                <div class="span4">
                    <div class="qbox">
                        <h3><i class="icon-white icon-browse pull-left"></i><?= $cat->cat_name; ?></h3>
                        <b>Sub Categories</b>
                    </div>

                    <!-- Facebook -->
                    <div class="fb-like-box" data-href="https://www.facebook.com/Kuhire" data-width="292" data-show-faces="true" data-stream="false" data-show-border="false" data-header="true"></div>

                    <br />
                    <a href="https://twitter.com/kuhire254" target="new" ><img src="http://cdn.doncaprio.com/wp-content/uploads/2012/07/animated_twitter_.gif" alt="@kuhire254" /> </a>
                    <a href="https://twitter.com/kuhire254"  class="twitter-follow-button" data-show-count="true" data-lang="en">Follow @Kuhire254</a>
                    <script>!function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (!d.getElementById(id)) {
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = "//platform.twitter.com/widgets.js";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }
                            }(document, "script", "twitter-wjs");</script>
                    <!-- end social stuff -->

                </div>

                <div class="span7">
                    <?php foreach ($rt->result() as $listing): ?>
                        <!--start list-->
                        <div class="row" style="margin-left: 10px;">
                            <div class="span4">
                                <a href="<?= base_url($listing->slug . '?ref=search result'); ?>"><img src="<?= base_url('images/thumbnails/' . $listing->image); ?>" alt="Placeholder Image" /></a>

                            </div>
                            <div class="span8">
                                <a href="<?= base_url($listing->slug . '?ref=search result'); ?>" class="prop-title"><?= $listing->name; ?></a>

                                <p class="price"><?php if ($listing->item_price): echo ' KShs ' . $listing->item_price;
                    else: echo 'Price: Enquire';
                    endif; ?></p>
                                <p class="size"><?= $listing->location . ' ' . $listing->region; ?></p>
                                <p class="description">
    <?= word_limiter($listing->name, 10); ?> 
                                </p>
                                <!-- Short List Btns -->
                                <ul class="list-btns">
                                    <!-- li><a href="<?= base_url($listing->slug . '?ref=view+later'); ?>" id="property_1" class="add-to-list-js" 
                                           data-shortlist="<img src='<?= base_url('images/thumbnails/' . $listing->image); ?>' alt='<?= $listing->name; ?>'>
                                           <div><a href='<?= base_url($listing->slug . "?ref=view+later"); ?>' id='property_<?= $listing->item_id; ?>'><?= $listing->name; ?></a><?php if ($listing->item_price): echo ' KShs ' . $listing->item_price;
    else: echo 'Price: Enquire';
    endif; ?></div>">
                                            <i class="icon-plus-sign"></i>Short List</a></li -->
                                    <li><a href="<?= base_url($listing->slug . '?ref=view+later'); ?>"><i class="icon-info-sign"></i>View Details</a></li>
                                </ul>
                                <!-- end short list -->
                            </div>
                        </div>

                        <!--end list-->
<?php endforeach; ?>

                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="span4">
                                <a href="<?= base_url('add?ref=search btn'); ?>"><img src="<?= base_url('images/upload.png'); ?>" alt="Placeholder Image" /></a>

                            </div>
                            <div class="span8">
                                <h2> Your listings Name </h2>

                                <p class="price">Your listings Price</p>
                                <p class="size">Your listing Location</p>
                                <p class="description">
                                    Add a new listing free and easy on Scrobber.
                                </p>

                            </div>
                        </div>
                    </div>

                    <!-- start paging -->
                    <div class="container-fluid">
                        <div class="row-fluid" style="border:none;">
                            <div class="span12">
                                <div class="pagination pagination-centered">

                                    <ul>
<?= $this->pagination->create_links(); ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end paging -->
                </div>

            </div>

        </div>

    </div>

</section>