<?php

if( have_rows('links') ): ?>
    <div class="panel panel-links align<?php echo $block['align']; if(isset($block['className'])){ echo ' ' . $block['className']; } ?> <?php if(get_field('collapsable')) : echo 'panel-collapsable'; endif; ?> <?php if(get_field('default_state') == 'open') : echo 'panel-open'; endif; ?>">
        <?php if(get_field('title')) : ?>
            <h5><span class="icon icon-caret-right"></span><span class="underline-me"><?= get_field('title'); ?></span></h5>
        <?php endif; ?>
        <div class="row row-collapsable <?php if(($block['align'] == 'wide') && (count(get_field('links')) > 3)) : echo 'to-left-edge'; endif;?>">
            <div class="col-12">
                <ul class="small">
                <?php while ( have_rows('links') ) : the_row(); ?>
                    <?php $link = get_sub_field('link'); ?>
                    <li><a <?php if($link['target']) : echo 'target="_blank"'; endif; ?> href="<?= $link['url']; ?>"><?= $link['title']; ?></a></li>
                <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif;
