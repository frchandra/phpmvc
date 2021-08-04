<?php

class About extends Controller {
	public function index($nama='name', $pekerjaan='job', $umur='age', $hobi='hobby'){
		$data['nama'] = $nama;
		$data['pekerjaan'] = $pekerjaan;
		$data['umur'] = $umur;
		$data['hobi'] = $hobi;
		$data['judul'] = 'About: index';
		$this->view('templates/header', $data);
		$this->view('About/index', $data);
		$this->view('templates/footer');
	}
	public function page(){
		$data['judul'] = 'About: Page';
		$this->view('templates/header',$data);
		$this->view('about/page');
		$this->view('templates/footer');
	}	
}

?>