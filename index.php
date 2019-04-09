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
    <div class="canvas" id="c1"></div>
    <div class="canvas" id="c2"></div>
    <div class="canvas" id="c3"></div>
    <div class="canvas" id="c4"></div>
    <div class="canvas" id="c5"></div>
    <div class="canvas" id="c6"></div>
    <div class="canvas" id="c7"></div>
    <div class="canvas" id="c8"></div>
    <div class="canvas" id="c9"></div>
    <div class="canvas" id="c10"></div>
    <div class="canvas" id="c11"></div>
    <div class="canvas" id="c12"></div>
  </div>

  <script type="text/babel">
    <?php
      $rows = [];
      for ($i=0; $i<12; $i++) {
        $x = rand(7,14);
        $rows[] = (new Snowflake($x))->get();
      }
    ?>

    let rows = [];
    rows.push(<?=$rows[0]?>);
    rows.push(<?=$rows[1]?>);
    rows.push(<?=$rows[2]?>);
    rows.push(<?=$rows[3]?>);
    rows.push(<?=$rows[4]?>);
    rows.push(<?=$rows[5]?>);
    rows.push(<?=$rows[6]?>);
    rows.push(<?=$rows[7]?>);
    rows.push(<?=$rows[8]?>);
    rows.push(<?=$rows[9]?>);
    rows.push(<?=$rows[10]?>);
    rows.push(<?=$rows[11]?>);

    let i = 0;
    Array.prototype.forEach.call(
      document.getElementsByClassName('canvas'),
      function(el) {
        ReactDOM.render(
          <Grid grid={rows[i]}></Grid>,
          el
        );
        ++i;
      }
    );
  </script>
</body>
</html>