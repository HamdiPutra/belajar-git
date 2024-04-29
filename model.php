<?php
class Model{
    private $server ="localhost";
    private $username ="root";
    private $password ;
    private $database ="biodataku";
    private $conn;

    public function __construct(){
        try{
            $this->conn = new mysqli($this->server,$this->username,$this->password,$this->database);
        }catch(Exception $e){
            echo "Koneksi Gagal...".$e->getMessage();
        }
    }
    public function fetch(){
        $data = null;
        $query ="SELECT * FROM `pribadi` ";

        if($sql = $this->conn->query($query)){
            while ($row = mysqli_fetch_assoc($sql)){
                $data[] =$row;
            }
        }
        return $data;

    }
    public function insert(){
        // apakah variabel nama ada di buat dalam form input tadi / name
        if(isset($_POST['nama']) && isset($_POST['jekel']) && isset($_POST['alamat'])){ 
            if(!empty($_POST['nama']) && !empty($_POST['jekel'])  && !empty($_POST['alamat'])){
                $nama = $_POST['nama'];
                $jekel = $_POST['jekel'];
                $alamat = $_POST['alamat'];

                $query ="INSERT INTO `pribadi`(`nama`, `jekel`, `alamat`) VALUES ('$nama','$jekel','$alamat')";
                if($sql = $this->conn->query($query)){
                    echo "<script> aler('Data Berhasil Disimpan...)</script>";
                    echo "<script> window.location.href='index2.php'</script>";
                }else{
                    echo "<script>aler('Data Gagal Disimpan...)</script>";
                }
            } else{
                echo "<script>aler('Data Tidak Lengkap...)</script>";
            }            
        }          
    }
}
?>