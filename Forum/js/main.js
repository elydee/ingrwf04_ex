$(document).ready(function(){
	$.fn.serializeObject = function() {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

function Listing(data){
	$('#todo').html('');
	$.ajax({
		url:"listing.php", 
		type:"get",  // post  
		dataType:"json", // text, json, html, script,
		ifModified:false,
		success: function(data){
			$.each(data,function(index,tasks){
				$("#todo").append('<li><h2>' + tasks.title + '</h2><p> à faire le : ' + tasks.date + '</p><p>' + tasks.description + '</p></li>');
		});
		},
		error: function(xhr,textStatus){alert("oops, y'a une erreur!")}
	});
};
$('#new_date').datepicker();
Listing();

  $('#form').on('submit', function(e) {
    e.preventDefault();
    var formData = $(this).serializeObject();
    console.log(formData);
    Insert(formData);
  });

function Insert(myDatas){
	$.ajax({
		url:"insert.php", 
		type:"post",
		data: {"myJson" : JSON.stringify(myDatas)},  // post  
		success: Listing,
		error: function(xhr,textStatus){alert("oops, y'a une erreur! " + textStatus)}
	});
}
});