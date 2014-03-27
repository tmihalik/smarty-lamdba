<?php
/**
 * Assign lambda function to template variable
 */

function lambdavars($content, Smarty_Internal_Template $smarty) {

	$vars = array_keys((array) $smarty->properties['variables']);

	foreach ($vars as $var) {

		if (array_key_exists($var, $smarty->tpl_vars)) {

			if ($smarty->tpl_vars[$var]->value instanceof Closure) {

				$smarty->tpl_vars[$var]->value = $smarty->tpl_vars[$var]->value->__invoke();
			}
		}
	}

	return $content;
}

// Using:

$Smarty = new Smarty;

$Smarty->registerFilter(Smarty::FILTER_POST, 'lambdavars');

$Smarty->assign(array(

	// Var is always filled, even if it's not used in template
	'SIMPLE_VAR' => loadBigData(),

	// Var is filled only when it's really used in template
	'LAMBDA_VAR' => function() { return loadBigData(); },
));