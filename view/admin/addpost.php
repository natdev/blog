<div class="wrap">
  <div class="container subscribe">
    <h1>Ajoutez un nouvel article</h1>
    <form class="form"  method="POST">
      <p>
          <p>titre de l'article</p>
          <input type="text" name="title">
      </p>
      <p>
          <p>Catégorie de l'article</p>
          <select class="" name="parent">
              <option value="0" selected>Aucun parent</option>
          </select>
      </p>
      <p>
        <p>Feature</p>
        <input type="radio" name="feature" value="1">
      </p>
      <p>
        <textarea name="content" rows="8" cols="80">

        </textarea>
      </p>
      <p class="formButton">
        <input type="submit" value="Ajouter">
      </p>
    </form>
  </div>
</div>
