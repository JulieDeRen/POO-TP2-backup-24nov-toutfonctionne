<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelFormat');

class ControllerFormat{

    public function index(){
        $format = new ModelFormat;
        $select = $format->select();
        twig::render("format-index.php", ['formats' => $select, 
                                        'format_list' => "Liste des formats"]);
    }

    public function create(){
       twig::render('format-create.php');
    }

    public function store(){
        $format = new ModelFormat;
        $insert = $format->insert($_POST);
        requirePage::redirectPage('format');
    }

    public function show($id){
        $format = new ModelFormat;
        $selectFormat = $format->selectId($id);
        twig::render('format-show.php', ['formats' => $selectFormat,
                                            'format_detail' => "Modifier"]);
    }

    public function edit($id){
        $format = new ModelFormat;
        $selectFormat = $format->selectId($id);
        twig::render('format-edit.php', ['format' => $selectCountry]);
    }
    // *** ?? A quoi servent $update et $delete ?
    public function update(){
        $format = new ModelFormat;
        $update = $format->update($_POST);
        RequirePage::redirectPage('format');
    }
    public function delete(){
        $format = new ModelFormat;
        $delete = $format->delete($_POST['id']);
        RequirePage::redirectPage('format');
    }
}
?>