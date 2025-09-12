<nav id="mobile-menu">
    <ul>
        <?php foreach ($menu as $row): ?>
            <?php if ($row['url'] == 'parent'): ?>
                <li class="has-sub">
                    <a href=""><?= $row['nama_menu']; ?></a>
                    <ul>
                        <?php foreach ($submenu as $r): ?>
                            <?php if ($r['parent_id'] == $row['id']): ?>

                                <?php if ($r['url'] == 'link'): ?>

                                    <li><a href="<?= $r['link']; ?>" <?= $r['new_tab'] ? 'target="_blank"' : 'target="_self"'; ?>><?= $r['nama_menu']; ?></a></li>
                                <?php else: ?>

                                    <li><a href="<?= $r['url']; ?>"><?= $r['nama_menu']; ?></a></li>
                                <?php endif; ?>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php else: ?>
                
                <?php if ($row['url'] == 'link'): ?>
                    <li><a href="<?= $row['link']; ?>" <?= $row['new_tab'] ? 'target="_blank"' : 'target="_self"'; ?>><?= $row['nama_menu']; ?></a></li>
                <?php else: ?>
                    <li><a href="<?= $row['url']; ?>"><?= $row['nama_menu']; ?></a></li>
                <?php endif; ?>

            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</nav>