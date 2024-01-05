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
    <a href="/procal1" class="navbar__back-icon"><i class="fas fa-arrow-left"></i></a>
    <h1 class="navbar__title">Property running inheritance calculation</h1>
  </div>
</nav>
    </header>


  <div class="container">
    <h6>Inheritance Nuclear Family Information</h6>
    <hr>
    <form>
      <div class="form-group">
      <div class="form-check">
        <b><a>Is the heir's legal spouse still alive?</a></b>
        <p class="expln">Only for legally married couples</p>
      <div class="radio-group">
  <label class="radio-button">
    <input type="radio" name="option" value="option1">
    <span class="radio-custom"></span>
    Yes
  </label>
  <label class="radio-button">
    <input type="radio" name="option" value="option2">
    <span class="radio-custom"></span>
    No
  </label>
</div>

      </div>
</div>


      <div class="form-group">
      <div class="form-check">
        <b><a>Does the heir have children from a legal spouse?</a></b>
        <p class="expln">Children outside of legal marriage cannot be recognized</p>
      <div class="radio-group">
  <label class="radio-button">
    <input type="radio" name="option2" value="option3" required>
    <span class="radio-custom"></span>
    Yes
  </label>
  <label class="radio-button">
    <input type="radio" name="option2" value="option4" required>
    <span class="radio-custom"></span>
    No
  </label>
</div>

      </div>
</div>

      <div class="form-group">
      <div class="form-check">
        <b><a>The number of children of the heir who are still alive when the heir has just died</a></b>
        <p class="expln">Just count the number of children who are Muslim</p>
        <div class="form-group">
  <label for="small-textbox">Boy</label>
  <div class="input-container">
    <input type="text" id="small-textbox" class="small-textbox" placeholder=" 0">
  </div>
  </div>
  <br>
  <div class="form-group">
  <label for="small-textbox">Girl</label>
  <div class="input-container">
    <input type="text" id="small-textbox" class="small-textbox" placeholder=" 0">
</div>
</div>


      </div>
</div>

      <div class="form-group">
      <div class="form-check">
      <b><a>Does the heir have grandchildren from his sons?</a></b>
        <p class="expln">Only for grandchildren of sons only</p>
      <div class="radio-group">
  <label class="radio-button">
    <input type="radio" name="option3" value="option3" required>
    <span class="radio-custom"></span>
    Yes
  </label>
  <label class="radio-button">
    <input type="radio" name="option4" value="option4" required>
    <span class="radio-custom"></span>
    No
  </label>
</div>
      </div>
</div>


<div class="form-group">
      <div class="form-check">
        <b><a>The number of grandsons of the heir who are still alive when the heir has recently died</a></b>
        <p class="expln">Excluding his daughter's grandson</p>
        <div class="form-group">
  <label for="small-textbox">Grandson</label>
  <div class="input-container">
    <input type="text" id="small-textbox" class="small-textbox" placeholder=" 0">
  </div>
  </div>
  <br>
  <div class="form-group">
  <label for="small-textbox">Granddaughter</label>
  <div class="input-container1">
    <input type="text" id="small-textbox" class="small-textbox" placeholder=" 0">

</div>
</div>

</div>
</div>
<br>
      <a class="btn" href="/procal3" button type="submit">Continue</button></a>
    </form>
    
  </div>
</body>
</html>

