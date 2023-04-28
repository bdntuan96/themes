<?php if ($arr_bread) : ?>
    <div class="text">
        <ul class="breadcrumb flex center">
            <li>
                <a class="breadcrumb_name" href="/">
                    <svg fill="#b6e1ef" height="40px" width="40px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve">
                        <g>
                            <polygon class="st0" points="434.162,293.382 434.162,493.862 308.321,493.862 308.321,368.583 203.682,368.583 203.682,493.862 77.841,493.862 77.841,293.382 256.002,153.862 	" />
                            <polygon class="st0" points="0,242.682 256,38.93 512,242.682 482.21,285.764 256,105.722 29.79,285.764 	" />
                            <polygon class="st0" points="439.853,18.138 439.853,148.538 376.573,98.138 376.573,18.138 	" />
                        </g>
                    </svg>
                </a>
            </li>
            <?php foreach ($arr_bread as $breadnew) : ?>
                <?php if ($breadnew['source']) : ?>
                    <li><a class="breadcrumb_name" href="/<?php echo $breadnew['source']; ?>"><?php echo $breadnew['name'] ?></a></li>
                <?php else : ?>
                    <li><span class="breadcrumb_name"><?php echo $breadnew['name']; ?></span></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>