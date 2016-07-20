<?php

	class UserController extends Controller
	{
		public function index()
		{
			echo "我是用户";
			$model = new Model('user');
			$list = $model->select();
			
			$this->assign('list',$list);
			$this->assign('title','用戶列表');
			$this->display('User/index.html');
		}
		public function add()
		{
			
			// $this->assign('list',$id);
			$this->assign('title','添加用戶');
			$this->display('User/add.html');
		}
		public function insert()
		{
			$model = new Model('user');
			$id = $model->add($_POST);
			if ($id) {
				echo "<script>alert('添加成功');
				location.href = './index.php?m=User&a=index'
				</script>";
			} else {
				echo "<script>alert('添加失敗')</script>";
			}
			
		}
		public function delete()
		{
			// echo "刪除";
			// print_r($_GET);
			$model=new Model('user');
			$res = $model->del($_GET['id']);
			if ($res) {
				echo "<script>alert('刪除成功');
				location.href = './index.php?m=User&a=index'
				</script>";
			} else {
				echo "<script>alert('刪除失敗');
				location.href = './index.php?m=User&a=index'
				</script>";
			}
			
		}
		public function edit()
		{
			$model = new Model('user');

			$list = $model->find($_GET['id']);
			// print_r($list);
			$this->assign('list',$list);
			$this->assign('title','編輯用戶');
			$this->assign('id',$_GET['id']);
			$this->display('User/edit.html');

		}
		public function update()
		{
			// print_r($_POST);
			$model = new Model('user');
			$res = $model->update($_POST);
			if ($res) {
				echo "<script>alert('編輯成功');
				location.href = './index.php?m=User&a=index'
				</script>";
			} else {
				echo "<script>alert('編輯失敗');
				location.href = './index.php?m=User&a=index'
				</script>";
			}
		}
	}