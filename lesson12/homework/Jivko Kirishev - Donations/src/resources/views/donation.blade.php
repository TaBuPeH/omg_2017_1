<!DOCTYPE html>
<html>
<head>
	<title>Дарение</title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

<form method="POST" action="/donation/submit">
	{{ csrf_field() }}

	<div>Дари пари на бедни, безработни програмисти!</div>
	<input id="money" type="text" name="money">
	<div>И получаваш снимка на едно ощастливено говедо /ааа .. такова де програмист/.</div><input id="donate" type="submit" name="submit">
</form>



<form id="epayForm" method="POST" action="https://demo.epay.bg/">
<input type=hidden name=PAGE value="paylogin">
<input type=hidden name=ENCODED>
<input type=hidden name=CHECKSUM>
<input type=hidden name=URL_OK value="https://drive.google.com/open?id=0B_b3-j9d-u37VUpGRlZsUHNmQ1k">
<input type=hidden name=URL_CANCEL>
</form>

<script type="text/javascript">
$("#donate").on("click", function(){
	console.log("submit clicked");

	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

	console.log(CSRF_TOKEN);

	$.ajax({
    url: '/donation/submit',
    type: 'POST',
    data: {_token: CSRF_TOKEN, money: $("#money").val()},
    dataType: 'JSON',
    success: function (data) {
    	
        console.log(data);

        var form = $("#epayForm");
        $("input[name='ENCODED']").val(data["encoded"]);
        $("input[name='CHECKSUM']").val(data["checksum"]);
        form.submit();
    }
})});
</script>
</body>
</html>