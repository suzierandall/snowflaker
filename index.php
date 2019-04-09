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
  	#canvas .grid {
  	}
  	#canvas .pixel {
      font-size: 2px;
      color: #99ccff;
      background-color: #99ccff;
  		padding: 0px 1px;
  	}
    #canvas .pixel:empty {
      background-color: #fff;
    }
  </style>
</head>
<body>
  <div id="canvas"></div>
  <script type="text/babel">
    let rows = <?php echo (new Snowflake)->get(); ?>;
  	let canvas = document.querySelector('#canvas');
	ReactDOM.render(
		<Grid grid={rows}></Grid>,
		canvas
	);
  </script>
</body>
</html>