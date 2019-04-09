<?php
  require_once(__DIR__ . '/app/snowflake.php');
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Snowflake</title>
  <script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
  <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
  <!-- @todo FIXME: replace run-time JSX transpiler with proper env -->
  <script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>
  <script src="app/assets/js/snowflake.js" type="text/babel"></script>
  <style>
  	/* @todo keep separate (re-skinnable) or tie to component? */
    .frame {
      width: 300px;
    }
  	.canvas {
      float: left;
      margin-top: 20px;
      margin-left: 20px;
  	}
    .canvas:nth-child(2n) {
      margin-top: 40px;
      margin-left: 25px;
    }
    .canvas:nth-child(5n) {
      margin-top: 80px;
      margin-left: 60px;
    }
    .canvas:nth-child(7n) {
      margin-top: -10px;
      margin-left: 10px;
    }
    .canvas .grid {}
  	.canvas .pixel {
      font-size: 2px;
      color: #99ccff;
      background-color: #99ccff;
  		padding: 0px 1px;
  	}
    .canvas .pixel:empty {
      background-color: #fff;
    }
  </style>
</head>
<body>

  <div class="frame">
    <div class="canvas c1"></div>
    <div class="canvas c2"></div>
    <div class="canvas c3"></div>
    <div class="canvas c4"></div>
    <div class="canvas c5"></div>
    <div class="canvas c6"></div>
    <div class="canvas c7"></div>
    <div class="canvas c8"></div>
    <div class="canvas c9"></div>
    <div class="canvas c10"></div>
    <div class="canvas c11"></div>
    <div class="canvas c12"></div>
  </div>

  <script type="text/babel">
    let rows = <?php echo (new Snowflake)->get(); ?>;
    Array.prototype.forEach.call(
      document.getElementsByClassName('canvas'),
      function(el) {
        ReactDOM.render(
          <Grid grid={rows}></Grid>,
          el
        )
      }
    );
  </script>
</body>
</html>