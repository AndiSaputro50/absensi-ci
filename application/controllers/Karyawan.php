<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
		
	}

	

	public function dashboard()
	{
		$data['absensi'] = $this->m_model->get_data('absensi')->result();
		$data['admin'] = $this->m_model->get_data('admin')->num_rows();
		$data['data'] = $this->m_model->get_data('absensi')->num_rows();
		$this->load->view('karyawan/dashboard', $data);
	}

	public function izin()
	{
		$data['izin'] = $this->m_model->get_data('absensi')->result();
		$this->load->view('karyawan/izin', $data);
	}

	public function absensi()
	{
		$data['absensi'] = $this->m_model->get_data('absensi')->result();
		$this->load->view('karyawan/absensi', $data);
	}

	public function aksi_absensi()
	{        
    date_default_timezone_set('Asia/Jakarta');
    $waktu_sekarang = date('Y-m-d H:i:s');
    $id_karyawan = $this->session->userdata('id');
    $tanggal_absensi = date('Y-m-d');

    // Cek apakah karyawan sudah pulang
    $absensi_terakhir = $this->m_model->getlast('absensi', array(
        'id_karyawan' => $id_karyawan
    ));

    // Mengecek apakah tanggal terakhir absensi sudah berbeda
    if ($absensi_terakhir && $absensi_terakhir->date !== $tanggal_absensi) {
        $absensi_terakhir = null; // Atur $absensi_terakhir menjadi null jika tanggal berbeda
    }

    if ($absensi_terakhir && $absensi_terakhir->jam_keluar === null) {
        // Karyawan belum pulang, tidak dapat melakukan absensi tambahan
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Anda tidak dapat melakukan absensi tambahan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect(base_url('karyawan/absensi'));
    	} else {
        // Karyawan sudah pulang atau belum ada catatan absensi
        $data = [
            'id_karyawan' => $id_karyawan,
            'kegiatan' => $this->input->post('kegiatan'),
            'jam_pulang' => null,
            'jam_masuk' => $waktu_sekarang, 
            'date' => $tanggal_absensi,  
            'keterangan_izin' => '-',
            'status' => 'not'
        ];

        $this->m_model->tambah_data('absensi', $data);
        redirect(base_url('karyawan/history'));
    	}
	}

	public function aksi_izin()
	{        
    date_default_timezone_set('Asia/Jakarta');
    $waktu_sekarang = date('Y-m-d H:i:s');
    $id_karyawan = $this->session->userdata('id');
    $tanggal_izin = date('Y-m-d');

    // Cek apakah karyawan sudah pulang
    $izin_terakhir = $this->m_model->get('absensi', array(
        'id_karyawan' => $id_karyawan
    ));

    // Mengecek apakah tanggal terakhir absensi sudah berbeda
    if ($izin_terakhir && $izin_terakhir->date !== $tanggal_izin) {
        $izin_terakhir = null; // Atur $izin_terakhir menjadi null jika tanggal berbeda
    }

    if ($izin_terakhir && $izin_terakhir->jam_keluar === null) {
        // Karyawan belum pulang, tidak dapat melakukan absensi tambahan
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Anda tidak dapat melakukan absensi tambahan
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect(base_url('karyawan/history'));
    	} else {
        // Karyawan sudah pulang atau belum ada catatan absensi
        $data = [
            'id_karyawan' => $id_karyawan,
            'kegiatan' => '-',
            'jam_pulang' => null,
            'jam_masuk' => null, 
            'date' => $tanggal_izin,  
            'keterangan_izin' => $this->input->post('izin'),
            'status' => 'not'
        ];

        $this->m_model->tambah_data('absensi', $data);
        redirect(base_url('karyawan/history'));
    	}
	}

	public function profil()
	{
		$data['user'] = $this->m_model->get_by_id('admin', 'id', $this->session->userdata('id'))->result();
		$this->load->view('karyawan/profil', $data);
	}

	public function upload_img($value)
	{
		$kode = round(microtime(true) * 1000);
		$config['upload_path'] = '../../image/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '30000';
		$config['file_name'] = $kode;
		
		$this->load->library('upload', $config); // Load library 'upload' with config
		
		if (!$this->upload->do_upload($value)) {
			return array(false, '');
		} else {
			$fn = $this->upload->data();
			$nama = $fn['file_name'];
			return array(true, $nama);
		}
	}
	public function aksi_update_profile()
	{
		$image = $_FILES['image']['name'];
		$image_temp = $_FILES['image']['tmp_name'];
		$username = $this->input->post('username');
		$nama_depan = $this->input->post('nama_depan');
		$nama_belakang = $this->input->post('nama_belakang');
		$image = $this->upload_img('image');
		// Jika ada foto yang diunggah
		if ($image) {
			$kode = round(microtime(true) * 900);
			$file_name = $kode . '_' . $image;
			$upload_path = './image/' . $file_name;
	
			if (move_uploaded_file($image_temp, $upload_path)) {
				// Hapus foto lama jika ada
				$old_file = $this->m_model->get_foto_by_id($this->input->post('id'));
				if ($old_file && file_exists('./image/' . $old_file)) {
					unlink(' ./image/' . $old_file);
				}
	
				$data = [
					'image' => $file_name,
					// 'email' => $email,
					'username' => $username,
					'nama_depan' => $nama_depan,
					'nama_belakang' => $nama_belakang,
				];
			} else {
				// Gagal mengunggah foto baru
				redirect(base_url('karyawan/dashboard'));
			}
		} else {
			// Jika tidak ada foto yang diunggah
			$data = [
				// 'email' => $email,
				'username' => $username,
				'nama_depan' => $nama_depan,
				'nama_belakang' => $nama_belakang,
			];
		}
	
		// Eksekusi dengan model ubah_data
		$update_result = $this->m_model->ubah_data('admin', $data, array('id' => $this->session->userdata('id')));
	
		if ($update_result) {
			$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
		 Berhasil Merubah Profile
				   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			   </div>');
			redirect(base_url('karyawan/profil'));
		} else {
			redirect(base_url('karyawan/dashboard'));
		}
	}
	public function hapus_image()
	{ 
    $data = array(
        'image' => NULL
    );

    $eksekusi = $this->m_model->ubah_data('admin', $data, array('id'=>$this->session->userdata('id')));
    if($eksekusi) {
        $this->session->set_flashdata('sukses' , 'berhasil');
        redirect(base_url('karyawan/profil'));
    } else {
        $this->session->set_flashdata('error' , 'gagal...');
        redirect(base_url('karyawan/dashboard'));
    }
	}

	

	public function aksi_ubah_pw()
    {
    
        $password_baru = $this->input->post('password_baru');
        $konfirmasi_password = $this->input->post('konfirmasi_password');
        
     
       
               if (!empty($password_baru) && strlen($password_baru) >= 8) {
                   
                       $data['password'] = md5($password_baru);
                   
              
               $this->session->set_userdata($data);

               $update_result = $this->m_model->ubah_data('admin', $data, array('id' => $this->session->userdata('id')));
               $this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible fade show" role="alert">
               Berhasil Merubah Password
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>');
               redirect(base_url('karyawan/profil'));
             } else {
                $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Password anda kurang dari 8 Angka
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                  redirect(base_url('karyawan/profil'));
              }
     
   
           
    }


// history
	public function history()
	{
		$data['absensi'] = $this->m_model->get_data('absensi')->result();
		$this->load->view('karyawan/history', $data);
	}
// hapus history
	public function hapus_karyawan($id)
	{
    $this->m_model->delete('absensi', 'id', $id);
    redirect(base_url('karyawan/history'));
	}

	public function pulang($id)
{
    date_default_timezone_set('Asia/Jakarta');
    $waktu_sekarang = date('Y-m-d H:i:s');
    $data = [
        'jam_pulang' => $waktu_sekarang,
        'status' => 'done'
    ];
    $this->m_model->ubah_data('absensi', $data, array('id'=> $id));
    redirect(base_url('karyawan/history'));
}

	// public function hapus_dashboard($id)
	// {
	// 	$this->m_model->delete_db('dashboard', 'id', $id);
	// 	redirect(base_url('karyawan/dashboard'));
	// }
}
?>