<?php
$page['count_page'] = 25;
get_function('html_pages');
$smarty->assign('rand_name', mt_rand(0000000000, 9999999999));

if(!empty($Cur['id'])){
	$manager = $mysqli->query('SELECT * FROM bf_manager WHERE (id = \''.$Cur['id'].'\') LIMIT 1');
	if($Cur['id'] == $manager->id){
		$_POST['name'] = '';
		if(empty($manager->host)){
			if(count($links) > 0){
				}
				$_POST['name'] = rtrim($_POST['name'], "\n");
			}
		}else{
		}
	}
}

//$mysqli->query('SELECT * FROM bf_filters_unnecessary');

if(!empty($_POST['name'])){
	if(count($names) > 0){
        $sql = '';
		foreach($names as $name){
				$sql .= '(host LIKE \'%'.$name.'%\')';
			}
		}
		$unnecessary = $mysqli->query('SELECT * FROM bf_filters_unnecessary WHERE '.$sql.' ORDER by id ASC LIMIT ' . ($Cur['page'] == 0 ? 0 : $Cur['page']*$page['count_page']).','.$page['count_page'], null, null, false);
	    $count_items = $mysqli->query_name('SELECT COUNT(id) count FROM bf_unnecessary WHERE '.$sql);
	}else{
    	$count_items = $mysqli->query_name('SELECT COUNT(id) count FROM bf_unnecessary');
	}
}else{
    $count_items = $mysqli->query_name('SELECT COUNT(id) count FROM bf_filters_unnecessary');
}

$smarty->assign('unnecessary', $unnecessary);
$smarty->assign('count_items', $count_items);
$smarty->assign('pages', html_pages('/filters/unnecessary'.(!empty($Cur['id']) ? '-'.$Cur['id'] : '').'.html?window=1&', $count_items, $page['count_page'], 1, 'load_data_unnecessary', 'this.href'));

?>