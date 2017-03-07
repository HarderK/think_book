<?php
	class PublicAction extends Action{
		public function code(){//设置验证码格式
			$width=isset($_GET['width'])?$_GET['width']:60;
			$height=isset($_GET['height'])?$_GET['height']:30;
			 import('ORG.Util.Image');
			 Image::buildImageVerify(4,1,'png',$width,$height,'code');
		}
	}
?>