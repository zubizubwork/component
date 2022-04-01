<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<form method="post" enctype="multipart/form-data">
	<h4>Новая заявка</h4>
  <div class="form-group">
    <label for="bid">Заголовок заявки</label>
    <input type="text" name="header" class="form-control" id="bid">
   </div> 
   <h4>Категория</h4>
   <div class="form-check">
	  <input class="form-check-input" type="radio" name="category" id="category1" value="option1" checked>
	  <label class="form-check-label" for="category1">
	    Масла
	  </label>
	 </div>
	 <div class="form-check">
	  <input class="form-check-input" type="radio" name="category" id="category2" value="option2">
	  <label class="form-check-label" for="category2">
	    Шины
	  </label>
	  
	</div>
	<h4>Вид заявки</h4>
	<div class="form-check">
	  <input class="form-check-input" type="radio" name="bidType" id="bidtype1" value="Запрос цен" checked>
	  <label class="form-check-label" for="bidtype1">
	    Запрос цен
	  </label>
	</div>
	  <div class="form-check">
	  <input class="form-check-input" type="radio" name="bidType" id="bidtype1" value="Пополнение складов">
	  <label class="form-check-label" for="bidtype2">
	    Пополнение складов
	  </label>
	</div>
	<div class="form-check">
	    <input class="form-check-input" type="radio" name="bidType" id="bidtype3" value="Спецзаказ">
	  <label class="form-check-label" for="bidtype3">
	    Спецзаказ
	  </label>

	  
	</div>
	<h4>Склад поставки</h4>
	 <div class="form-group">
	<select name="store" class="form-control" id="exampleFormControlSelect1">
      <option value="">(выберите склад)</option>
      <option value="1">1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>

  	<h4>Состав заявки</h4>
  	<div class="form-group">
  		<div class="row">
	    	<div class="col">Бренд</div>
	    	<div class="col">Наименование</div>
	    	<div class="col">Количество</div>
	    	<div class="col">Фасовка</div>
	    	<div class="col">Клиент</div>
	    	<div class="col"> </div>
	    </div>
	</div>

  <div class="form-group" id="multi1Group">
    	<div class="row inputRow">
	    	<div class="col">
	    		<input type="text" class="form-control" id="multi1" placeholder="multi" name="multi1[0][]" value="1">
	    	</div>
	    	<div class="col">
	    		<input type="text" class="form-control" id="multi1" placeholder="multi" name="multi1[0][]" value="1">
	    	</div>
	    	<div class="col">
	    		<input type="text" class="form-control" id="multi1" placeholder="multi" name="multi1[0][]" value="1">
	    	</div>
	    	<div class="col">
	    		<input type="text" class="form-control" id="multi1" placeholder="multi" name="multi1[0][]" value="1">
	    	</div>
	    	<div class="col">
	    		<input type="text" class="form-control" id="multi1" placeholder="multi" name="multi1[0][]" value="1">
	    	</div>
	    	<div class="col">
	    		<button class="btn btn-primary delMulti1" id="delMulti1">Удалить</button>
	    	</div>

	    </div>
  </div>
  <div class="form-group">
  	<button class="btn btn-primary" id="addMulti1">Добавить</button>
  </div>

  
    <div class="form-group">
    	<label for="fileToUpload">Выбрать файлы</label>
    	<input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload">
  	</div>
  	  <div class="form-group">
    <label for="commentArea">Комментарий</label>
    <textarea name="comment" class="form-control" id="commentArea" rows="3"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Отправить</button>
</form>

<script>


	$(document).on('click', '.delMulti1', function() {
		var n = $( ".delMulti1" ).length;
		if (n >1){
			$(this).parent().parent().remove();
		}
		return false;
	});

	$(document).ready(function() {
		let lineNo = 1;
		let row = 1;
		let i = 0;
		let markup4 = '';
        
		
		$('#addMulti1').click(function() {

			    markup = '<div class="col"><input type="text" class="form-control" id="multi1" placeholder="multi" name="multi1['+ lineNo + '][]" value="1"></div>';
			    
			    markup4 = '<div class="form-group" id="multi1Group"><div class="row inputRow">';
			    for (var i = 0; i < 5; i++) {
     				markup4 += markup; 

     			}
     			markup4 += '<div class="col"><button class="btn btn-primary delMulti1" id="delMulti1">Удалить</button></div>';
     			markup4 += '</div></div>';
     				$('#multi1Group').after(markup4);


			    
                row++;
                lineNo++;
			

                return false;
            });

	  return false;		

	});
</script>