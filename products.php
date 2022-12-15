<div class="row tm-content-row">
  <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
    <div class="tm-bg-primary-dark tm-block tm-block-products">
      <div class="tm-product-table-container">
        <table class="table table-hover tm-table-small tm-product-table">
          <thead>
            <tr>
              <th scope="col">&nbsp;</th>
              <th scope="col">PRODUCT NAME</th>
              <th scope="col">SOLD</th>
              <th scope="col">IN STOCK</th>
              <th scope="col">EXPIRE DATE</th>
              <th scope="col">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $rec = $db->query("SELECT * FROM produit ")->fetchAll(PDO::FETCH_OBJ);
                $productsize = sizeof($rec);
                for($j=0; $j<$productsize;$j++){
                    echo('                                        
                      <tr>
                        <th scope="row"><input type="checkbox" /></th>
                        <td class="tm-product-name">'.$rec[$j]->nom.'</td>
                        <td>'.$rec[$j]->prix.'</td>
                        <td>'.$rec[$j]->quantite_stock.'</td>
                        <td>28 March 2019</td>
                        <td>
                          <a href="#" class="tm-product-delete-link">
                            <i class="far fa-trash-alt tm-product-delete-icon"></i>
                          </a>
                        </td>
                      </tr>
                    ');
                }
              ?>   
          </tbody>
        </table>
      </div>
      <!-- table container -->
      <a
        href="./add-product.php"
        class="btn btn-primary btn-block text-uppercase mb-3" name="btnsave">Add new product</a>
      <button class="btn btn-primary btn-block text-uppercase" name="btndelete">
        Delete selected products
      </button>
    </div>
  </div>
  <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
    <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
      <h2 class="tm-block-title">Product Categories</h2>
      <div class="tm-product-table-container">
        <table class="table tm-table-small tm-product-table">
          <tbody>
          <?php
                $rec = $db->query("SELECT * FROM categorie ")->fetchAll(PDO::FETCH_OBJ);
                $productsize = sizeof($rec);
                for($j=0; $j<$productsize;$j++){
                    echo('                                        
                    <tr>
                        <td class="tm-product-name">'.$rec[$j]->nom_categorie.'</td>
                        <td class="text-center">
                          <a href="#" class="tm-product-delete-link">
                            <i class="far fa-trash-alt tm-product-delete-icon"></i>
                          </a>
                        </td>
                      </tr>
                    ');
                }
              ?>   
          </tbody>
        </table>
      </div>
      <a
        href="./add-categorie.php"
        class="btn btn-primary btn-block text-uppercase mb-3" name="btnsave2">Add new Categorie</a>
    </div>
  </div>
</div>