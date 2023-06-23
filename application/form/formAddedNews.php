<form class="needs-validation" novalidate="" method="post" enctype="multipart/form-data" action="/application/controllers/addedNews.php">
      <div class="row g-3">
        <div class="col-12">
          <label for="title" class="form-label">Заголовок новини</label>
          <div class="input-group has-validation">
            <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок" required="">
          </div>
        </div>
        <div class="col-12">
          <label for="genre" class="form-label">Жанр новини</label>
          <select id="genre" name="genre" size="2">
            <option value="World">Новини світу</option>
            <option value="Technology">Технології</option>
            <option value="Design">Дизайн</option>
            <option value="Business">Бізнес</option>
            <option value="Politics">Політика</option>
            <option value="Science">Наука</option>
            <option value="Culture">Культура</option>
            <option value="Style">Стиль</option>
            <option value="Travel">Подорожі</option>
          </select>
          <input type="button" name="genre" id="genre" value="Обрати">
        </div>
        <div class="col-12">
          <label for="date" class="form-label">Введіть дату</span></label>
          <input type="date" name="date" class="form-control" id="date" placeholder="">
        </div>
        <div class="col-md-3 m-20">
          <label for="photo" class="form-label">Додайте фото</label>
          <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control " name="photo" id="photo" placeholder="" required="">
        </div>
      </div>
      <div class="col-md-6">
        <label for="decsription" class="form-label">News</label>
        <textarea type="text" name="description" rows="5" class="form-control" placeholder="Опишіть новину"></textarea>
      </div>
      <br>
      <button class="w-100 mb-4 btn btn-primary btn-lg" type="submit">Додати новину</button><br>
      
</form>