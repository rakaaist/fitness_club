<nav>
    <ul>
        <div class="nav-side">
            <?php foreach ($data['left'] as $title => $link): ?>
                <li>
                    <a href="<?php print $title; ?>"><?php print $link; ?></a>
                </li>
            <?php endforeach; ?>
        </div>
        <div class="nav-side">
            <?php foreach ($data['right'] as $title => $link): ?>
                <li>
                    <a href="<?php print $title; ?>"><?php print $link; ?></a>
                </li>
            <?php endforeach; ?>
        </div>
    </ul>
</nav>
