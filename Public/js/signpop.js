/**
 * Created by dingwei on 14-12-7.
 */
define(function (){

	return {
		init: function (){
			var signHtml = '\
			<div class="sign">\
			    <div class="sign-mask"></div>\
			    <div class="container">\
			        <a href="#" class="close-link signclose-loader"><i class="fa fa-close"></i></a>\
			        <div class="sign-tips"></div>\
			        <form id="sign-in">  \
			            <h3><small class="signup-loader">鍒囨崲娉ㄥ唽</small>鐧诲綍</h3>\
			            <h6>\
			                <label for="inputEmail">閭</label>\
			                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="鐧诲綍閭">\
			            </h6>\
			            <h6>\
			                <label for="inputPassword">瀵嗙爜</label>\
			                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="鐧诲綍瀵嗙爜">\
			            </h6>\
			            <div class="sign-submit">\
			                <input type="button" class="btn btn-primary signsubmit-loader" name="submit" value="鐧诲綍">  \
			                <input type="hidden" name="action" value="signin">\
			                <label><input type="checkbox" checked="checked" name="remember" value="forever">璁颁綇鎴�</label>\
			            </div>\
			            <div class="sign-info"><a href="http://www.daqianduan.com/u/rp">鎵惧洖瀵嗙爜锛�</a></div>\
			        </form>\
			        <form id="sign-up"> \
			            <h3><small class="signin-loader">鍒囨崲鐧诲綍</small>娉ㄥ唽</h3>\
			            <h6>\
			                <label for="inputName">鏄电О</label>\
			                <input type="text" name="name" class="form-control" id="inputName" placeholder="璁剧疆鏄电О">\
			            </h6>\
			            <h6>\
			                <label for="inputEmail">閭</label>\
			                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="閭">\
			            </h6>\
			            <h6>\
			                <label for="inputPassword">瀵嗙爜</label>\
			                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="璁剧疆鐧诲綍瀵嗙爜">\
			            </h6>\
			            <div class="sign-submit">\
			                <input type="button" class="btn btn-primary btn-block signsubmit-loader" name="submit" value="蹇€熸敞鍐�">  \
			                <input type="hidden" name="action" value="signup">  \
			            </div>\
			        </form>\
			    </div>\
			</div>\
		'

			jsui.bd.append( signHtml )

			if( $('#issignshow').length ){
				jsui.bd.addClass('sign-show')
				$('.close-link').hide()
				$('#sign-in').show().find('input:first').focus()
				$('#sign-up').hide()
			}


			$('.signin-loader').on('click', function(){
				jsui.bd.addClass('sign-show')
				$('#sign-in').show().find('input:first').focus()
				$('#sign-up').hide()
			})

			$('.signup-loader').on('click', function(){
				jsui.bd.addClass('sign-show')
				$('#sign-up').show().find('input:first').focus()
				$('#sign-in').hide()
			})

			$('.signclose-loader').on('click', function(){
				jsui.bd.removeClass('sign-show')
			})

			$('.signsubmit-loader').on('click', function(){
				if( jsui.is_signin ) return

				var form = $(this).parent().parent()
				var inputs = form.serializeObject()
				var isreg = (inputs.action == 'signup') ? true : false

				if( !inputs.action ){
					return
				}

				if( !is_mail(inputs.email) ){
					logtips('閭鏍煎紡閿欒')
					return
				}

				if( inputs.password.length < 6 ){
					logtips('瀵嗙爜澶煭锛岃嚦灏�6浣�')
					return
				}

				if( isreg ){
					if( !is_name(inputs.name) ){
						logtips('鏄电О闄愬埗鍦�3-20瀛�')
						return
					}
				}

				$.ajax({
					type: "POST",
					url:  jsui.uri+'/action/log.php',
					data: inputs,
					dataType: 'json',
					success: function(data){
						console.log( data )
						if( data.error ){
							if( data.msg ){
								logtips(data.msg)
							}
							return
						}

						if( !isreg ){
							location.reload()
						}else{
							if( data.goto ) location.href = data.goto
						}
					}
				});
			})

			var _loginTipstimer
			function logtips(str){
				if( !str ) return false
				_loginTipstimer && clearTimeout(_loginTipstimer)
				$('.sign-tips').html(str).animate({
					height: 29
				}, 220)
				_loginTipstimer = setTimeout(function(){
					$('.sign-tips').animate({
						height: 0
					}, 220)
				}, 5000)
			}

		}
	}

})