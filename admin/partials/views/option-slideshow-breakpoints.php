<div style="display: table;">
    <div style="display: table-row;">
        <div style="display: table-cell;">minimum width</div>
        <div style="display: table-cell;">show</div>
        <div style="display: table-cell;">margin</div>
        <div style="display: table-cell;">move</div>
    </div>

	<?php foreach ( $view['slideshow_settings']['breakpoints']['multiple'] as $key => $breakpoint ) : ?>
        <div style="display: table-row;">

            <div style="display: table-cell;">
                <label for="view-breakpoint_<?php echo $key; ?>"></label>
				<input id=view-breakpoint_<?php echo $key; ?>"
                       name="view[data][slideshow_settings][breakpoints][<?php echo $key; ?>][width]"
                       value="<?php echo $breakpoint['width']; ?>"
                       type="number"
                       class="input-incremental" > px
            </div>

            <div style="display: table-cell;">
                <select id="view-max_slides"
                        name="view[data][slideshow_settings][breakpoints][<?php echo $key; ?>][max_slides]"
                        class="if selectgroup">
                    <option value="1" <?php selected( $breakpoint['max_slides'], 1 ); ?>>1</option>
                    <option value="2" <?php selected( $breakpoint['max_slides'], 2 ); ?>>2</option>
                    <option value="3" <?php selected( $breakpoint['max_slides'], 3 ); ?>>3</option>
                    <option value="4" <?php selected( $breakpoint['max_slides'], 4 ); ?>>4</option>
                </select>
                <div class="option-desc singular" style="display: none;">
					<?php _e( 'slide at a time', 'strong-testimonials' ); ?>
                </div>
                <div class="option-desc plural" style="display: none;">
					<?php _e( 'slides at a time', 'strong-testimonials' ); ?>
                </div>
            </div>

            <div style="display: table-cell;">
                <input type="number" id="view-margin" class="input-incremental"
                       name="view[data][slideshow_settings][margin]" min="1" step="1"
                       value="<?php echo $view['slideshow_settings']['margin']; ?>" size="3"/> px
            </div>

            <div style="display: table-cell;">
                <select id="view-move_slides"
                        name="view[data][slideshow_settings][move_slides]"
                        class="if selectgroup">
                    <option value="1" <?php selected( $view['slideshow_settings']['move_slides'], 1 ); ?>>1</option>
                    <option value="2" <?php selected( $view['slideshow_settings']['move_slides'], 2 ); ?>>2</option>
                    <option value="3" <?php selected( $view['slideshow_settings']['move_slides'], 3 ); ?>>3</option>
                    <option value="4" <?php selected( $view['slideshow_settings']['move_slides'], 4 ); ?>>4</option>
                </select>
                <div class="option-desc singular" style="display: none;">
					<?php _e( 'slide at a time', 'strong-testimonials' ); ?>
                </div>
                <div class="option-desc plural" style="display: none;">
					<?php _e( 'slides at a time', 'strong-testimonials' ); ?>
                </div>
            </div>

        </div>

	<?php endforeach; ?>
</div>
