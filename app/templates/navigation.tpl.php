<nav>
    <ul>
        <div class="nav-side">

            <?php foreach ($data['left'] as $link => $title): ?>
                <li class="
                <?php if ($_SERVER['REQUEST_URI'] == ('/' . strtolower($title))): ?>
                    <?php print 'active'; ?>
                <?php elseif (($_SERVER['REQUEST_URI'] == ('/index') || $_SERVER['REQUEST_URI'] == ('/'))
                    && $title === 'Home'): ?>
                    <?php print 'active'; ?>
                <?php endif; ?>
                ">
                    <a href="<?php print $link; ?>"><?php print $title; ?></a>
                </li>
            <?php endforeach; ?>

        </div>

        <div class="nav-side">

            <?php foreach ($data['right'] as $link => $title): ?>
                <li class="nav-list
                <?php if ($_SERVER['REQUEST_URI'] == ('/' . strtolower($title)) || $_SERVER['REQUEST_URI'] == ('')): ?>
                    <?php print 'active'; ?>
                <?php endif; ?>
                ">
                    <a href="<?php print $link; ?>"><?php print $title; ?></a>
                </li>
            <?php endforeach; ?>

        </div>
    </ul>
</nav>
