<?php
/**
 * Shared расход calculator for legal entity product cards and product pages.
 */
?>
	<div class="yur-calc-overlay" data-yur-calc-close></div>
	<aside class="yur-calc-panel" aria-hidden="true" aria-labelledby="yur-calc-title" role="dialog">
		<div class="yur-calc-panel__header">
			<div>
				<p class="yur-calc-panel__eyebrow">Расчет расхода</p>
				<h3 id="yur-calc-title" class="yur-calc-panel__title">Калькулятор расхода препарата</h3>
			</div>
			<button class="yur-calc-panel__close" type="button" aria-label="Закрыть калькулятор" data-yur-calc-close>&times;</button>
		</div>
		<div class="yur-calc-panel__body">
			<p class="yur-calc-panel__lead">Заполните параметры применения — расчетный блок подготовлен для подключения формул расхода по выбранному препарату.</p>
			<div class="yur-calc-fields" aria-label="Поля для расчета расхода препарата">
				<label class="yur-calc-field">
					<span>Объем обработки</span>
					<input type="number" min="0" step="0.01" placeholder="Например, 120">
				</label>
				<label class="yur-calc-field">
					<span>Единица измерения</span>
					<select>
						<option>тонн</option>
						<option>м³</option>
						<option>га</option>
						<option>голов</option>
					</select>
				</label>
				<label class="yur-calc-field yur-calc-field--wide">
					<span>Комментарий к задаче</span>
					<textarea rows="4" placeholder="Опишите условия применения препарата"></textarea>
				</label>
			</div>
			<button class="btn btn-form yur-calc-panel__submit" type="button"><span>Рассчитать</span></button>
			<div class="yur-calc-result" aria-live="polite" hidden></div>
		</div>
	</aside>

	<style>
		.yur-calc-overlay{position:fixed;inset:0;background:rgba(18,39,31,.48);backdrop-filter:blur(3px);opacity:0;visibility:hidden;transition:opacity .28s ease,visibility .28s ease;z-index:998}.yur-calc-overlay.is-active{opacity:1;visibility:visible}.yur-calc-panel{position:fixed;top:0;right:0;width:min(460px,100%);height:100vh;background:linear-gradient(180deg,#fff 0%,#f7fbf8 100%);box-shadow:-24px 0 60px rgba(24,67,48,.22);transform:translateX(105%);transition:transform .34s ease;z-index:999;padding:34px 32px;overflow-y:auto;border-left:5px solid #246e49}.yur-calc-panel.is-active{transform:translateX(0)}.yur-calc-panel__header{display:flex;align-items:flex-start;justify-content:space-between;gap:18px;padding-bottom:24px;margin-bottom:24px;border-bottom:1px solid rgba(36,110,73,.16)}.yur-calc-panel__eyebrow{margin:0 0 8px;color:#246e49;font-size:13px;font-weight:700;letter-spacing:.08em;text-transform:uppercase}.yur-calc-panel__title{margin:0;color:#173c2b;font-size:28px;line-height:1.18;font-weight:700}.yur-calc-panel__close{width:42px;height:42px;min-width:42px;border:1px solid rgba(36,110,73,.18);border-radius:50%;background:#fff;color:#246e49;font-size:30px;line-height:38px;cursor:pointer;transition:background .2s ease,color .2s ease,transform .2s ease}.yur-calc-panel__close:hover{background:#246e49;color:#fff;transform:rotate(90deg)}.yur-calc-panel__lead{margin:0 0 24px;color:#5d6d64;line-height:1.6}.yur-calc-fields{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:26px;padding:20px;background:#fff;border:1px solid rgba(36,110,73,.14);border-radius:18px;box-shadow:0 16px 34px rgba(36,110,73,.08)}.yur-calc-field{display:flex;flex-direction:column;gap:8px;margin:0;color:#173c2b;font-weight:600}.yur-calc-question{margin:0;color:#173c2b;font-weight:700}.yur-calc-choice-list{display:flex;flex-direction:column;gap:10px}.yur-calc-choice{display:flex;align-items:flex-start;gap:10px;padding:12px 14px;border:1px solid rgba(36,110,73,.16);border-radius:12px;background:#f8fbf9;color:#173c2b;cursor:pointer;transition:border-color .2s ease,background .2s ease}.yur-calc-choice:has(input:checked){border-color:#246e49;background:#eef8f1}.yur-calc-choice input{width:auto;margin-top:4px;accent-color:#246e49}.yur-calc-message{grid-column:1/-1;margin:0;color:#5d6d64;line-height:1.5}.yur-calc-field--wide{grid-column:1/-1}.yur-calc-field input,.yur-calc-field select,.yur-calc-field textarea{width:100%;border:1px solid rgba(36,110,73,.22);border-radius:12px;background:#f8fbf9;color:#173c2b;padding:13px 14px;font:inherit;outline:none;transition:border-color .2s ease,box-shadow .2s ease,background .2s ease}.yur-calc-field input:focus,.yur-calc-field select:focus,.yur-calc-field textarea:focus{border-color:#246e49;background:#fff;box-shadow:0 0 0 4px rgba(36,110,73,.12)}.yur-calc-panel__submit{width:100%;justify-content:center}.yur-calc-result{margin-top:18px;padding:16px 18px;border:1px solid rgba(36,110,73,.18);border-radius:14px;background:#eef8f1;color:#173c2b;font-weight:700;line-height:1.5}.yur-calc-result.is-error{background:#fff6f1;border-color:rgba(190,74,32,.28);color:#9b3a1f}.yur-calc-open{cursor:pointer}@media(max-width:575px){.yur-calc-panel{padding:26px 20px}.yur-calc-panel__title{font-size:23px}.yur-calc-fields{grid-template-columns:1fr;padding:16px}}
	</style>

	<script type="module">
		import { productsForCalc } from "<?php echo get_template_directory_uri(); ?>/assets/js/data/productsForCalc.js";

		document.addEventListener('DOMContentLoaded', function () {
			var panel = document.querySelector('.yur-calc-panel');
			var overlay = document.querySelector('.yur-calc-overlay');
			var title = document.getElementById('yur-calc-title');
			var closeElements = document.querySelectorAll('[data-yur-calc-close]');
			var calcFields = document.querySelector('.yur-calc-fields');
			var submitButton = document.querySelector('.yur-calc-panel__submit');
			var resultBlock = document.querySelector('.yur-calc-result');
			var activeCalcProduct = null;
			var activeProductName = '';

			if (!panel || !overlay || !title || !calcFields || !submitButton || !resultBlock) {
				return;
			}


			function resetCalcResult() {
				resultBlock.hidden = true;
				resultBlock.classList.remove('is-error');
				resultBlock.textContent = '';
			}

			function showCalcResult(message, isError) {
				resultBlock.hidden = false;
				resultBlock.classList.toggle('is-error', Boolean(isError));
				resultBlock.textContent = message;
			}

			function formatCalcNumber(value) {
				return Number(value.toFixed(2)).toLocaleString('ru-RU', {
					maximumFractionDigits: 2
				});
			}

			function getSelectedCalcCategoryKey() {
				var selectedCategory = calcFields.querySelector('input[name="yur-calc-category"]:checked');
				return selectedCategory ? selectedCategory.value : '';
			}

			function getCalcRule(categoryKey) {
				var rules = {
					cathegorie1: { numerator: 'const1', denominator: 'const2', unit: 'constOne' },
					cathegorie2: { numerator: 'const3', denominator: 'const4', unit: 'constThree' },
					cathegorie3: { numerator: 'const5', denominator: 'const6', unit: 'constFife' },
					cathegorie4: { numerator: 'const7', denominator: 'const8', unit: 'constSeven' },
					cathegorie5: { numerator: 'const9', denominator: 'const10', unit: 'constNine' },
					cathegorie6: { numerator: 'const11', denominator: 'const12', unit: 'constEleven' }
				};

				return rules[categoryKey];
			}

			function calculateProductAmount() {
				if (!activeCalcProduct) {
					showCalcResult('Для выбранного препарата данные калькулятора не найдены.', true);
					return;
				}

				var categoryKey = getSelectedCalcCategoryKey();
				var calcInput = calcFields.querySelector('[data-calc-input]');
				var rule = getCalcRule(categoryKey);

				if (!categoryKey || !rule || !calcInput) {
					showCalcResult('Выберите объект и способ внесения для расчета.', true);
					return;
				}

				var inputValue = parseFloat(String(calcInput.value).replace(',', '.'));
				var numerator = Number(activeCalcProduct[rule.numerator]);
				var denominator = Number(activeCalcProduct[rule.denominator]);
				var unit = activeCalcProduct[rule.unit];

				if (!Number.isFinite(inputValue) || inputValue <= 0) {
					showCalcResult('Введите значение больше нуля для расчета.', true);
					return;
				}

				if (!Number.isFinite(numerator) || !Number.isFinite(denominator) || denominator === 0 || !unit) {
					showCalcResult('Для выбранного способа внесения не настроены данные расчета.', true);
					return;
				}

				var result = (numerator * inputValue) / denominator;
				showCalcResult('Вам необходимо ' + formatCalcNumber(result) + ' ' + unit + ' препарата "' + activeProductName + '"', false);
			}

			function stripCalcTitleClarification(value) {
				return String(value || '').replace(/\s*\([^)]*\)\s*/g, '').trim();
			}

			function normalizeCalcTitle(value) {
				return String(value || '').trim().toLowerCase();
			}

			function getCalcProduct(productName) {
				var titleAliases = {
					'маклор': 'Маклор',
					'антойл': 'Антойл+',
					'антойлс': 'Антойл+'
				};
				var normalizedName = normalizeCalcTitle(productName).replace(/ё/g, 'е').replace(/[^а-яa-z0-9+]/gi, '');
				if (titleAliases[normalizedName]) {
					productName = titleAliases[normalizedName];
				}
				normalizedName = normalizeCalcTitle(productName);
				var exactProduct = productsForCalc.find(function (product) {
					return normalizeCalcTitle(product.title) === normalizedName;
				});

				if (exactProduct) {
					return exactProduct;
				}

				return productsForCalc.find(function (product) {
					return normalizeCalcTitle(stripCalcTitleClarification(product.title)) === normalizedName;
				});
			}

			function createOption(name, value, text, checked) {
				var optionId = name + '-' + value;
				var label = document.createElement('label');
				label.className = 'yur-calc-choice';

				var input = document.createElement('input');
				input.type = 'radio';
				input.name = name;
				input.value = value;
				input.id = optionId;
				input.checked = Boolean(checked);

				var span = document.createElement('span');
				span.textContent = text;

				label.append(input, span);
				return label;
			}

			function createQuestionBlock(title, options, name) {
				var block = document.createElement('div');
				block.className = 'yur-calc-field yur-calc-field--wide yur-calc-choice-block';

				var heading = document.createElement('p');
				heading.className = 'yur-calc-question';
				heading.textContent = title;

				var list = document.createElement('div');
				list.className = 'yur-calc-choice-list';
				options.forEach(function (option, index) {
					list.append(createOption(name, option.key, option.label, index === 0));
				});

				block.append(heading, list);
				return block;
			}

			function getTypeOptions(product) {
				return ['type1', 'type2', 'type3']
					.filter(function (key) { return product[key]; })
					.map(function (key) { return { key: key, label: product[key] }; });
			}

			function getCategoryOptions(product, typeKey) {
				var categoriesByType = {
					type1: ['cathegorie1', 'cathegorie2'],
					type2: ['cathegorie3', 'cathegorie4'],
					type3: ['cathegorie5', 'cathegorie6']
				};

				return (categoriesByType[typeKey] || [])
					.filter(function (key) { return product[key]; })
					.map(function (key) {
						return {
							key: key,
							label: product[key],
							questionKey: 'question' + key.replace('cathegorie', '')
						};
					});
			}

			function renderCalcInput(product, categoryOption) {
				var inputHolder = calcFields.querySelector('[data-calc-input-holder]');
				inputHolder.innerHTML = '';

				if (!categoryOption || !product[categoryOption.questionKey]) {
					return;
				}

				var label = document.createElement('label');
				label.className = 'yur-calc-field yur-calc-field--wide';

				var span = document.createElement('span');
				span.textContent = product[categoryOption.questionKey];

				var input = document.createElement('input');
				input.type = 'number';
				input.min = '0';
				input.step = '0.01';
				input.placeholder = 'Введите значение';
				input.setAttribute('data-calc-input', '');
				input.addEventListener('input', resetCalcResult);

				label.append(span, input);
				inputHolder.append(label);
			}

			function renderCategoryBlock(product, selectedType) {
				var categoryHolder = calcFields.querySelector('[data-category-holder]');
				categoryHolder.innerHTML = '';
				var categoryOptions = getCategoryOptions(product, selectedType);

				if (!categoryOptions.length) {
					renderCalcInput(product, null);
					return;
				}

				categoryHolder.append(createQuestionBlock(product.cathegorie1Title, categoryOptions, 'yur-calc-category'));
				renderCalcInput(product, categoryOptions[0]);

				categoryHolder.querySelectorAll('input[name="yur-calc-category"]').forEach(function (input) {
					input.addEventListener('change', function () {
						var selectedCategory = categoryOptions.find(function (option) { return option.key === input.value; });
						renderCalcInput(product, selectedCategory);
						resetCalcResult();
					});
				});
			}

			function renderCalculatorFields(product) {
				calcFields.innerHTML = '';
				resetCalcResult();

				if (!product) {
					calcFields.innerHTML = '<p class="yur-calc-message">Для выбранного препарата данные калькулятора не найдены.</p>';
					return;
				}

				var typeOptions = getTypeOptions(product);
				var categoryHolder = document.createElement('div');
				categoryHolder.className = 'yur-calc-dynamic-holder yur-calc-field--wide';
				categoryHolder.setAttribute('data-category-holder', '');

				var inputHolder = document.createElement('div');
				inputHolder.className = 'yur-calc-dynamic-holder yur-calc-field--wide';
				inputHolder.setAttribute('data-calc-input-holder', '');

				if (!typeOptions.length) {
					calcFields.innerHTML = '<p class="yur-calc-message">Для выбранного препарата не настроены варианты применения.</p>';
					return;
				}

				calcFields.append(createQuestionBlock(product.type1Title, typeOptions, 'yur-calc-type'), categoryHolder, inputHolder);
				renderCategoryBlock(product, typeOptions[0].key);

				calcFields.querySelectorAll('input[name="yur-calc-type"]').forEach(function (input) {
					input.addEventListener('change', function () {
						renderCategoryBlock(product, input.value);
						resetCalcResult();
					});
				});
			}

			function openCalculator(productName) {
				var calcProduct = getCalcProduct(productName);
				activeCalcProduct = calcProduct;
				activeProductName = productName;
				title.textContent = 'Калькулятор расхода препарата ' + productName;
				renderCalculatorFields(calcProduct);
				panel.classList.add('is-active');
				overlay.classList.add('is-active');
				panel.setAttribute('aria-hidden', 'false');
				document.body.style.overflow = 'hidden';
			}

			function closeCalculator() {
				panel.classList.remove('is-active');
				overlay.classList.remove('is-active');
				panel.setAttribute('aria-hidden', 'true');
				document.body.style.overflow = '';
			}

			submitButton.addEventListener('click', calculateProductAmount);

			document.querySelectorAll('.prod-yur-calc-box .btn, .fiz-calc-box .btn').forEach(function (button) {
				button.classList.add('yur-calc-open');
				button.setAttribute('type', 'button');
				button.addEventListener('click', function (event) {
					event.preventDefault();
					var card = button.closest('.prod-yur-item, .fiz-product-card, .single-fiz-product');
					var productTitle = card ? card.querySelector('.prod-yur-descr-box h5, .fiz-prod-title a, .my-title') : null;
					var pageTitle = document.querySelector('.my-title, .s-header-title h1, h1');
					var resolvedTitle = productTitle || pageTitle;
					openCalculator(resolvedTitle ? resolvedTitle.textContent.trim() : '');
				});
			});

			closeElements.forEach(function (element) {
				element.addEventListener('click', closeCalculator);
			});

			document.addEventListener('keydown', function (event) {
				if (event.key === 'Escape') {
					closeCalculator();
				}
			});
		});
	</script>

