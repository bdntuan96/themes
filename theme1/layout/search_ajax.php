<?php foreach ($games as $item): ?>
    <a class="text-overflow value" href="<?php echo $item->slug; ?>"><?php echo $item->name; ?></a>
<?php endforeach; ?>
