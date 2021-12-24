<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Sampah</title>
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
$materialsApi = file_get_contents("http://10.211.55.11/api/materials");
// $materialsApi =file_get_contents('/materials.json');
$materials = json_decode($materialsApi, TRUE);

$typesApi = file_get_contents("http://10.211.55.11/api/types");
$types = json_decode($typesApi, TRUE);
?>

</head>
<body>
  <nav class="navbar navbar-dark ">
    <div class="container-fluid">
      <span class="mx-auto  mb-0 h4"><a href="/" class="text-light" style="text-decoration: none;">Input Sampah</a></span>
    </div>
  </nav>

    <main>
       <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto px-3">
                    
              <div class="mb-3 mt-3">
               <form action="http://10.211.55.11/api/types" method="post">
               <label for="exampleFormControlInput1" class="form-label">Kategori Sampah</label>
                <select class="form-select" id="material" name="material"  aria-label="Default select example">
                  <!-- <option class="" selected><span class="text-mute">Kategori</span> </option> -->
                  <?php $i = 0; ?>
                    <?php foreach ($materials as $m) : ?>
                        <?php foreach ($m as $n) : ?>
                  <option name="material"  value="<?php echo $n['nama'] ?>" ><span class="text-mute"><?php echo $n['nama'] ?></span> </option>
                        <?php endforeach; ?>

                    <?php $i++; ?>
                    <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jenis Sampah</label>
                <input type="text" id="name" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Nama Sampah">
              </div>
              <p></p>

              <div class="d-grid gap-2">
                  <button class="btn text-light  br add" onclick="addClick();" type="submit">Simpan</button>
              </div>
               </form>
            </div>
        </div>
       </div>

    </main>
</body>
</html>