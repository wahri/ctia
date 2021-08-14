<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = "Pendaftaran";
        $this->load->view('templates/main_header', $data);
        $this->load->view('form/index');
        $this->load->view('templates/main_footer');
    }
    public function pemakalah()
    {
        $data['topik'] = [
            'Expert System',
            'Image & Signal Processing',
            'Natural Language Processing',
            'Machine Learning',
            'Big Data',
            'Internet of Things (IoT)',
            'Digital Forensic',
            'IT for Education',
            'Data Mining',
            'Cryptography',
            'Computer Network and Communication',
            'E-Government',
            'E-Learning',
            'Information System and Technology',
            'Multimedia'
        ];
        $data['error'] = '';
        $data['judul'] = "Form Pendaftaran";
        $this->load->view('templates/main_header', $data);
        $this->load->view('form/daftar_pemakalah', $data);
        $this->load->view('templates/main_footer');
    }
    private function _kirimEmailPemakalah($email)
    {
        // $config = [
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_user' => 'ctia@umri.ac.id',
        //     'smtp_pass' => '>HNyX94K',
        //     'smtp_port' => 465,
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'newline' => "\r\n"
        // ];

        // $this->load->library('email', $config);

        $this->load->config('email');
        $this->load->library('email');

        $from = $this->config->item('smtp_user');

        $this->email->from($from, 'Panitia Seminar Nasional CTiA');
        $this->email->to($email);
        $this->email->subject('Pendaftaran Seminar Nasional CTiA');
        // $this->email->message('<p>Terima kasih telah mengunggah makalah anda ke <b>Seminar Nasional Computation Technology and it’s Application(CTiA)</b> yang diserenggarakan oleh Fakultas Ilmu Komputer Universitas Muhammadiyah Riau.</p><h3>Untuk langkah selanjutnya, silahkan membuat submission pada link berikut <a href="https://ejurnal.umri.ac.id/index.php/CTIA/about/submissions" target="_blank">Make a submission</a></h3><p>Jika anda memiliki pertanyaan, silahkan menghubungi kami. Terima kasih atas partisipasi Anda mengenai konferensi ini.</p>');
        $this->email->message('<h2>Assalamualaikum Warahmatullahi Wabarakatuh</h2><p>Salam sejahtera untuk kita semua.<br>Terima kasih atas kesediaan Bapak/Ibu/Saudara atas partisipasinya pada kegiatan:</p><h3>"2nd Seminar Nasional CTiA Fakultas Ilmu Komputer Universitas Muhammadiyah Riau Tahun 2021"</h3><p>Tema:</p><h3>"Peran Teknologi Informasi Dan Kecerdasan Buatan Pada Penanganan Pandemi Covid-19."</h3><p>Narasumber:<ol>    <li>Prof. Dr. Eng. Kuwat Triyana, M.Si. (Ketua Tim Peneliti GeNose Universitas Gadjah Mada)</li>    <li>Dr. Ketut Eddy Purnama, ST., MT. (Ketua Tim Peneliti Robot RAISA, Institut Teknologi Sepuluh Nopember)</li>    <li>Semuel Abrijani Pangerapan, B.Sc (Direktur Jenderal Aplikasi Informatika, Kominfo RI)</li>    <li>Dr. H. Mubarak, M.Si (Rektor Universitas Muhammadiyah Riau)</li></ol></p><p><b>Waktu Pelaksanaan: </b>Kamis/ 11 Oktober 2021</p><p>    <b>Pukul:</b> 08.00 WIB s.d selesai</p><p>    <b>Platform:</b> Zoom Meeting</p><h3>Untuk langkah selanjutnya, silahkan membuat submission pada link berikut <a href="https://ejurnal.umri.ac.id/index.php/CTIA/about/submissions" target="_blank">Make a submission</a></h3><p>Demikian undangan ini disampaikan, atas perhatian Bpk/Ibu/Sdr. diucapkan terima kasih.</p><p>Note:</p><ol>    <li>Mohon peserta untuk Join mulai jam 07.30 WIB untuk menjaga ketertiban acara.</li>    <li>Link zoom meeting akan dikirim kemudian.</li></ol>');
        $this->email->send();
    }
    private function _kirimEmailNonPemakalah($email)
    {
        // $config = [
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_user' => 'ctia@umri.ac.id',
        //     'smtp_pass' => '>HNyX94K',
        //     'smtp_port' => 465,
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'newline' => "\r\n"
        // ];

        // $this->load->library('email', $config);

        $this->load->config('email');
        $this->load->library('email');

        $from = $this->config->item('smtp_user');

        $this->email->from($from, 'Panitia Seminar Nasional CTiA');
        $this->email->to($email);
        $this->email->subject('Pendaftaran Seminar Nasional CTiA');
        // $this->email->message(`<h3>Assalamu'alaikum W.W.<br />Salam sejahtera untuk kita semua.</h3><p>Terima kasih atas kesediaan Bapak/Ibu/Saudara atas partisipasinya pada kegiatan:</p><br><q>2nd Seminar Nasional CTiA Fakultas Ilmu Komputer Universitas Muhammadiyah Riau Tahun 2021</q><p>Tema:</p><br><q>Peran Teknologi Informasi Dan Kecerdasan Buatan Pada Penanganan Pandemi Covid-19.</q><p>Narasumber:</p><ol>    <li>Prof. Dr. Eng. Kuwat Triyana, M.Si. (Ketua Tim Peneliti GeNose Universitas Gadjah Mada)</li>    <li>Dr. Ketut Eddy Purnama, ST., MT. (Ketua Tim Peneliti Robot RAISA, Institut Teknologi Sepuluh November)</li>    <li>Semuel Abrijani Pangerapan, B.Sc (Direktur Jenderal Aplikasi Informatika, Kominfo RI)</li>    <li>Dr. H. Mubarak, M.Si (Rektor Universitas Muhammadiyah Riau)</li></ol><p>    Waktu Pelaksanaan: Kamis/ 11 Oktober 2021</p><p>    Pukul: 08.00 WIB s.d selesai</p><p>    Platform: Zoom Meeting</p><p>Demikian undangan ini disampaikan, atas perhatian Bpk/Ibu/Sdr. diucapkan terima kasih.</p><p>Note:</p><ol>    <li>Mohon peserta untuk Join mulai jam 07.30 WIB untuk menjaga ketertiban acara.</li>    <li>Link zoom meeting akan dikirim kemudian.</li></ol>`);
        $this->email->message('<h2>Assalamualaikum Warahmatullahi Wabarakatuh</h2><p>Salam sejahtera untuk kita semua.<br>Terima kasih atas kesediaan Bapak/Ibu/Saudara atas partisipasinya pada kegiatan:</p><h3>"2nd Seminar Nasional CTiA Fakultas Ilmu Komputer Universitas Muhammadiyah Riau Tahun 2021"</h3><p>Tema:</p><h3>"Peran Teknologi Informasi Dan Kecerdasan Buatan Pada Penanganan Pandemi Covid-19."</h3><p>Narasumber:<ol>    <li>Prof. Dr. Eng. Kuwat Triyana, M.Si. (Ketua Tim Peneliti GeNose Universitas Gadjah Mada)</li>    <li>Dr. Ketut Eddy Purnama, ST., MT. (Ketua Tim Peneliti Robot RAISA, Institut Teknologi Sepuluh Nopember)</li>    <li>Semuel Abrijani Pangerapan, B.Sc (Direktur Jenderal Aplikasi Informatika, Kominfo RI)</li>    <li>Dr. H. Mubarak, M.Si (Rektor Universitas Muhammadiyah Riau)</li></ol></p><p><b>Waktu Pelaksanaan: </b>Kamis/ 11 Oktober 2021</p><p>    <b>Pukul:</b> 08.00 WIB s.d selesai</p><p>    <b>Platform:</b> Zoom Meeting</p><p>Demikian undangan ini disampaikan, atas perhatian Bpk/Ibu/Sdr. diucapkan terima kasih.</p><p>Note:</p><ol>    <li>Mohon peserta untuk Join mulai jam 07.30 WIB untuk menjaga ketertiban acara.</li>    <li>Link zoom meeting akan dikirim kemudian.</li></ol>');
        $this->email->send();
    }
    public function upload_pemakalah()
    {
        // $config['upload_path'] = './uploads/pemakalah/files/';
        // $config['allowed_types'] = 'doc|docx|odt';
        // $config['max_size'] = '100000';
        // $config['file_name'] = 'File' . $this->input->post('nomor');

        // $this->load->library('upload', $config, 'uploadPemakalah');
        // $this->uploadPemakalah->initialize($config);

        $config['upload_path'] = './uploads/pemakalah/bukti/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|';
        $config['max_size'] = '100000';
        $config['file_name'] = 'Bukti ' . $this->input->post('nomor');

        $this->load->library('upload', $config, 'uploadBuktiPemakalah');
        $this->uploadBuktiPemakalah->initialize($config);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('instituisi', 'Instituisi', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('topik', 'Topik', 'required|trim');

        if ($this->form_validation->run()) {
            if ($this->uploadBuktiPemakalah->do_upload('bukti')) {
                $data = [
                    'nama' => $this->input->post('nama', true),
                    'instituisi' => $this->input->post('instituisi', true),
                    'co-author' => $this->input->post('co-author', true),
                    'email' => $this->input->post('email', true),
                    'nomor' => $this->input->post('nomor', true),
                    'alamat' => $this->input->post('alamat', true),
                    'status' => $this->input->post('status', true),
                    'judul' => $this->input->post('judul', true),
                    'topik' => $this->input->post('topik', true),
                    // 'file' => $this->uploadPemakalah->data('file_name'),
                    'bukti' => $this->uploadBuktiPemakalah->data('file_name'),
                    'tanggal' => time()
                ];
                $this->db->insert('daftar_pemakalah', $data);
                $this->_kirimEmailPemakalah($this->input->post('email'));
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran berhasil! <b>Silahkan submit naskah melalui link notifikasi yang dikirimkan ke email terdaftar.</b></div>');
                redirect('daftar/pemakalah');
            } else {
                $data['topik'] = [
                    'Expert System',
                    'Image & Signal Processing',
                    'Natural Language Processing',
                    'Machine Learning',
                    'Big Data',
                    'Internet of Things (IoT)',
                    'Digital Forensic',
                    'IT for Education',
                    'Data Mining',
                    'Cryptography',
                    'Computer Network and Communication',
                    'E-Government',
                    'E-Learning',
                    'Information System and Technology',
                    'Multimedia'
                ];
                // $data['error'] = $this->uploadPemakalah->display_errors();
                $this->session->set_flashdata('message_error', '<div class="alert alert-danger" role="alert">Pendaftaran tidak berhasil, <b>Silahkan cek ulang data anda.</b></div>');
                $data['error'] = $this->uploadBuktiPemakalah->display_errors();
                $data['judul'] = "Form Pendaftaran";
                $this->load->view('templates/main_header', $data);
                $this->load->view('form/daftar_pemakalah', $data);
                $this->load->view('templates/main_footer');
            }
        } else {
            $data['topik'] = [
                'Expert System',
                'Image & Signal Processing',
                'Natural Language Processing',
                'Machine Learning',
                'Big Data',
                'Internet of Things (IoT)',
                'Digital Forensic',
                'IT for Education',
                'Data Mining',
                'Cryptography',
                'Computer Network and Communication',
                'E-Government',
                'E-Learning',
                'Information System and Technology',
                'Multimedia'
            ];
            // $data['error'] = $this->uploadPemakalah->display_errors();
            $data['error'] = $this->uploadBuktiPemakalah->display_errors();
            $this->session->set_flashdata('message_error', '<div class="alert alert-danger" role="alert">Pendaftaran tidak berhasil, <b>Silahkan cek ulang data anda.</b></div>');
            $data['judul'] = "Form Pendaftaran";
            $this->load->view('templates/main_header', $data);
            $this->load->view('form/daftar_pemakalah', $data);
            $this->load->view('templates/main_footer');
        }
        // if ($this->form_validation->run()) {
        //     if ($this->uploadPemakalah->do_upload('file')) {
        //         if ($this->uploadBuktiPemakalah->do_upload('bukti')) {
        //             $data = [
        //                 'nama' => $this->input->post('nama', true),
        //                 'instituisi' => $this->input->post('instituisi', true),
        //                 'co-author' => $this->input->post('co-author', true),
        //                 'email' => $this->input->post('email', true),
        //                 'nomor' => $this->input->post('nomor', true),
        //                 'alamat' => $this->input->post('alamat', true),
        //                 'status' => $this->input->post('status', true),
        //                 'judul' => $this->input->post('judul', true),
        //                 'topik' => $this->input->post('topik', true),
        //                 'file' => $this->uploadPemakalah->data('file_name'),
        //                 'bukti' => $this->uploadBuktiPemakalah->data('file_name'),
        //                 'tanggal' => time()
        //             ];
        //             $this->db->insert('daftar_pemakalah', $data);
        //             $this->_kirimEmailPemakalah($this->input->post('email'));
        //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran Berhasil!, <b>Untuk langkah selanjutnya, silahkan cek email yang terdaftar</b></div>');
        //             redirect('daftar/pemakalah');
        //         } else {
        //             $data['topik'] = ['Digital Forensic', 'Natural Language Processing', 'Digital Signal and Image Processing', 'Security System and Networking', 'Internet of Things (IoT)', 'Big Data and Business Intelligent', 'Artificial Intelligent', 'Information System and Risk Management'];
        //             $data['error'] = $this->uploadPemakalah->display_errors();
        //             $data['judul'] = "Form Pendaftaran";
        //             $this->load->view('templates/main_header', $data);
        //             $this->load->view('form/daftar_pemakalah', $data);
        //             $this->load->view('templates/main_footer');
        //         }
        //     } else {
        //         $data['topik'] = ['Digital Forensic', 'Natural Language Processing', 'Digital Signal and Image Processing', 'Security System and Networking', 'Internet of Things (IoT)', 'Big Data and Business Intelligent', 'Artificial Intelligent', 'Information System and Risk Management'];
        //         $data['error'] = $this->uploadPemakalah->display_errors();
        //         $data['judul'] = "Form Pendaftaran";
        //         $this->load->view('templates/main_header', $data);
        //         $this->load->view('form/daftar_pemakalah', $data);
        //         $this->load->view('templates/main_footer');
        //     }
        // } else {
        //     $data['topik'] = ['Digital Forensic', 'Natural Language Processing', 'Digital Signal and Image Processing', 'Security System and Networking', 'Internet of Things (IoT)', 'Big Data and Business Intelligent', 'Artificial Intelligent', 'Information System and Risk Management'];
        //     $data['error'] = $this->uploadPemakalah->display_errors();
        //     $data['judul'] = "Form Pendaftaran";
        //     $this->load->view('templates/main_header', $data);
        //     $this->load->view('form/daftar_pemakalah', $data);
        //     $this->load->view('templates/main_footer');
        // }
    }



    public function nonPemakalah()
    {
        $data['topik'] = [
            'Expert System',
            'Image & Signal Processing',
            'Natural Language Processing',
            'Machine Learning',
            'Big Data',
            'Internet of Things (IoT)',
            'Digital Forensic',
            'IT for Education',
            'Data Mining',
            'Cryptography',
            'Computer Network and Communication',
            'E-Government',
            'E-Learning',
            'Information System and Technology',
            'Multimedia'
        ];
        $data['error'] = '';
        $data['judul'] = "Form Pendaftaran";
        $this->load->view('templates/main_header', $data);
        $this->load->view('form/daftar_nonpemakalah', $data);
        $this->load->view('templates/main_footer');
    }
    public function uploadNonPemakalah()
    {
        $config['upload_path'] = './uploads/bukti/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|';
        $config['max_size'] = '10000';
        $config['file_name'] = 'bukti' . $this->input->post('nomor');

        $this->load->library('upload', $config, 'uploadNonPemakalah');
        $this->uploadNonPemakalah->initialize($config);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('instituisi', 'Instituisi', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('topik', 'Topik', 'required|trim');

        if ($this->form_validation->run()) {
            if ($this->uploadNonPemakalah->do_upload('bukti')) {
                $data = [
                    'nama' => $this->input->post('nama', true),
                    'instituisi' => $this->input->post('instituisi', true),
                    'email' => $this->input->post('email', true),
                    'nomor' => $this->input->post('nomor', true),
                    'alamat' => $this->input->post('alamat', true),
                    'topik' => $this->input->post('topik', true),
                    'bukti' => $this->uploadNonPemakalah->data('file_name'),
                    'tanggal' => time()
                ];
                $this->db->insert('daftar_nonpemakalah', $data);
                $this->_kirimEmailNonPemakalah($this->input->post('email'));

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran Berhasil!, Silahkan cek email yang terdaftar.</div>');
                redirect('daftar/nonpemakalah');
            } else {
                $data['topik'] = [
                    'Expert System',
                    'Image & Signal Processing',
                    'Natural Language Processing',
                    'Machine Learning',
                    'Big Data',
                    'Internet of Things (IoT)',
                    'Digital Forensic',
                    'IT for Education',
                    'Data Mining',
                    'Cryptography',
                    'Computer Network and Communication',
                    'E-Government',
                    'E-Learning',
                    'Information System and Technology',
                    'Multimedia'
                ];
                $data['error'] = $this->uploadNonPemakalah->display_errors();
                $this->session->set_flashdata('message_error', '<div class="alert alert-danger" role="alert">Pendaftaran tidak berhasil, <b>Silahkan cek ulang data anda.</b></div>');
                $data['judul'] = "Form Pendaftaran";
                $this->load->view('templates/main_header', $data);
                $this->load->view('form/daftar_nonpemakalah', $data);
                $this->load->view('templates/main_footer');
            }
        } else {
            $data['topik'] = [
                'Expert System',
                'Image & Signal Processing',
                'Natural Language Processing',
                'Machine Learning',
                'Big Data',
                'Internet of Things (IoT)',
                'Digital Forensic',
                'IT for Education',
                'Data Mining',
                'Cryptography',
                'Computer Network and Communication',
                'E-Government',
                'E-Learning',
                'Information System and Technology',
                'Multimedia'
            ];
            $data['error'] = $this->uploadNonPemakalah->display_errors();
            $this->session->set_flashdata('message_error', '<div class="alert alert-danger" role="alert">Pendaftaran tidak berhasil, <b>Silahkan cek ulang data anda.</b></div>');
            $data['judul'] = "Form Pendaftaran";
            $this->load->view('templates/main_header', $data);
            $this->load->view('form/daftar_nonpemakalah', $data);
            $this->load->view('templates/main_footer');
        }
    }
}
