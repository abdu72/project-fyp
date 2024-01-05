<!DOCTYPE html>
<html>
<head>
  <title>Property running inheritance calculation</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="{{ asset('css/cal1.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <header>
    <nav class="navbar">
  <div class="navbar__container">
    <a href="/indexcal" class="navbar__back-icon"><i class="fas fa-arrow-left"></i></a>
    <h1 class="navbar__title">Property running inheritance calculation</h1>
  </div>
</nav>
    </header>


  <div class="container">
    <h6>General Information of the Heir</h6>
    <hr>
    <form>
      <div class="form-group">
      <div class="form-check">
        <b><a>Gender of heir</a></b>
        <p class="expln">Gender of the party leaving the property</p>
      <div class="radio-group">
  <label class="radio-button">
    <input type="radio" name="option" value="option1">
    <span class="radio-custom"></span>
    Male
  </label>
  <label class="radio-button">
    <input type="radio" name="option" value="option2">
    <span class="radio-custom"></span>
    Female
  </label>
</div>

      </div>
</div>
      <div class="form-group">
      <div class="form-check">
        <b><a>Is the heir legally married?</a></b>
        <p class="expln">Only legal marriages are recognized by the state</p>
      <div class="radio-group">
  <label class="radio-button">
    <input type="radio" name="option3" value="option1">
    <span class="radio-custom"></span>
    Yes, the heir is married
  </label>
  <label class="radio-button">
    <input type="radio" name="option3" value="option2">
    <span class="radio-custom"></span>
    No, the heir is not married
  </label>
</div>

      </div>
</div>
<br>
      <a class="btn" href="/procal2" button type="submit">Continue</button></a>
</div>
    </form>
  </div>
</body>
</html>

