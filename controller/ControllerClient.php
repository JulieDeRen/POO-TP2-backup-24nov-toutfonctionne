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
       //twig::render('client-create.php');
       $country = new ModelCountry;
       $select = $country->selectCountry();
       twig::render('client-create.php', ['countries' => $select, 
                    'country_list' => "Liste des pays"]);
    }

   public function store(){
        $client = new ModelClient;
        $insert = $client->insertClient($_POST);
        requirePage::redirectPage('client');
    }

    public function show($id){
        $client = new ModelClient;
        $select = $client->selectId($id);
        $country = new ModelCountry;
        $selectCountry = $country->selectCountry(); // pour chaque boucle, il faut l'associer
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