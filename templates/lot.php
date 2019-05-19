<nav class="nav">
    <ul class="nav__list container">
        <?php foreach ($categories as $category): ?>
            <li class="nav__item">
                <a href="/all-lots.php?id=<?= $category['id']; ?>"><?= $category['name']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
        <section class="lot-item container">
            <h2><?= htmlspecialchars($lot['name']); ?></h2>
            <div class="lot-item__content">
                <div class="lot-item__left">
                    <div class="lot-item__image">
                        <img src="<?= htmlspecialchars($lot['image']); ?>" width="730" height="548"
                             alt="<?= htmlspecialchars($lot['name']); ?>">
                    </div>
                    <p class="lot-item__category">Категория: <span><?= $lot['category']; ?></span></p>
                    <p class="lot-item__description"><?= htmlspecialchars($lot['description']); ?></p>
                </div>
                <div class="lot-item__right">
                    <div class="lot-item__state">
                        <div class="lot__timer timer <?php if (get_enough_time($lot['end_date'])): ?>
                        timer--finishing<?php endif; ?>">
                            <?=get_end_time($lot['end_date']); ?>
                        </div>
                        <div class="lot-item__cost-state">
                            <div class="lot-item__rate">
                                <span class="lot-item__amount">Текущая цена</span>
                                <span class="lot-item__cost"><?= $lot['price']; ?></span>
                            </div>
                            <div class="lot-item__min-cost">
                                Мин. ставка <span>12 000 р</span>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </main>

</div>