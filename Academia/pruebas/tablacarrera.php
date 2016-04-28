                  <table class="table table-hover">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Codigo de Carrera</th>
                            <th style="text-align:left;">Nombre de Carrera</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                          <td><?php echo $r->__GET('codigoCarrera'); ?></td>
                          <td><?php echo $r->__GET('nombreCarrera'); ?></td>
                          
                            <td>
                              <a href="?action=editar&idcarrera=<?php echo $r->idcarrera; ?>">
                                <button type="button" class="btn btn-default">
                                  <span class="glyphicon glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </button>
                              </a>
                            </td>

                          <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletecarrera">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </button>
                              <!-- modal          -->
                              <div id="deletecarrera" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog modal-sm">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
                                    </div>
                                    <div class="modal-body">
                                      <h5>Desea continuar ?</h5> 
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <a href="?action=eliminar&idcarrera=<?php echo $r->idcarrera; ?>">
                                        <button type="button" class="btn btn-danger"   >
                                          <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Eliminar
                                        </button>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- modal -->
                          </td>
                        </tr>
                    <?php endforeach; ?>
                    </table>