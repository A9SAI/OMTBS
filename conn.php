<?php
class connec
{
    public $username = "root";
    public $password = "";
    public $server_name = "localhost";
    public $db_name = "movie_ticket_booking";

    public $conn;


    function __construct()
    {
        $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Connection Failed");
        }
        // else{
        //     echo "Connected";
        // }
    }

    function select_all($table_name)
    {
        $sql = "SELECT * FROM $table_name";
        $result = $this->conn->query($sql);
        return $result;
    }

    function select_movie($table_name, $date)
    {
        if ($date == "comingsoon") {
            $sql = "SELECT * FROM $table_name Where rel_date > now()";
            $result = $this->conn->query($sql);
            return $result;
        } else {
            $sql = "SELECT * FROM $table_name Where rel_date <= now()";
            $result = $this->conn->query($sql);
            return $result;
        }
    }

    function select($table_name, $id)
    {
        $sql = "SELECT * FROM $table_name where id=$id";
        $result = $this->conn->query($sql);

        return  $result;
    }

    function select_showdate($m_id, $c_id)
    {
        $sql = "SELECT DISTINCT show_date FROM `show` WHERE movie_id=$m_id and cinema_id=$c_id";
        $result = $this->conn->query($sql);

        return  $result;
    }

    function select_showtime($m_id, $c_id)
    {
        $sql = "SELECT id As show_id,show_time FROM `show` WHERE movie_id=$m_id and cinema_id=$c_id";
        $result = $this->conn->query($sql);

        return  $result;
    }

    function select_ticketPrice($show_id){
        $sql = "SELECT ticket_price FROM `show` WHERE id=$show_id";
        $result = $this->conn->query($sql);

        return  $result;
    }
    function select_cinema($m_id)
    {
        $sql = "SELECT DISTINCT cinema.id AS cinema_id,cinema.name AS cinema_name,cinema.cinema_photo,cinema.city
                FROM cinema,movie,`show`
                WHERE movie.id = `show`.movie_id AND cinema.id = `show`.`cinema_id` AND movie.id=$m_id;";
        $result = $this->conn->query($sql);

        return  $result;
    }

    function select_login($table_name, $email)
    {
        $sql = "SELECT * FROM $table_name where email='$email'";
        $result = $this->conn->query($sql);

        return  $result;
    }

    function select_movie_by_name($movie_name)
    {
        $sql = "SELECT * FROM movie where name='$movie_name'";
        $result = $this->conn->query($sql);

        return  $result;
    }

    function select_booking($show_id,$booking_date){
        $sql = "SELECT seat_number FROM booking where show_id=$show_id and booking_date='$booking_date'";
        $result = $this->conn->query($sql);

        return  $result;
    }

    function insert($query, $msg)
    {
        if ($this->conn->query($query) === TRUE) {
            echo '<script> alert("' . $msg . '");</script>';
        } else {
            echo '<script> alert("' . $this->conn->error . '");</script>';
        }
    }
    function update($query, $msg)
    {
        if ($this->conn->query($query) === TRUE) {
            echo '<script> alert("' . $msg . '");</script>';
        } else {
            echo '<script> alert("' . $this->conn->error . '");</script>';
        }
    }
    function delete($table_name, $id)
    {
        try {
            $query = "DELETE FROM $table_name WHERE id=$id;";
            
            if ($this->conn->query($query) === TRUE) {
                echo '<script> alert("Record Deleted"); </script>';
            } else {
                throw new Exception($this->conn->error);
            }
        } catch (Exception $e) {
            // Error
            echo '<script> alert("Error: ' . $e->getMessage() . '"); </script>';
        }
    }

    function delete_with_file($table_name, $id,$imagePathToDelete,$error_msg)
    {
        try {
            $query = "DELETE FROM $table_name WHERE id=$id;";
            
            if ($this->conn->query($query) === TRUE) {
                echo '<script> alert("Record Deleted"); </script>';
                if (file_exists($imagePathToDelete)) {
                    if (unlink($imagePathToDelete)) {
                        echo "";
                    } else {
                        echo "Error deleting the file.";
                    }
                } else {
                    echo "File not found.";
                }
                return true;
            } else {
                throw new Exception($this->conn->error);
            }
        } catch (Exception $e) {
            // Error
            echo '<script> alert("Error: ' . $error_msg . '"); </script>';
        }
    }


    function insert_lastid($query)
    {
        $last_id = 0;
        if ($this->conn->query($query) === TRUE) {
            $last_id = $this->conn->insert_id;
        } else {
            echo '<script> alert("' . $this->conn->error . '");</script>';
        }
        return $last_id;
    }



    function select_by_query($query)
    {
        $result = $this->conn->query($query);
        return $result;
    }
    function select_show_dt()
    {
        $sql = "SELECT movie_ticket_booking.show.id,
         movie_ticket_booking.show.show_date,
         movie_ticket_booking.show.show_time,
          movie_ticket_booking.show.ticket_price,
           movie_ticket_booking.show.movie_id,
            movie.name AS 'movie_name',cinema.name
               FROM movie_ticket_booking.show, movie, cinema 
               where movie_ticket_booking.show.movie_id=movie.id 
                AND movie_ticket_booking.show.cinema_id=cinema.id;";

        $result = $this->conn->query($sql);
        return $result;
    }

    // function select_by_query($query)
    // {
    //     $result = $this->conn->query($query);
    //     return $result;
    // }



    // function update($query, $msg)
    // {
    //     if ($this->conn->query($query) === TRUE) {
    //         echo '<script> alert("' . $msg . '");</script>';
    //     } else {
    //         echo '<script> alert("' . $this->conn->error . '");</script>';
    //     }
    // }

    // function delete($table_name, $id)
    // {
    //     $query = "Delete from $table_name WHERE id =$id";

    //     if ($this->conn->query($query) === TRUE) {
    //         echo '<script> alert("Record Deleted");</script>';
    //     } else {
    //         echo '<script> alert("' . $this->conn->error . '");</script>';
    //     }
    // }
}
