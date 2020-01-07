<?php
namespace Controller;
// use function Couchbase\defaultDecoder;
use Model\Customer;
use Model\CustomerDB;
use Model\DBConnection;
class CustomerController
{
    public $customerDB;
    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=customer", "root", "123456789");
        $this->customerDB = new CustomerDB($connection->connect());
    }

     public function index()
    {
        $customers = $this->customerDB->getAll();
        include 'view/list.php';
    }


    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/add.php';
        } else {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $customer = new Customer($name, $email, $address);
            $this->customerDB->create($customer);
            $message = 'Customer created';
            header('location: index.php');
        }
    }
   
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $customer = $this->customerDB->get($id);
            include 'view/delete.php';
        } else {
            $id = $_POST['id'];
            $this->customerDB->delete($id);
            header('Location: index.php');
        }
    }

    
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $customer = $this->customerDB->get($id);
            include 'view/edit.php';
        } else {
            $id = $_POST['id'];
            $customer = new Customer($_POST['name'], $_POST['email'], $_POST['address']);
            $this->customerDB->update($id, $customer);
            header('Location: index.php');
        }
    }
}