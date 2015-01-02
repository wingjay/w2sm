/**
 * Created by dingwei on 14-12-31.
 */
function scrollWebPaging(body,max,wait,url){ //DW
	var cur=2,wait=$(wait);
	if(cur>max){
		wait.hide();
		return;
	}
	var body=$(body), ls='';
	if(location.search!=''){
		ls=location.search+'&';
	}else{
		ls='?';
	}
	var height=body.height(),load=false,wh=$(window).height();
	if(height<=wh){
		_get();
	}
	function _get(){
		load=true;
		wait.show();
		$.get(url+ls+'page='+cur,function(a){
			body.append(a);
			cur++;
			height=body.height();
			if(cur>max){
				if(height>=wh){
					/*                  wait.click(function(){
					 $('html,body').animate({
					 scrollTop : '0px'
					 }, 500);
					 });*/
					wait.hide().css({'backgroundImage':'none'}).text('没有了');
					return;
				}else{
					wait.hide();
				}
			}
			load=false;
		})
	}
	$(window).scroll(function(){
		if(cur>max || load) return;
		var ds=$(document).scrollTop();
		if(ds>=height-wh)
		{
			_get();
		}
	});
}
function fixedright(width){
	return ($(window).width()-width)/2;
}
$.fn.dw_autoM=function(){
	var flo=this.css('float');
	this.css('float','left');
	var pwidth=this.parent().width(),width=this.width();
	this.css({'margin-left':(pwidth-width)/2,'float':flo});
	//this.css('float','none');
	return this;
}
$.fn.dw_autoH=function(){
	var pheight=this.parent().height(),height=this.height();
	this.css('margin-top',(pheight-height)/2);
	return this;
}
$.fn.dw_cross=function(){
	return this.dw_autoH().dw_autoM();
}
function dw_timeU(v){
	if(isNaN(v)){
		//alert(v);
		v=v.split(' ');
		var ymd=v[0].split('-');
		date=new Date();
		date.setFullYear(ymd[0],ymd[1]-1,ymd[2]);
		return date.getTime();
	}else{
		return v;
	}
}
function isEmpty(str){
	var whitespace = " \t\n\r";  var i;
	if((str == null) || (str.length == 0))   return true;
	for(i = 0; i < str.length; i++){
		var c = str.charAt(i);
		if(whitespace.indexOf(c) == -1)    return false;
	}
	return true;
}
function isphone(s)
{
	var patrn=/((\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$)/;
	if (!patrn.exec(s)) return false
	return true;
}