<?php
namespace Common\Model;
use Think\Model;

/**
 * Class CommentModel 用户模型
 * @package Common\Model
 */
class LinkModel extends Model {

	/**@author lxd
	 * @description 定义自动验证
	 */
	protected $_validate    =   array(
		//array('name','require','书名是必须的！'),
	);

	/**@author lxd
	 * @description 定义自动完成
	 */
	protected $_auto = array(
		//status默认为0
		//array('status','ON_ROAD'),
		//valid默认为0
		//array('valid','0'),
		//创建时间使用当前时间戳
		array('establish_time','time',1,'function'),
	);

	/**@author lxd
	 * @description 根据 category 查找 Link 字段
	 * @param $category
	 * @return mixed
	 */
	public function findByCategory($category){
		$where['category'] = $category;
		$res=$this->where($where)->field('name,link,color')->select();
		return $res;
	}

}