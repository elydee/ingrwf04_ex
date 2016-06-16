<footer>
	<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
	<script> window.jQuery || document.write('<script src="js/jquery-3.0.0.min.js"><\/script>')</script>
	<script>
		$(".delete").on("click",function(){
			if(!confirm("Are you sure?")){
			return false;}
		});
	</script>
	</footer>
	</body>
</html>