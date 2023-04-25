<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>

<script>
$( document ).ready(function() {
  $.get('api.php',{path: "managers"}, function(data) {
    $('#result').append('Запись: '+data+'<br><br>');
  });
});
</script>

<div id="result"></div>

</body>
</html>