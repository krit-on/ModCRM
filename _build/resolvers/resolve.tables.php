<?php

if ($object->xpdo) {
	/* @var modX $modx */
	$modx =& $object->xpdo;

	switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
			$modelPath = $modx->getOption('modcrm_core_path',null,$modx->getOption('core_path').'components/modcrm/').'model/';
			$modx->addPackage('modcrm', $modelPath);

			$manager = $modx->getManager();
			$objects = array(
				'crmClient',
				'crmComment',
				'crmEvent',
				'crmFile',
				'crmHistory',
				'crmObject',
			);
			foreach ($objects as $tmp) {
				$manager->createObjectContainer($tmp);
			}
			break;

		case xPDOTransport::ACTION_UPGRADE:
			break;

		case xPDOTransport::ACTION_UNINSTALL:
			break;
	}
}
return true;
