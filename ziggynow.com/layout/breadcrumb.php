<?php if ($arr_bread) : ?>
    <div>
        <ul class="breadcrumb text">
            <li><a class="breadcrumb_name" href="/">Home</a></li>
            <?php foreach ($arr_bread as $breadnew) : ?>
                <?php if ($breadnew['source']) : ?>
                    <li><a class="breadcrumb_name" href="/<?php echo $breadnew['source']; ?>"><?php echo $breadnew['name'] ?></a></li>
                <?php else : ?>
                    <li><span class="breadcrumb_name"><?php echo $breadnew['name'] ?></span></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>