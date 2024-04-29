<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PHP OOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center text-danger">DAFTAR DATA PRIBADI</h2>
            <form action="POST">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#biodataadd">
            +ADD
            </button>
            </form>
        </div><!-- end col1-->
    </div><!-- end row1-->
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-primary table-hover  ">
                <thead >
                    <tr>
                        <th>NO</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Jekel</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        include('model.php');
                        $model = new Model();
                        $rows =$model->fetch();
                        // var_dump($rows);
                        $nomor = 1;
                        if(!empty($rows)){
                            foreach($rows as $row){
                    ?>
                    <tbody>
                        <tr> 
                            <td><?= $nomor;?></td>
                            <td><?= $row['id'];?></td>
                            <td><?= $row['nama'];?></td>
                            <td><?= $row['jekel'];?></td>
                            <td><?= $row['alamat'];?></td>
                            <td>
                                <a href="biodatadetail.php?id=<?= $row['id'];?>" class="badge bg-success">Detail</a> 
                                <a href="biodataedit.php?id=<?= $row['id'];?>" class="badge bg-warning">Edit</a> 
                                <a href="biodatadelete.php?id=<?= $row['id'];?>" class="badge bg-primary">Delete</a> 
                            </td>  
                        </tr>
                    </tbody>
                </thead>
                <?php 
                $nomor++;
                    }
                }
                ?>
            </table>
        </div><!-- end col2-->
    </div> <!-- end row2-->
  </div>  <!-- end container-->

  <!-- Modal -->
    <div class="modal fade" id="biodataadd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Input Data Pribadi</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>