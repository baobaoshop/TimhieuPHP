<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLASS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<?php 
    class Person {
        public $name;
        private $age;
        protected $gender;

        public function __construct($name, $age, $gender) {
            $this->name = $name;
            $this->age = $age;
            $this->gender = $gender;
        }

        public function setAge($age) {
            $this->age = $age;
        }
    
        public function getAge() {
            return $this->age;
        }
    
        public function setGender($gender) {
            $this->gender = $gender;
        }
    
        public function getGender() {
            return $this->gender;
        }

        public function introduct(){
            return "Hello, My name is ".$this->name;
        }
    }

    class Employee extends Person {
        public $employeeID;
        public $salary;
        public static $basicSalary = 1000;

        public function __construct($name, $age, $gender, $employeeID, $salary) {
            parent::__construct($name, $age, $gender);
            $this->employeeID = $employeeID;
            $this->salary = $salary;
        }

        public function introduct(){
            return parent::introduct()." - I'm an employee.";
        }

        public static function increaseBasicSalary($number){
            Employee::$basicSalary += $number;
            return Employee::$basicSalary;
        }

    }
?>
<body>
  <?php include_once('./header.php'); ?>

  <div class="container p-5">
    <h1 class="text-center">CLASS</h1>
    <table class="table table-bordered">
        <tr>
            <td>Class</td>
            <td>Person { $name, $age, $gender }</td>
        </tr>
        <tr>
            <td>Đối tượng</td>
            <td>
                <?php 
                    $person = new Person("Bui Quoc Bao", 20, "Nam");
                    echo "Name: $person->name - Age: ".$person->getAge()." - Gender: ".$person->getGender();
                ?>
            </td>
        </tr>
        <tr>
            <td>Thuộc tính</td>
            <td>name, age, gender</td>
        </tr>
        <tr>
            <td>Phương thức</td>
            <td>__construct, getter/setter và hàm thông thường: introduct()</td>
        </tr>
        <tr>
            <td>Gọi hàm introduct()</td>
            <td><?php echo $person->introduct() ?></td>
        </tr>
    </table>
    <table class="table table-bordered">
        <tr>
            <td>Lớp kế thừa</td>
            <td>Empoyee extends Person { $employeeID, $salary }</td>
        </tr>
        <tr>
            <td>Đối tượng</td>
            <td>
                <?php 
                    $employee = new Employee("Bui Quoc Bao", 20, "Nam", "E001", 3000);
                    echo "ID: $employee->employeeID - Name: $employee->name - Age: ".$employee->getAge()." - Gender: ".$employee->getGender()." - Salary: $employee->salary";
                ?>
            </td>
        </tr>
        <tr>
            <td>Override function introduct()</td>
            <td><?php echo $employee->introduct() ?></td>
        </tr>
        <tr>
            <td>Static field</td>
            <td>Employee::$basicSalary :<?php echo Employee::$basicSalary; ?></td>
        </tr>
        <tr>
            <td>Static function</td>
            <td>Employee::increaseBasicSalary(500): <?php echo Employee::increaseBasicSalary(500); ?></td>
        </tr>
    </table>
  </div>
    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>