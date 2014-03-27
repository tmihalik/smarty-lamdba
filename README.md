smarty-lamdba
=============

Using:
------


```php
$Smarty = new Smarty;

$Smarty->registerFilter(Smarty::FILTER_POST, 'lambdavars');

$Smarty->assign(array(

	// Var is always filled, even if it's not used in template
	'SIMPLE_VAR' => loadBigData(),

	// Var is filled only when it's really used in template
	'LAMBDA_VAR' => function() { return loadBigData(); },
));
```
