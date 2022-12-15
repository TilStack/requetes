<div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Clients List</h2>                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Identification</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">secon name</th>
                                    <th scope="col">LOCATION</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">phone number</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $rec = $db->query("SELECT * FROM client ")->fetchAll(PDO::FETCH_OBJ);
                                    $clientsize = sizeof($rec);
                                    for($z=0; $z<$clientsize;$z++){
                                        echo('                                        
                                        <tr>
                                            <th scope="row"><b>'.$rec[$z]->Id.'</b></th>
                                            <td>
                                                <div class="tm-status-circle moving">
                                                </div>'.$rec[$z]->nom.'
                                            </td>
                                            <td><b>'.$rec[$z]->prenom.'</b></td>
                                            <td><b>'.$rec[$z]->localisation.'</b></td>
                                            <td><b>'.$rec[$z]->email.'</b></td>
                                            <td>'.$rec[$z]->telephone.'</td>
                                        </tr>
                                        ');
                                    }
                                ?>                             
                            </tbody>
                        </table>
                    </div>
                </div>