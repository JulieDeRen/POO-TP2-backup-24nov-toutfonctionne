<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelClient');
RequirePage::requireModel('ModelCountry');
RequirePage::requireModel('ModelUser');
RequirePage::requireModel('ModelBasket');
RequirePage::requireModel('ModelPriviledge');

class ControllerClient{

    public function index(){
        $client = new ModelClient;
        $select = $client->selectClient();
        twig::render("client-index.php", ['clients' => $select, 
                                        'client_list' => "Liste de Client"]);
    }

    public function create(){

       $country = new ModelCountry;
       $select = $country->select('countryName'); // passer la variable en param
       $priviledge = new ModelPriviledge;
       $selectPriviledge = $priviledge->select('type'); // passer la variable en param
       twig::render('client-create.php', ['countries' => $select, 
                    'priviledges' => $selectPriviledge,
                    'country_list' => "Liste des pays"]);
    }

    public function store(){
        $validation = new Validation;
        extract($_POST);
        $validation->name('nom')->value($firstName)->pattern('alpha')->required()->max(45);
        // $validation->name('courriel')->value($email)->pattern('email')->required();
        $validation->name('mot de passe')->value($password)->max(20)->min(5);
        $validation->name('privilege')->value($idPriviledge)->pattern('int')->required();

        if($validation->isSuccess()){
            $client = new ModelClient;
            $clientInsert = $client ->insertClient($_POST);
            $user = new ModelUser;
            $options = [
                'cost' => 10,
            ];
            $_POST['password']= password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            $userInsert = $user->insert($_POST);
            requirePage::redirectPage('client');
        }else{
            $errors = $validation->displayErrors();
            $country = new ModelCountry;
            $select = $country->select('countryName');
            $priviledge = new ModelPriviledge;
            $selectPriviledge = $priviledge->select('type');
            twig::render('client-create.php', ['errors'=>$errors, 
                        'data'=>$_POST, 
                        'countries' => $select, 
                        'priviledges' => $selectPriviledge, 
                        'country_list' => "Liste des pays"]);
        }
    }



    public function show($id){
        CheckSession::sessionAuth();
        $client = new ModelClient;
        $select = $client->selectClientId($id);
        $country = new ModelCountry;
        $selectCountry = $country->select('countryName'); // pour chaque boucle, il faut l'associer
        twig::render("client-show.php", ['clients' => $select, 
                                        'countries'=> $selectCountry,
                                        'client_list' => "Liste de Client"]);
    }

    public function edit($id){
        $client = new ModelClient;
        $select = $client->selectId($id);
        twig::render('client-edit.php');
    }
    // *** ?? A quoi servent $update et $delete ?
    public function update(){
        $client = new ModelClient;
        $update = $client ->update($_POST);
        RequirePage::redirectPage('client');
    }
    public function delete(){
        $client = new ModelClient;
        $delete = $client->delete($_POST['id']);
        RequirePage::redirectPage('client');
    }
}
?>