<?php
namespace Home\Controller;
use Think\Model;

class IndexController extends BaseController {
	//分别获取链接类别和链接，拼接在一起供前端显示
	public function index(){
		//先获取所有链接类别
		$category = D('Category');
		$linkType = $category->findAll();

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

	//添加推荐的网站
	public function addRecommandedWeb(){
		$recommand = D('Recommend');
		if($recommand->create()){
			$result = $recommand->add();
			if($result){
				echo '<script>';
				echo 'alert("谢谢你的推荐！我们会尽快审核~")';
				echo '</script>';
			}else{
				echo '<script>';
				echo 'alert("数据提交失败，请重新提交~")';
				echo '</script>';
			}
		}
	}
}