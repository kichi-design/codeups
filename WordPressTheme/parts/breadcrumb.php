<div class="breadcrumb <?php if (is_404()) { echo 'breadcrumb--404'; } ?> layout-breadcrumb">
    <div class="inner">
    <?php
        if (function_exists('bcn_display')) {
            bcn_display();
        }
    ?>
    </div>
</div>
