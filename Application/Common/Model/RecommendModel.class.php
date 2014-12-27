<?php
namespace Common\Model;
use Think\Model;

/**
 * Class RecommandModel 推荐网站
 * @package Common\Model
 */
class RecommendModel extends Model {

	/**@author yj
	 * @description 定义自动验证
	 */
	protected $_validate    =   array(
		//array('name','require','书名是必须的！'),
	);

	/**@author yj
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

	//获取推荐数超过2的链接
	public function getShownableWeb(){
		$where['recommend_num'] = array('gt',2);
		$ShownableWeb = $this->where($where)->field('name,link')->select();
		return $ShownableWeb;
	}

}