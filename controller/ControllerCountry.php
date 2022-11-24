<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelCountry');

class ControllerCountry{

    public function index(){
        $country = new ModelCountry;
        $select = $country->selectCountry();
        twig::render("country-index.php", ['countries' => $select, 
                                        'country_list' => "Liste de pays"]);
    }

    public function create(){
       twig::render('country-create.php');
    }

    public function store(){
        $country = new ModelCountry;
        $insert = $country->insert($_POST);
        requirePage::redirectPage('country');
    }

    public function show($idCountry){
        $country = new ModelCountry;
        $selectCountry = $country->selectId($idCountry);
        twig::render('country-show.php', ['countries' => $selectCountry,
                                            'country_detail' => "Modifier"]);
    }

    public function edit($idCountry){
        $country = new ModelCountry;
        $selectCountry = $country->selectId($idCountry);
        twig::render('country-edit.php', ['country' => $selectCountry]);
    }
    // *** ?? A quoi servent $update et $delete ?
    public function update(){
        $country = new ModelCountry;
        $update = $country->update($_POST);
        RequirePage::redirectPage('country');
    }
    public function delete(){
        $country = new ModelCountry;
        $delete = $country->delete($_POST['idCountry']);
        RequirePage::redirectPage('country');
    }
}
?>