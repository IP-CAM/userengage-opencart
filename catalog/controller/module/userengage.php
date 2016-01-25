<?php

class ControllerModuleUserengage extends Controller {

	public function index() {

		$data[] = $this->config->get('userengage_apikey');

		if($this->config->get('userengage_status') == 'Yes'){

			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/userengage.tpl')) {
				return $this->load->view($this->config->get('config_template') . '/template/module/userengage.tpl', $data);
			} else {
				return $this->load->view('default/template/module/userengage.tpl');
			}
		}
	}
}
