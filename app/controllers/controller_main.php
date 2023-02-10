<?php
class Controller_Main extends Controller
{
    function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
	}

	function action_index()
	{	
		$this->view->generate('main_view.php', 'template_view.php');
	}

    function action_select()
	{	
		$this->view->generate('select_view.php', 'template_view.php');
	}

	function action_result()
	{	
		if (isset($_POST["categories-sended"])) {
			// get a request data
			session_start();
		
			for ($i = 1; $i <= 8; $i++) {
				if(isset($_POST["cat$i"])){
					$_SESSION["cat$i"] = $_POST["cat$i"];
				} else {
					$_SESSION["cat$i"] = 0;
				}
			}
		}

        $data = $this->model->get_result();
		$this->view->generate('result_view.php', 'fake_template_view.php', $data);
	}

	function action_favorites()
	{	
        $data = $this->model->get_favorites();
		$this->view->generate('favorites_view.php', 'fake_template_view.php', $data);
	}
}
?>