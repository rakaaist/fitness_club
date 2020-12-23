<nav>
    <ul>
        <div class="nav-side">

            <?php foreach ($data['left'] as $link => $title): ?>
                <li class="<?php print ($_SERVER['REQUEST_URI'] == $link) ? 'active' : ''; ?>">
                    <a href="<?php print $link; ?>"><?php print $title; ?></a>
                </li>
            <?php endforeach; ?>

        </div>

        <div class="nav-side">

            <?php foreach ($data['right'] as $link => $title): ?>
                <li class="nav-list <?php print ($_SERVER['REQUEST_URI'] == $link) ? 'active' : ''; ?>">
                    <a href="<?php print $link; ?>"><?php print $title; ?></a>
                </li>
            <?php endforeach; ?>

        </div>
    </ul>
</nav>
