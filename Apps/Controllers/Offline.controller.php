<?php
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
class Offline extends Controller{
    public function indexAction($param = null)
    {
        $pageView = new PageViews();
        $this->View->Title = __("offline");
        $this->View->Description = __("offline_desc");



        $this->View->PageContent = $pageView->page("Offline", "index");
        $this->View->render("front_template.phtml");
    }
}