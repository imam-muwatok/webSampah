<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Jenis Sampah</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        nav {
            background-color: #0E3260;
        }

        .add {
            background-color: #4EAFE4;
        }
        .br {
            border-radius: 10px;
        }
    </style>
    <?php
        $url = 'http://10.211.55.11/api/types/';
      

      $typesApi = file_get_contents("http://10.211.55.11/api/types");
      $types = json_decode($typesApi, TRUE);

      $materialsApi = file_get_contents("http://10.211.55.11/api/materials");
      $materials = json_decode($materialsApi, TRUE);

    ?>
</head>
<body>
  <nav class="navbar navbar-dark ">
    <div class="container-fluid">
      <span class="mx-auto text-light mb-0 h4">Data Sampah</span>
    </div>
  </nav>
    <main>
       <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto px-3">
             <a class="btn add br  text-light d-grid gap-2 mt-3 mb-3" href="/input.php">Tambah</a>

                    <?php foreach ($types as $m) : ?>
                        
                      <?php foreach ($m as $n) : ?>
                          <div class="card shadow-sm br mt-3">
                              <div class="card-body">
                                  <h4 class="card-text"><?php echo $n['nama'] ?></h4>
                                  <div class="d-flex justify-content-between align-items-center">
                                  <div class="btn-group">
                                  <p><?php echo $n['material'] ?></p>
                                  </div>
                                  <form action="<?php echo $url.$n['id'] ?>" method="post">
                                  <button id="delete" type="submit" class="btn text-danger">Hapus</button>
                                  <input name="_method" type="hidden" value="delete" />
                                  </form>

                                  </div>
                              </div>
                          </div>
                
                        <?php endforeach; ?>
                    <?php endforeach; ?>
            </div>
        </div>
       </div>
    </main>
</body>
</html>