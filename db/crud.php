<?php
    class crud{

        //private database object
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct ($conn){
            $this ->db = $conn;
        }
        //function to insert a new record into the attendee database
        public function insertAttendees($firstname, $lastname, $dob, $email, $contact, $specialty){
            try {
                //define sql statement to be executed
            

                $sql = "INSERT INTO attendee (firstname, lastname, dateofbirth, emailaddress,contactnumber,specialty_id)VALUES (:firstname,:lastname,:dob,:email,:contact,:specialty)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);

                //bind all placeholders to the actual values
                $stmt->bindparam(':firstname',$firstname);
                $stmt->bindparam(':lastname',$lastname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty',$specialty);

                //execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e){

                echo $e->getMessage();
                return false;
            }

        }

        public function editAttendee($id, $firstname, $lastname, $dob, $email, $contact, $specialty){
           try{
            $sql ="UPDATE `attendee` SET `firstname`=:firstname,`lastname`=:lastname,`dateofbirth`=:dob,`emailaddress`=:email,`contactnumber`=:contact,`specialty_id`=:specialty WHERE attendee_id = :id";
            
            $stmt = $this->db->prepare($sql);

                //bind all placeholders to the actual values
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':firstname',$firstname);
                $stmt->bindparam(':lastname',$lastname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':specialty',$specialty);

                //execute statement
                $stmt->execute();
                return true;

           }catch (PDOException $e){

                echo $e->getMessage();
                return false;
           }
           
            
        
        }

        public function getAttendees(){

            try{
                $sql = "SELECT * FROM `attendee` a inner join specialty s on a.specialty_id = s.specialty_id";
                $result = $this->db->query($sql);
                return $result;

            }catch(PDOException $e){

                echo $e->getMessage();
                return false;
            }
            
            
        }

        public function getAttendeeDetails($id){

            try{
                $sql = "select * from attendee a inner join specialty s on a.specialty_id = s.specialty_id where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result; 

            }catch(PDOException $e){

                echo $e->getMessage();
                return false;
            }         
        }

        public function deleteAttendee($id){
            try{
                $sql = "delete from attendee where attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            }catch(PDOException $e){

                echo $e->getMessage();
                return false;
            }
            
        }
        
        public function getSpecialty(){
            try {
                $sql = "SELECT * FROM `specialty`";
                $result = $this->db->query($sql);
                return $result;

            }catch(PDOException $e){

                echo $e->getMessage();
                return false;
            }
        }
        

    }

?>