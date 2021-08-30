// Проверка на корректную дату вклада (true -- корректно).
var dataCorrect;

// Добавить слайдер для поля "Сумма вклада".
$("#slider").slider({
    min:1000,
    max:3000000, 
    value: 10000,
    slide: function( event, ui ) {
        $("#summa_vklada").val(ui.value);
    }
});

// Добавить слайдер для поля поля "Сумма пополнения вклада".
$("#sliderTwo").slider({ 
    min:1000,
    max:3000000,
    value: 10000,
    slide: function( event, ui ) {
        $("#summa__popolneniya_vklada").val(ui.value);
    }
});

// Добавить датапикер.
$("#datepicker").datepicker({
    dateFormat: "dd-mm-yy"
});

// Проверка корректного заполнения поля "Сумма вклада" 
// и синхронизация со слайдером.
var initialValue = $("#slider").slider("option", "value");
$("#summa_vklada").val(initialValue);

$("#summa_vklada").change(function() {
    var oldVal = $("#slider").slider("option", "value");
    var newVal = $(this).val();
    if (isNaN(newVal) || newVal < 1000 || newVal > 3000000) {
        $("#summa_vklada").val(oldVal);
    } else {
        $("#slider").slider("option", "value", newVal);
    }
});

// Проверка корректного заполнения поля "Сумма пополнения вклада" 
// и синхронизация со слайдером.
var initialValue = $("#sliderTwo").slider("option", "value");
$("#summa__popolneniya_vklada").val(initialValue);

$("#summa__popolneniya_vklada").change(function() {
    var oldVal = $("#sliderTwo").slider("option", "value");
    var newVal = $(this).val();
    if (isNaN(newVal) || newVal < 1000 || newVal > 3000000) {
        $("#summa__popolneniya_vklada").val(oldVal);
    } else {
        $("#sliderTwo").slider("option", "value", newVal);
    }
});

// Проверка заполнения поля "Дата оформления вклада".
$("#datepicker").change(function() {
    var date = document.getElementById('datepicker').value;

    if (date.length == 10) {
        var dd = Number(date.slice(0, 2));
        var mm = Number(date.slice(3, 5));
        var gggg = Number(date.slice(6, 10));

        if (!Number.isInteger(dd) || !Number.isInteger(mm) || !Number.isInteger(gggg)){
            alert('Неверный формат даты оформления вклада');   
        } else if ((dd < 1) || (dd > 31)) {
            alert('Неверный формат даты оформления вклада (' + dd + ')');
        } else if ((mm < 1) || (mm > 12)) {
            alert('Неверный формат даты оформления вклада (' + mm + ')');
        }   else if ((gggg < 1600) || (gggg > 3000)) {
            alert('Неверный формат даты оформления вклада (' + gggg + ')');
        } else {
            dataCorrect = true;
        }        
    }

});

// Данные отправляются в calc.php по нажатию на кнопку.
$(document).ready(function() {
    $("#result__button").click(
		function(){
            // Если корректная дата оформления вклада.
            if (dataCorrect) {
               sendAjaxForm('result__total', 'ajax_form', 'calc.php');
               
            } else {
                alert('Неверный формат даты оформления вклада');
            }
            // Не перезагружать страницу.
			return false;  
		}
	);

});

function sendAjaxForm(result__total, ajax_form, url) {
    $.ajax({
        url:     url,
        type:     "POST",
        dataType: "html",
        data: $("#"+ajax_form).serialize(),
        //Данные отправлены успешно.
        success: function(response) { 
        	result = $.parseJSON(response);
        	$('#result__total').html(result);
    	},
        // Данные не отправлены.
    	error: function(response) { 
            $('#result__total').html('?');
    	}
 	});
}
