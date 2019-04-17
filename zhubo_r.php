<?php
	$startNum=0;
	$endNum=199;
	$fixUrl='https://event.laifeng.com/event/209/ranking?rulesId=64&stageId=156&widgetId=184&divisionId=2276&start=';
	$url='';
	$str='';
	$arr=array();
	$zhubo_r=$_POST['zhubo_r'];
	for($i=0;$i<6;$i++){
		$url=$fixUrl.$startNum.'&end='.$endNum;
		$str=file_get_contents($url);
		$arr_json=json_decode($str,true);
		$arr_t=$arr_json['response']['data'];
		$arr=array_merge($arr,$arr_t);
		$startNum+=200;
		$endNum+=200;
	}
	$zhubo_arr=array();
	$zhubo_arr_status=0;
	for($i=0;$max=sizeof($arr),$i<$max;$i++){
		if($arr[$i]['r']==$zhubo_r){
			$zhubo_arr=$arr[$i];
			$zhubo_arr_status=1;
		}
	}

	$result=array(
		//输入数据
		'zhubo_r'=>$zhubo_r,
		//输出数据
		// 'arr'=>$arr,
		'zhubo_arr'=>$zhubo_arr,
		'zhubo_arr_status'=>$zhubo_arr_status
	);
	echo json_encode($result);
?>