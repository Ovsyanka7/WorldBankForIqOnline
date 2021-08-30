<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<title>World bank</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
</head>
<body style="margin: 0;">
	<div class="container">
		<div class="content">

			<!-- Шапка -->
			<div class="header">
				<div class="header__contacts">
					<div class="contacts__logo">
						<img src="img/logo.png" alt="">
					</div>
					<div class="contacts__phoneNumbers">
						8-800-100-5005 <br/>
						+7(3452)522-000
					</div>
				</div>

				<!-- Меню -->
				<div class="header__menu">
						<a href="" class="menu__item">Кредитные карты</a>
						<a href="" class="menu__item">Вклады</a>
						<a href="" class="menu__item">Дебитовая карта</a>
						<a href="" class="menu__item">Страхование</a>
						<a href="" class="menu__item">Друзья</a>
						<a href="" class="menu__item">Интернет-банк</a>
				</div>
			</div>

			<!-- Хлебные крошки -->
			<div class="history">
				<a href="" class="history__item">Главная</a>
				-
				<a href="" class="history__item"> Вклады</a>
				- 
				Калькулятор
			</div>

			<!-- Калькулятор -->
			<div class="calculator">
				<form name="myform" method="post" id="ajax_form" action="" >
					<div class="calculator__name">
						Калькулятор
					</div>
					<div class="calculator__params">
						<table class="calculator__table">

							<tr>
								<td class="calc__param_name_td">Дата оформления вклада</td>
								<td class="calc__param_td">
									<input class="calc__param" type="text" id="datepicker" name="date" value="дд.мм.гггг">
								</td>
							</tr>

							<tr>
								<td class="calc__param_name_td" align="right">Сумма вклада</td>
								<td class="calc__param_td">
									<input class="calc__param" id="summa_vklada" type="number" min="1000" max="3000000" 
										value="10000" name="summa_vklada"/>
								</td>
								<td class="calc__param_td_slider">
									<div class="slider" id="slider">
										<div class="slider__info">1 тыс. руб.</div>
										<div class="slider__info">3 000 000</div>
									</div>
								</td>
							</tr>

							<tr>
								<td class="calc__param_name_td" align="right">Срок вклада</td>
								<td class="calc__param_td">
									<select class="calc__param" name="srok_vklada">
										<option value="12">1 год</option>
										<option value="24">2 года</option>
										<option value="36">3 года</option>
										<option value="48">4 года</option>
										<option value="60">5 лет</option>
									</select>
								</td>
							</tr>

							<tr>
								<td class="calc__param_name_td" align="right">Пополнение вклада</td>
								<td class="calc__param_td">
									<input name="popolneniye_vklada_bool" type="radio" value="false" checked>
									Нет
									<input name="popolneniye_vklada_bool" type="radio" value="true">
									Да
								</td>
							</tr>

							<tr>
								<td class="calc__param_name_td" align="right">Сумма пополнения вклада</td>
								<td class="calc__param_td">
									<input class="calc__param" id="summa__popolneniya_vklada" type="number" min="1000" max="3000000" 
										value="10000" name="summa__popolneniya_vklada"/>
								</td>
								<td class="calc__param_td_slider">
									<div class="slider" id="sliderTwo">
										<div class="slider__info">1 тыс. руб.</div>
										<div class="slider__info">3 000 000</div>
									</div>
									
								</td>
							</tr>

						</table>			
					</div>

					<div class="calculator__result">
						<button id="result__button">Рассчитать</button>
						<div class="result__info">
							Результат:
						</div> &nbsp;
						<div id="result__total">11047</div>
						&nbsp; руб
					</div>
				</form>
			</div>
		</div>

		<!-- Футер -->
		<div class="footer">
			<a href="" class="footer__item">Кредитные карты</a>
			<a href="" class="footer__item">Вклады</a>
			<a href="" class="footer__item">Дебитовая карта</a>
			<a href="" class="footer__item">Страхование</a>
			<a href="" class="footer__item">Друзья</a>
			<a href="" class="footer__item">Интернет-банк</a>
		</div>
	</div>

	<script src="script.js"></script>
</body>
</html>
