
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    <h1>New Sale Creation<h1>
    <form method="POST" action="/store">
  <label for="product_name">Product name</label>
  <input type="text" id="name" name="name">

  <label for="price">Price</label>
  <input type="text" id="price" name="price">

  <label for="currency">Currency</label>
  <select id="currency" name="currency">
  <option value="ILS">ILS</option>
  <option value="USD">USD</option>
  <option value="EUR">EUR</option>
</select>

  <button type="submit">Insert payment details</button>
</form>
<p>as you can see, i'm not exactly a frontend kind of guy<p>

    </body>
</html>