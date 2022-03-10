<?php
class Exceptions extends Controller{
    public function notFoundAction($params = null){
        $this->View->Title = __("error_page_title");
        $this->View->Description = __("error_page_desc");
        //=====page logics here======


        $this->View->PageContent = $this->View->view_file("Errors/404");
        $this->View->render("front_template.phtml");
    }
}