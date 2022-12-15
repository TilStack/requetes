<div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Ventes List</h2>                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Client Name</th>
                                    <th scope="col">Vendeur Name</th>
                                    <th scope="col">Date Vente</th>
                                    <th scope="col">QUantité</th>
                                    <th scope="col">Product Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $rec = $db->query("SELECT * FROM vente ")->fetchAll(PDO::FETCH_OBJ);
                                    $clientsize = sizeof($rec);
                                    for($z=0; $z<$clientsize;$z++){
                                        echo('                                        
                                        <tr>
                                            <th scope="row"><b>'.$rec[$z]->Id_client.'</b></th>
                                            <td>
                                                <div class="tm-status-circle moving">
                                                </div>'.$rec[$z]->id_vendeur.'
                                            </td>
                                            <td><b>'.$rec[$z]->date_vente.'</b></td>
                                            <td><b>'.$rec[$z]->quantite.'</b></td>
                                            <td><b>'.$rec[$z]->id_produit.'</b></td>
                                        </tr>
                                    ');
                                    }
                                ?>                             
                            </tbody>
                        </table>
                    </div>
                </div>