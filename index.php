<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<style>
  body { background:#292929; color:#fff; font-family:'Amatic SC';
  }
  h1 {font-size:18vw;  text-align:center; margin-botton:0px;}
  pre code {
    background:#000;
    color:#fff;
    width:70%;
    margin: 0 auto;
    clear:both;
    display:block;
    border-radius:0;
  }
  pre code.json {
      text-align:AUTO;
  }
  .text-center {
      text-align:center;
  }
  h2 {
      font-size:5em;
  }
h3,a {
	color:#fff;
	text-decoration:none;
}
  </style>
  
  <?php wp_head(); ?>
</head>
<body>
	<h1>
    Headless
  </h1>
<h2 class="text-center">No Front Head, Only Backend</h2>
<pre><code>
  <?php print_r(mission_endpoint('rosseta-mission')); ?>
</code></pre>
  </pre>
	<div id="postman" class="container text-center">
	<img src="https://s3.amazonaws.com/kinlane-productions/building-blocks/x-postman.png" width="150"></img>
	<h2><a href="https://www.getpostman.com/">We recommend using Postman to debug</a></h2>	
</div>
</body>