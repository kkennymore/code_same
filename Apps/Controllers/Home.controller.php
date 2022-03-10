<?php
/*@author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */

class Home extends Controller
{
   public function indexAction($param = null)
   {
      $this->View->Title = __("home_page_title");
      $this->View->Description = __("home_page_desc");
      $homeModelObj = new Index;

   

      $this->View->PageContent = $this->View->view_file("Home/index");
      $this->View->render("front_template.phtml");
   }





  

}

