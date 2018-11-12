<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

class IndexController extends AppController
{
    public function input()
    {
        $prefecture = Configure::read('prefecture');
        $checkin    = Configure::read('checkin');

        $this->set('prefecture', $prefecture);
        $this->set('checkin', $checkin);
    }

    public function confirm()
    {
        $data = $this->request->getData();
        
        $this->set('data', $data);
    }

    public function register()
    {

    }

    public function complete()
    {
    }
}
