<?php
/**
 * 无限极分类
 */
namespace Think;
class Tree{
	static public $treeList = array();//存放无限极分类结果
	
	public function create($data,$pid=0){
		foreach($data as $key=>$value){
			if($value['pid']==$pid){
				self::$treeList[] = $value;
				unset($data[$key]);
				self::create($data,$value['id']);
			}
		}
		return self::$treeList;
	}
}