<?php
class homeController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();

        $contato = new Contato();
        $data['contatos'] = $contato->getList();

        $this->loadTemplate('home', $data);
    }

    public function add(){
        $data = array();


        

        $this->loadTemplate("add", $data);
    }

    private function clearData($value){
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);

        return $value;
    }

    private function clearSessions(){
        unset($_SESSION['error_name']);
        unset($_SESSION['value_name']);
        unset($_SESSION['error_email']);
        unset($_SESSION['value_email']);

    }
    public function add_contact(){

        $_SESSION['error_name'] = '';
        $_SESSION['value_name'] = '';

        $_SESSION['error_email'] = '';
        $_SESSION['value_email'] = '';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            if(empty($_POST['name'])){
                $_SESSION['error_name'] = 'Campo Obrigatório';
                header("Location: ".BASE_URL.'home/add');
            }else{
                $name = $this->clearData($_POST['name']);
                $_SESSION['value_name'] = $name;
                $pattern = "/^[a-zA-Z-' ]*$/";
                if(!preg_match($pattern, $name)){
                    $_SESSION['error_name'] = 'Formato de nome inválido!!';
                    header("Location: ".BASE_URL.'home/add');
                }
            }

            if(empty($_POST['email'])){
                $_SESSION['error_email'] = 'Campo Obrigatório';
                header("Location: ".BASE_URL.'home/add');
            }else{
                $email = $this->clearData($_POST['email']);
                $_SESSION['value_email'] = $email;
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $_SESSION['error_email'] = 'Formato de e-mail inválido!';
                    header("Location: ".BASE_URL.'home/add');
                }
            }

            if($_SESSION['error_name'] == '' && $_SESSION['error_email'] == ''){

                $contato = new Contato();
                if($contato->emailExists($email)){
                    $_SESSION['error_email'] = 'E-mail já existente!';
                    header("Location: ".BASE_URL.'home/add');
                }else{
                    $contato->addContato($name, $email);
                    header('Location: '.BASE_URL);
                    $_SESSION['add_success'] = 'Adicionado com sucesso';
                    $this->clearSessions();
                }
            }
        }

    }

    public function editContact($id){
        if(!empty($id)){

            $data = array();
            $contato = new Contato();
            $data['contact_info'] = $contato->getContactById($id);
            $this->loadTemplate('edit_contact', $data);
        }
    }

    public function edit_contact(){
        $_SESSION['error_name'] = '';
        $_SESSION['value_name'] = '';

        $_SESSION['error_email'] = '';
        $_SESSION['value_email'] = '';
        $contato = new Contato();

        $id = $_POST['id'];
        $contact_info = $contato->getContactById($id);


        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            if(empty($_POST['name'])){
                $_SESSION['error_name'] = 'Campo Obrigatório';
                header("Location: ".BASE_URL.'home/editContact/'.$id);
            }else{
                $name = $this->clearData($_POST['name']);
                $_SESSION['value_name'] = $name;
                $pattern = "/^[a-zA-Z-' ]*$/";
                if(!preg_match($pattern, $name)){
                    $_SESSION['error_name'] = 'Formato de nome inválido!!';
                    header("Location: ".BASE_URL.'home/editContact/'.$id);
                }
            }
            

            if(empty($_POST['email'])){
                $_SESSION['error_email'] = 'Campo Obrigatório';
                header("Location: ".BASE_URL.'home/editContact/'.$id);
            }else{
                $email = $this->clearData($_POST['email']);
                $_SESSION['value_email'] = $email;

                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $_SESSION['error_email'] = 'Formato de e-mail inválido!';
                    header("Location: ".BASE_URL.'home/editContact/'.$id);
                }
            }
            if($_SESSION['error_name'] == '' && $_SESSION['error_email'] == ''){

                if($contact_info['email'] == $email){
                    $contato->editarContato($name, $email, $id);
                    header('Location: '.BASE_URL);
                    $_SESSION['edit_success'] = 'Editado com sucesso';
                    $this->clearSessions();
                }else{
                    if($contato->emailExists($email)){
                    $_SESSION['error_email'] = 'E-mail já existente!';
                    header("Location: ".BASE_URL.'home/editContact/'.$id);
                    }
                }
                
            }
        }
    }

    public function delContact($id){
        
        $contato = new Contato();
        $contato->deleteContato($id);
        header("Location: ".BASE_URL);
        $_SESSION['del_success']  = 'Contato removido com sucesso';

    }

}