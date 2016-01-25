<?php

class ControllerModuleUserengage extends Controller {

	private $error = array();

	public function index() {

		$this->load->language('module/userengage');

		$this->document->setTitle($this->language->get('heading_module_edit'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {

			$this->model_setting_setting->editSetting('userengage', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));

		}

		$data['heading_title'] = $this->language->get('heading_title');
		$data['heading_title_m'] = $this->language->get('heading_title_m');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enable_no'] = $this->language->get('text_enable_no');
		$data['text_enable_yes'] = $this->language->get('text_enable_yes');

		$data['entry_userengage_apikey'] = $this->language->get('entry_userengage_apikey');
		$data['entry_userengage_key'] = $this->language->get('entry_userengage_key');
		$data['entry_test'] = $this->language->get('entry_test');

		$data['error_permission'] = $this->language->get('error_permission');
		$data['error_userengage_apikey'] = $this->language->get('error_userengage_apikey');
		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');


 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['userengage_apikey'])) {
			$data['error_userengage_apikey'] = $this->error['userengage_apikey'];
		} else {
			$data['error_userengage_apikey'] = '';
		}


		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text'	=> $this->language->get('text_home'),
			'href'	=> $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text'	=> $this->language->get('text_module'),
			'href'	=> $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text'	=> $this->language->get('heading_title_m'),
			'href'	=> $this->url->link('module/userengage', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['action'] = $this->url->link('module/userengage', 'token=' . $this->session->data['token'], 'SSL');

		$data['cancel'] = $this->url->link('module/userengage', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->request->post['userengage_apikey'])) {
			$data['userengage_apikey'] = $this->request->post['userengage_apikey'];
		} else {
			$data['userengage_apikey'] = $this->config->get('userengage_apikey');
		}

		if (isset($this->request->post['userengage_status'])) {
			$data['userengage_status'] = $this->request->post['userengage_status'];
		} else {
			$data['userengage_status'] = $this->config->get('userengage_status');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('module/userengage.tpl', $data));

	}

	private function validate() {

		if (!$this->user->hasPermission('modify', 'module/userengage')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['userengage_apikey']) {
			$this->error['userengage_apikey'] = $this->language->get('error_userengage_apikey');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}

	}

}
?>
