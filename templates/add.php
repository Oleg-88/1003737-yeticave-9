<nav class="nav">
     <ul class="nav__list container">
        <?php foreach ($categories as $category): ?>
            <li class="nav__item">
                <a href="/all-lots.php?id=<?= $category['id']; ?>"><?= $category['name']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>

<?php $classname_form = isset($errors) ? "form--invalid" : ""; ?>
    <form class="form form--add-lot container <?= $classname_form; ?>" action="add.php" method="post"
    enctype="multipart/form-data">

      <h2>Добавление лота</h2>
      <div class="form__container-two">
      <?php $classname = isset($errors['name']) ? "form__item--invalid" : "";
      $value = isset($lot['name']) ? $lot['name'] : ""; ?>
        <div class="form__item <?= $classname; ?>">
          <label for="lot-name">Наименование <sup>*</sup></label>
          <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота"
          value="<?= $value; ?>">
          <?php if (isset($errors['name'])): ?>
          <span class="form__error"><?= $errors['name']; ?></span>
          <?php endif; ?>
        </div>

        <?php $classname = isset($errors['category']) ? "form__item--invalid" : ""; ?>
        <div class="form__item <?= $classname; ?>">
          <label for="category">Категория <sup>*</sup></label>
          <select id="category" name="category">
            <option value="select">Выберите категорию</option>
            <?php foreach ($categories as $category): ?>
                <?php $value = (isset($lot['category']) && ((int)$lot['category'] === $category['id'])) ?
                 " selected" : ""; ?>
                    <option value="<?= $category['id']; ?>"<?= $value; ?>><?= $category['name']; ?></option>
            <?php endforeach; ?>
          </select>
          <?php if (isset($errors['category'])): ?>
          <span class="form__error"><?= $errors['category']; ?></span>
          <?php endif; ?>
        </div>
      </div>

      <?php $classname = isset($errors['description']) ? "form__item--invalid" : "";
      $value = isset($lot['description']) ? $lot['description'] : ""; ?>
      <div class="form__item form__item--wide <?= $classname; ?>">
        <label for="message">Описание <sup>*</sup></label>
        <textarea id="message" name="message" placeholder="Напишите описание лота"><?= $value; ?></textarea>
        <?php if (isset($errors['description'])): ?>
        <span class="form__error"><?= $errors['description']; ?></span>
        <?php endif; ?>
      </div>

      <?php $classname = isset($errors['image']) ? "form__item--invalid" : "";
      $value = isset($lot['image']) ? $lot['image'] : ""; ?>
      <div class="form__item form__item--file <?= $classname; ?>">
        <label>Изображение <sup>*</sup></label>
        <div class="form__input-file">
          <input class="visually-hidden" type="file" id="lot-img" value="<?= $value; ?>">
          <label for="lot-img">
            Добавить
          </label>
        </div>
        <?php if (isset($errors['image'])): ?>
        <span class="form__error"><?= $errors['image']; ?></span>
        <?php endif; ?>
      </div>


      <div class="form__container-three">
      <?php $classname = isset($errors['price']) ? "form__item--invalid" : "";
      $value = isset($lot['price']) ? $lot['price'] : ""; ?>
        <div class="form__item form__item--small <?= $classname; ?>">
          <label for="lot-rate">Начальная цена <sup>*</sup></label>
          <input id="lot-rate" type="text" name="lot-rate" placeholder="0" value="<?= $value; ?>">
          <?php if (isset($errors['price'])): ?>
            <span class="form__error"><?= $errors['price']; ?></span>
          <?php endif; ?>
        </div>

        <?php $classname = isset($errors['bet_step']) ? "form__item--invalid" : "";
      $value = isset($lot['bet_step']) ? $lot['bet_step'] : ""; ?>
        <div class="form__item form__item--small <?= $classname; ?>">
          <label for="lot-step">Шаг ставки <sup>*</sup></label>
          <input id="lot-step" type="text" name="lot-step" placeholder="0" value="<?= $value; ?>">
          <?php if (isset($errors['bet_step'])): ?>
            <span class="form__error"><?= $errors['bet_step']; ?></span>
          <?php endif; ?>
        </div>

        <?php $classname = isset($errors['end_date']) ? "form__item--invalid" : "";
      $value = isset($lot['end_date']) ? $lot['end_date'] : ""; ?>
        <div class="form__item <?= $classname; ?>">
          <label for="lot-date">Дата окончания торгов <sup>*</sup></label>
          <input class="form__input-date" id="lot-date" type="text" name="lot-date"
            placeholder="Введите дату в формате ГГГГ-ММ-ДД" value="<?= $value; ?>">
          <?php if (isset($errors['end_date'])): ?>
            <span class="form__error"><?= $errors['end_date']; ?></span>
          <?php endif; ?>
        </div>
      </div>

      <?php if (isset($errors)): ?>
          <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
      <?php endif; ?>
      <button type="submit" class="button">Добавить лот</button>
    </form>
