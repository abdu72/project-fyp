<!DOCTYPE html>
<html>
<head>
  <title>Form Survey</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="{{ asset('css/cal1.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <header>
    <nav class="navbar">
  <div class="navbar__container">
    <a href="/fixcal3" class="navbar__back-icon"><i class="fas fa-arrow-left"></i></a>
    <h1 class="navbar__title">Asset fixed inheritance calculation</h1>
  </div>
</nav>
    </header>


  <div class="container">
    <h6>Heir Family Information</h6>
    <hr>
    <form>
      <div class="form-group">
      <div class="form-check">
        <b><a>Are the heir's parents still alive?</a></b>
        <p class="expln">Select the condition of the inheritor's biological parents</p>
      <div class="radio-group">
  <label class="radio-button">
    <input type="radio" name="option" value="option1">
    <span class="radio-custom"></span>
    Father is alive, mother is dead
  </label>
  <label class="radio-button">
    <input type="radio" name="option" value="option2">
    <span class="radio-custom"></span>
    Mother is still alive, father is dead
  </label>
  <label class="radio-button">
    <input type="radio" name="option" value="option1">
    <span class="radio-custom"></span>
    Father and mother are dead
  </label>
  <label class="radio-button">
    <input type="radio" name="option" value="option2">
    <span class="radio-custom"></span>
    Father and mother are still alive
  </label>
</div>

      </div>
</div>
      <div class="form-group">
      <div class="form-check">
        <b><a>The number of surviving siblings when the heir recently died</a></b>
        <p class="expln">Just count the number of children who are Muslim</p>
        <div class="form-group">
  <label for="small-textbox">Brother</label>
  <div class="input-container">
    <input type="text" id="small-textbox" class="small-textbox" placeholder=" 0">
  </div>
  </div>
  <br>
  <div class="form-group">
  <label for="small-textbox">Sister</label>
  <div class="input-container2">
    <input type="text" id="small-textbox" class="small-textbox" placeholder=" 0">

</div>
</div>

      </div>
</div>

<div class="form-group">
      <div class="form-check">
        <b><a>Were the heir's grandparents still alive when the heir just died?</a></b>
        <p class="expln">SSelect the condition of the heir's grandparents from the father's side only</p>
      <div class="radio-group">
  <label class="radio-button">
    <input type="radio" name="option1" value="option1">
    <span class="radio-custom"></span>
    Grandfather is alive, grandmother is dead
  </label>
  <label class="radio-button">
    <input type="radio" name="option1" value="option2">
    <span class="radio-custom"></span>
    grandmother is still alive, Grandfather is dead
  </label>
  <label class="radio-button">
    <input type="radio" name="option1" value="option1">
    <span class="radio-custom"></span>
    Grandfather and grandmother are dead
  </label>
  <label class="radio-button">
    <input type="radio" name="option1" value="option2">
    <span class="radio-custom"></span>
    Grandfather and grandmother are still alive
  </label>
</div>
</div>
</div>
<br>
      <a class="btn" href="/detail" button type="submit">Calculate</button></a>
</div>
    </form>
  </div>
</body>
</html>

