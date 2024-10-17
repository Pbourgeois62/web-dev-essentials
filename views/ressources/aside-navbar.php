<aside class="ressources-aside">
    <nav class="aside-navbar">
        <ul>
            <?php
            foreach ($categories as $category) { 
                ?>
                <li>
                    <a href="category.php?id=<?php echo htmlspecialchars($category['id']); ?>">
                        <?php echo htmlspecialchars($category['name']); ?>
                    </a>
                    <ul>
                        <?php foreach ($technos as $techno) { ?>
                            <?php if ($techno['category_id'] === $category['id']) { ?>
                                <li>
                                    <a href="techno.php?id=<?php echo htmlspecialchars($techno['id']); ?>">
                                        <?php echo htmlspecialchars($techno['name']); ?>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </nav>
</aside>