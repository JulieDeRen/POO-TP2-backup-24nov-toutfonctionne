<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelClient');
RequirePage::requireModel('ModelCountry');

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
       twig::render('client-create.php', ['countries' => $select, 
                    'country_list' => "Liste des pays"]);
    }

   public function store(){
        $validation = new Validation;
    
        //$validation->name('nom')->value($_POST['nom'])
        extract($_POST);
        $validation->name('nom')->value($lastName)->pattern('alpha')->required()->max(30);
        $validation->name('prénom')->value($firstName)->pattern('alpha')->required()->max(30);
        $validation->name('mot de passe')->value($password)->pattern('alpha')->required()->max(30);
        $validation->name('email')->value($email)->pattern('email')->required()->max(50);


        if($validation->isSuccess()){
            $client = new ModelClient;
            $insert = $client->insert($_POST);
            requirePage::redirectPage('client');
        }
        else{
            $errors = $validation->displayErrors();
            $country = new ModelCountry;
            $select = $country->select('countryName');
            twig::render('client-create.php', ['errors'=>$errors, 'data'=>$_POST, 'countries' => $select, 
            'country_list' => "Liste des pays"]);
        }
    }

    public function show($id){
        CheckSession::sessionAuth();
        $client = new ModelClient;
        $select = $client->selectId($id);
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