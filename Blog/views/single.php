<?php  
	class SingleView{
		function __construct(){}

		function article(){ ?>
		<?php for ($i=0; $i < count($cat); $i++) { 
			# code...
		} ?>
			<div id="col1">
                <h1>Catégorie</h1>
            <div class="article">
                <h1>Titre</h1>
                <p class="date">20-07-2016</p>
                <p>resume Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas quod sit sequi debitis, accusamus corporis, vero eligendi ducimus molestiae! Vel nam laborum, rem aperiam? Vitae labore provident reprehenderit tempora quod.
                		<a href="details.html" class="plus">&gt;&gt;&gt;</a></p>
                <p class="signature">Henry</p>
            </div>
            <br>
             <div class="article">
                <h1>Titre 2</h1>
                <p class="date">20-07-2016</p>
                <p>resume Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas quod sit sequi debitis, accusamus corporis, vero eligendi ducimus molestiae! Vel nam laborum, rem aperiam? Vitae labore provident reprehenderit tempora quod.
                		<a href="details.html" class="plus">&gt;&gt;&gt;</a></p>
                <p class="signature">Marc</p>
            </div>
            <br>
      </div>  
    <div id="col22">
        <h1>Catégorie</h1>
        <div class="article">
            <h1>Titre</h1>
             <p class="par">Par Louis</p>
            <p class="date">20-04-1969</p>
            <p>contenu de l'article. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut ea animi tempore sunt a libero. Soluta magni nesciunt dolore impedit quaerat, consequuntur provident modi autem aliquid quae, ut voluptates rerum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, deserunt suscipit. Vel itaque ipsa repudiandae recusandae pariatur suscipit nisi expedita asperiores, rerum, rem cum debitis nobis facere sapiente molestias assumenda!</p>
        </div>
    
  </div>
		<?php }



	}
?>