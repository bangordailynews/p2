<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>xkcd password</title>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Include JQuery -->
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="mystyle.css">

</head>

<body>

    <div class="navbar navbar-inverse navbar-fixed-top other-color" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <div class="navbar-brand">P2 by Claire Yixie Li</div>
        </div>
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>xkcd password generator</h1>
        <p>What is a xkcd password??? Well, xkcd password is a short phrase containing 4 easy to remember words. xkcd passwords are actually harder to crack than a complicated password like V0lcan0_247648 even. So now, view below form and create one for yourself today!</p>
      </div>
    </div>

    <div class="container">
      <form role="form" method="GET">
        <h2 class="text-center" id="password">Your Password will appear here :-)</h2>

        <div class="form-group col-lg-6">
          <label for="wordCount">How many words do you want to use:</label>
          <select class="form-control" id="wordCount" name="wordCount">
            <option value="4">4 words</option>
            <option value="5">5 words</option>
            <option value="6">6 words</option>
            <option value="7">7 words</option>
            <option value="8">8 words</option>
            <option value="9">9 words</option>
            <option value="10">10 words</option>
          </select>          
        </div>

        <div class="form-group col-lg-6">
          <label for="maxLength">Maximum Length of Password:</label>
          <input type="text" class="form-control" id="maxLength" name="maxLength" placeholder="Example: 12, 16 or 20">
        </div>

        <div class="checkbox col-lg-12">
          <label class="col-lg-2">
            <input type="checkbox" id="includeDigit" name="includeDigit">Include Digits (0-9)
          </label>
          <label class="col-lg-2">
            <input type="checkbox" id="capitalization" name="capitalization">Capitalize 1st Letters
          </label>
          <label class="col-lg-2">
            <input type="checkbox" id="upperCase" name="upperCase">All Upper Case
          </label>
          <label class="col-lg-2">
            <input type="checkbox" id="lowerCase" name="lowerCase">All Lower Case
          </label>
          <label class="col-lg-4">
            <input type="checkbox" id="includeSymbol" name="includeSymbol">Include Symbols (&#36;&#45;&#64;&#95;&#38;)
          </label>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary col-lg-4 col-lg-offset-4" id="submitBtn">Submit</button>
        </div>
      </form>
    </div> 

    <script src="myscripts.js"></script>
    
</body>
</html>