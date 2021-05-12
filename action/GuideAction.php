<?php
    require_once("action/CommonAction.php");
    require_once("action/DAO/DAO.php");

    class GuideAction extends CommonAction {

        public function __construct() {
            parent::__construct(CommonAction::$VISIBILITY_MEMBER);
        }

        protected function executeAction() {
            $db = [];

            if(!empty($_POST)){
                
                if (isset($_POST["article"])){
                    // var_dump($_POST);

                    if(isset($_POST['add'])){
                        if(isset($_POST['contenu']) && isset($_POST['titre'])){
                            DAO::addArticle($_SESSION['username'], $_POST['titre'], $_POST['contenu']);
                        }
                    }
                    elseif(isset($_POST['mod'])){
                        if(isset($_POST['articleid'], $_POST['titre'], $_POST['contenu'])){
                            DAO::modArticle($_POST['articleid'], $_POST['titre'], $_POST['contenu']);
                        }
                    }
                    elseif(isset($_POST['get'])){
                        if(isset($_POST['articleid'])){
                            DAO::getArticle($_POST['articleid']);
                        }
                    }
                    elseif(isset($_POST['del'])){
                        if(isset($_POST['articleid'])){
                            DAO::delArticle($_POST['articleid']);
                        }
                    }
                }
                elseif(isset($_POST["comment"])){
                    
                    if(isset($_POST['add'])){
                        if(isset($_POST['contenu']) && isset($_POST['articleId'])){
                            DAO::addComment($_SESSION['username'], $_POST['contenu'], $_POST['articleId']);
                        }
                    }
                    elseif(isset($_POST['get'])){
                        DAO::getComment($_POST['articleId']);
                    }
                }

            }
            else{
                $db = DAO::getLatest();
                // $db = DAO::getArticle(1);
                // var_dump($db);
                return compact("db");
            }

        }
    }