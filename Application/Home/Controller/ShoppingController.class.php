<?php
namespace Home\Controller;
use Think\Controller;
/**
 * Class SyController 自己写的所有带有权限控制的Controller均要继承此类
 * @package Home\Controller
 */
class ShoppingController extends BaseController {

	public function index(){
		$type = C("shopping");
		//先获取所有链接类别
		$category = D('Category');
		$linkType = $category->findAll($type);

		//获取已有超链接
		$link = D('Link');
		$i = 0;
		foreach($linkType as $k=>$v){
			$links[$i]['type'] = $v['name'];
			$links[$i]['content'] = $link->findByCategory($v['id']);
			$i++;
		}
		//获取推荐数超过5的网站,显示的时候加上 like 和 unlike 按钮
		$recommend = D('Recommend');
		$recommendWeb = $recommend->getShownableWeb();
		//把被推荐的网站放入到links中
		$j = 0;
		$temp = C('recommend');
		foreach($links as $k=>$v){
			if( $links[$j]['type'] == C('recommend')){
				$links[$j]['content'] = $recommendWeb;
				break;
			}
			$j++;
		}

		$this->recommendWeb = $recommendWeb;
		$this->linkType = $linkType;
		$this->links = $links;

		$this->display();
	}

}