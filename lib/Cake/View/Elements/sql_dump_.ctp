<?php
/**
 * SQL Dump element. Dumps out SQL log information
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Elements
 * @since         CakePHP(tm) v 1.3
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
define('TEMPO_MEDIO', 100);
define('TEMPO_LIMITE', 300);

if (!class_exists('ConnectionManager') || Configure::read('debug') < 2) {
	return false;
}
$noLogs = !isset($sqlLogs);
if ($noLogs):
	$sources = ConnectionManager::sourceList();

	$sqlLogs = array();
	foreach ($sources as $source):
		$db = ConnectionManager::getDataSource($source);
		if (!method_exists($db, 'getLog')):
			continue;
		endif;
		$sqlLogs[$source] = $db->getLog();
	endforeach;
endif;

if ($noLogs || isset($_forced_from_dbo_)):
	foreach ($sqlLogs as $source => $logInfo):
		$text = $logInfo['count'] > 1 ? 'queries' : 'query';
		printf(
			'<table class="table table-responsive cake-sql-log" id="cakeSqlLog_%s" summary="Cake SQL Log" cellspacing="0" border="1">',
			preg_replace('/[^A-Za-z0-9_]/', '_', uniqid(time(), true))
		);
		printf('<caption>(%s) %s %s took %s ms</caption>', $source, $logInfo['count'], $text, $logInfo['time']);
	?>
	<thead>
		<tr><th>#</th><th>&nbsp;Query</th><th>Err</th><th>Aff</th><th>Rows</th><th>Time</th></tr>
	</thead>
	<tbody>
	<?php
		foreach ($logInfo['log'] as $k => $i) :
			$i += array('error' => '');
			if (!empty($i['params']) && is_array($i['params'])) {
				$bindParam = $bindType = null;
				if (preg_match('/.+ :.+/', $i['query'])) {
					$bindType = true;
				}
				foreach ($i['params'] as $bindKey => $bindVal) {
					if ($bindType === true) {
						$bindParam .= h($bindKey) . " => " . h($bindVal) . ", ";
					} else {
						$bindParam .= h($bindVal) . ", ";
					}
				}
				$i['query'] .= " , params[ " . rtrim($bindParam, ', ') . " ]";
			}
			$sql = '<h6>' . $i['query'] . '</h6>';
			$sql = str_replace('FROM', '<br>FROM', $sql);
			$sql = str_replace('LEFT', '<br>LEFT', $sql);
			$sql = str_replace('WHERE', '<br>WHERE', $sql);
			$sql = str_replace('ORDER', '<br>ORDER', $sql);
			$sql = str_replace('`', '', $sql);

			printf('<tr class="%s"><td>%d</td><td>%s</td><td>%s</td><td style="text-align: right">%d</td><td style="text-align: right">%d</td><td style="text-align: right">%d</td></tr>%s',
				($i['took'] > TEMPO_LIMITE) ? 'danger' : (($i['took'] > TEMPO_MEDIO) ? 'warning' : '') ,
				$k + 1,
				$sql,
				$i['error'],
				$i['affected'],
				$i['numRows'],
				$i['took'],
				"\n"
			);
		endforeach;
	?>
	</tbody></table>
	<?php
	endforeach;
else:
	printf('<p>%s</p>', __d('cake_dev', 'Encountered unexpected %s. Cannot generate SQL log.', '$sqlLogs'));
endif;
