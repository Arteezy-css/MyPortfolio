<?php get_header(); ?>
    <section id="about" class="s_about bg_light">
        <div class="section_header">
            <h2><?php echo get_cat_name(2) ?></h2>
            <div class="s_descr_wrap">
                <div class="s_descr">
                    <?php echo category_description(2); ?>
                </div>
            </div>
        </div>
        <div class="section_content">
            <div class="container">
                <div class="row">

                    <?php if ( have_posts() ) : query_posts('p=8');
                        while (have_posts()) : the_post(); ?>

                            <div class="col-md-4 col-md-push-4 animation_1">
                                <h3>Фото</h3>
                                <div class="person">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <a class="popup" href="<?php
                                        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
                                        echo $large_image_url[0];
                                        ?>">
                                            <?php the_post_thumbnail(array(400, 400)); ?>
                                        </a>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <div class="col-md-4 col-md-pull-4 animation_2">
                                <h3><?php the_title(); ?></h3>
                                <?php the_content(); ?>
                            </div>
                        <?php endwhile; endif; wp_reset_query(); ?>

                    <?php if ( have_posts() ) : query_posts('p=15');
                        while (have_posts()) : the_post(); ?>
                            <div class="col-md-4 animation_3 personal_last_block">
                                <h3><?php the_title(); ?></h3>
                                <h2 class="personal_header"><?php echo get_bloginfo('name'); ?></h2>
                                <?php the_content(); ?>
                                <?php endwhile; endif; wp_reset_query(); ?>
                                <div class="social_wrap">
                                    <ul>
                                        <?php if ( have_posts() ) : query_posts('cat=3');
                                            while (have_posts()) : the_post(); ?>
                                                <li><a href="<?php echo get_post_meta( $post->ID, 'soc_url', true );?>" target="blank" title="<?php the_title(); ?>"><i class="fa <?php echo get_post_meta( $post->ID, 'font_awesome', true );?>"></i></a></li>
                                            <?php endwhile; endif; wp_reset_query(); ?>
                                    </ul>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </section>
    <section id="resume" class="s_resume">
        <div class="section_header">
            <h2><?php echo get_cat_name(4) ?></h2>
            <div class="s_descr_wrap">
                <div class="s_descr"><?php echo category_description(4); ?></div>
            </div>
        </div>
        <div class="resume_container">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 left">
                        <h3><?php echo get_cat_name(5) ?></h3>
                        <div class="resume_icon"><i class="icon-basic-case"></i></div>

                        <?php if ( have_posts() ) : query_posts('cat=5');
                            while (have_posts()) : the_post(); ?>
                                <div class="resume_item">
                                    <div class="year"><?php echo get_post_meta( $post->ID, 'resume_years', true );?></div>
                                    <div class="resume_description"><?php echo get_post_meta( $post->ID, 'resume_place', true );?><strong><?php the_title(); ?></strong></div>
                                    <?php the_content(); ?>
                                </div>
                            <?php endwhile; endif; wp_reset_query(); ?>
                    </div>
                    <div class="col-md-6 col-sm-6 right">
                        <h3><?php echo get_cat_name(6) ?></h3>
                        <div class="resume_icon"><i class="icon-basic-book-pen"></i></div>

                        <?php if ( have_posts() ) : query_posts('cat=6');
                            while (have_posts()) : the_post(); ?>
                                <div class="resume_item">
                                    <div class="year"><?php echo get_post_meta( $post->ID, 'resume_years', true );?></div>
                                    <div class="resume_description"><strong><?php the_title(); ?></strong><?php echo get_post_meta( $post->ID, 'resume_place', true );?></div>
                                    <?php the_content(); ?>
                                </div>
                            <?php endwhile; endif; wp_reset_query(); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="portfolio" class="s_portfolio bg_dark">
        <div class="section_header">
            <h2><?php echo get_cat_name(7) ?></h2>
            <div class="s_descr_wrap">
                <div class="s_descr">
                    <?php echo category_description(7); ?>
                </div>
            </div>
        </div>
        <div class="section_content">
            <div class="container">
                <div class="row">
                    <div class="filter_div controls">
                        <ul>
                            <li class="filter active" data-filter="all">Все работы</li>
                            <li class="filter" data-filter=".wordpress">WordPress</li>
                            <li class="filter" data-filter=".front_end ">Верстка</li>
                            <li class="filter" data-filter=".key_site">Сайты "под ключ"</li>
                        </ul>
                    </div>
                    <div id="portfolio_grid">

                        <?php if ( have_posts() ) : query_posts('cat=7');
                            while (have_posts()) : the_post(); ?>
                                <div class="mix col-md-3 col-sm-6 col-xs-6 portfolio_item<?php
                                $tags = wp_get_post_tags($post->ID);
                                if ($tags) {
                                    foreach($tags as $tag) {
                                        echo ' ' . $tag->name;
                                    }
                                }
                                ?>">
                                    <div class="port_item_container">
                                        <?php the_post_thumbnail(array(400, 300)); ?>
                                        <div class="port_item_cont">
                                            <h3><?php the_title(); ?></h3>
                                        <?php the_excerpt(); ?>
                                            <a href="#" class="popup-content">Посмотреть</a>
                                        </div>
                                        <div class="hidden">
                                            <div class="port_descr">
                                                <h3><?php the_title(); ?></h3>
                                                <?php the_content(); ?>
                                                <img src="<?php
                                                $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
                                                echo $large_image_url[0];
                                                ?>" alt="<?php the_title(); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; endif; wp_reset_query(); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contacts" class="s_contacts bg_light">
        <div class="section_header">
            <h2><?php echo get_cat_name(11) ?></h2>
            <div class="s_descr_wrap">
                <div class="s_descr">
                    <?php echo category_description(11); ?>
                </div>
            </div>
        </div>
        <div class="section_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="contact_box">
                            <div class="contacts_icon icon-basic-geolocalize-05"></div>
                            <h3>Адрес:</h3>
                            <p><?php
                                $options = get_option('sample_theme_options');
                                echo $options['addresstext']; ?></p>
                        </div>
                        <div class="contact_box">
                            <div class="contacts_icon icon-basic-smartphone"></div>
                            <h3>Телефон:</h3>
                            <p><?php
                                $options = get_option('sample_theme_options');
                                echo $options['phonetext']; ?></p>
                        </div>
                        <div class="contact_box">
                            <div class="contacts_icon icon-basic-webpage-img-txt"></div>
                            <h3>Web-site:</h3>
                            <p><a href="//<?php
                                $options = get_option('sample_theme_options');
                                echo $options['sitetext']; ?>" target="blank"><?php
                                    $options = get_option('sample_theme_options');
                                    echo $options['sitetext']; ?></a></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <form action="https://formspree.io/arteezy.css@gmail.com" class="main_form" method="POST" target="_blank">
                            <label class="form_group">
                                <span class="color_element">*</span> Ваше имя
                                <input type="text" name="name" placeholder="Ваше имя" required />
                            </label>
                            <label class="form_group">
                                <span class="color_element">*</span> Ваш E-mail
                                <input type="email" name="email" placeholder="Ваш E-mail" required/>
                            </label>
                            <label class="form_group">
                                <span class="color_element">*</span> Ваше сообщение:
                                <textarea type="text" name="message" placeholder="Введите Ваше сообщение" required></textarea>
                            </label>
                            <button type="submit">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>