<?php

    
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>xkcd password</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
      .checkbox, h2, button{
        margin-bottom: 30px;
      }
      .other-color{
        background-color: #865f86;
      }
      .navbar-inverse .navbar-brand{
        color: #F6CEE3;
      }
      #password{
        color: #5cb85c;
      }
    </style>

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
      <form role="form">
        <h2 class="text-center" id="password">Your Password will appear here :-)</h2>

        <div class="form-group col-lg-6">
          <label for="wordCount">How many words do you want to use:</label>
          <select class="form-control" id="wordCount">
            <option value="3">3 words</option>
            <option value="4">4 words</option>
            <option value="5">5 words</option>
          </select>          
        </div>

        <div class="form-group col-lg-6">
          <label for="MaxLength">Maximum Length of Password:</label>
          <input type="text" class="form-control" id="MaxLength" value="Example: 8, 12, or 20"></input>
        </div>

        <div class="checkbox col-lg-12">
          <label class="col-lg-2">
            <input type="checkbox">Include Digits</input>
          </label>
          <label class="col-lg-2">
            <input type="checkbox">Capitalize 1st Letters</input>
          </label>
          <label class="col-lg-2">
            <input type="checkbox">All Upper Case</input>
          </label>
          <label class="col-lg-2">
            <input type="checkbox">All Lower Case</input>
          </label>
          <label class="col-lg-4">
            <input type="checkbox">Include Symbols (&#36;&#45;&#64;&#95;&#38;)</input>
          </label>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary col-lg-4 col-lg-offset-4">Submit</button>
        </div>
      </form>
    </div> 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>