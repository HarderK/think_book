<?php
	class CommonAction extends Action{
		public function _initialize(){
			//初始时先检查权限
			if(!isset($_SESSION['name'])||$_SESSION['name']==''){
				$this->redirect('Login/login');
			}
		}
	}