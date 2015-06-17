<?php

class MascotasController extends AppController {

  public $layout = 'kennel';
  public $uses = array('Mascota', 'Raza', 'Propietario', 'Criadero', 'Departamento', 'EstadosMascota', 'Ingreso', 'EventosMascotasPuntaje',
    'Mascotaspropietario', 'Examene', 'Examenesmascota', 'Mascotastitulo', 'Titulo');
  var $components = array('RequestHandler', 'DataTable');

  //var $helpers = array('Html','Ajax','Javascript');
  public function beforeFilter() {
    parent::beforeFilter();
    if ($this->RequestHandler->responseType() == 'json') {
      $this->RequestHandler->setContent('json', 'application/json');
    }
    $this->Auth->allow(array('ajaxlistado', 'busqueda', 'ver'));
    /* $role = $this->Session->read('Auth.User.role');
      if($role != 'administrador')
      {
      $this->Auth->deny(array('index','elimina','pendientes'));
      }
      $this->Auth->deny(); */
  }

  public function index() {
    //debug($this->RequestHandler->responseType());exit;
    if ($this->RequestHandler->responseType() == 'json') {
      $this->Mascota->virtualFields = array(
        'together' => "CONCAT('" . '<a href="#myModal" data-toggle="modal" class="label label-info edita" id="' . "',Mascota.id,'" . '"' . ' onclick="cargadatos(' . "', " . '' . "Mascota.id" . '' . " ,'" . ')">Editar</a> <a class="label label-warning generaciones_m" href="javascript:" onclick="generaciones(' . "', " . '' . "Mascota.id" . '' . " ,'" . ')">Generaciones</a> <a class="label label-warning" href="javascript:"  onclick="ver(' . "', " . '' . "Mascota.id" . '' . " ,'" . ')">Ver</a> <a class="label label-important elimina_m" href="javascript:"' . ' onclick="elimina(' . "', " . '' . "Mascota.id" . '' . " ,'" . ')">Eliminar</a>' . "')"
        //,'prop' => 'SELECT titulo_id FROM mascotas_titulos WHERE mascota_id = Mascota.id'
      );
      $this->paginate = array(
        'fields' => array('Mascota.kcb', 'Mascota.nombre_completo', 'Mascota.num_tatuaje', 'Raza.nombre', 'Propietarioactual.nombre', 'Mascota.together', 'Mascota.verificado'),
        //'joins' => array( array('table' => 'mascotas_propietarios', 'alias' => 'Mascotaspropieatario', 'type' => 'LEFT', 'conditions' => array( 'Mascota.id = Mascotaspropieatario.mascota_id' ) ) ),
        'conditions' => array('Mascota.kcb !=' => array('null', 'nulo'), 'Mascota.solicitud !=' => 1), 'recursive' => 0,
        'order' => 'Mascota.kcb ASC'
      );
      $this->DataTable->fields = array('Mascota.kcb', 'Mascota.nombre_completo', 'Mascota.num_tatuaje', 'Raza.nombre', 'Propietarioactual.nombre', 'Mascota.together', 'Mascota.verificado');
      $this->DataTable->emptyEleget_usuarios_adminments = 1;
      $this->set('mascotas', $this->DataTable->getResponse());
      $this->set('_serialize', 'mascotas');
    }
    $razas = $this->Raza->find('list', array('order' => 'Raza.nombre ASC', 'fields' => 'Raza.nombre'));
    $this->set(compact('razas'));
  }

  public function ajaxmascota($idMascota = null, $mensajem = null) {
    $this->layout = 'ajax';
    $razas = $this->Raza->find('list', array('fields' => 'Raza.nombre_completo', 'order' => 'Raza.nombre ASC'));
    //debug($razas);exit;
    //$dcm = $this->Mascota->find('list', array('recursive' => -1, 'fields' => array('nombre_completo'),'order' => 'Mascota.nombre_completo ASC'));
    $dcp = $this->Propietario->find('list', array('recursive' => -1, 'fields' => 'Propietario.nombre', 'order' => 'Propietario.nombre ASC'));
    //debug($dcp);exit;
    $criaderos = $this->Criadero->find('list', array('fields' => array('Criadero.id', 'Criadero.nombre'), 'order' => 'Criadero.nombre ASC'));
    $departamentos = $this->Departamento->find('list', array('fields' => array('Departamento.id', 'Departamento.nombre'), 'order' => 'Departamento.nombre ASC'));
    $this->Mascota->id = $idMascota;
    if (isset($mensajem)) {
      $this->request->data = $this->Session->read('mascota');
      $this->Session->delete('mascota');
    } else {
      $this->request->data = $this->Mascota->read();
    }

    if (!empty($idMascota)) {
      $estados = $this->EstadosMascota->findAllBymascota_id($idMascota, null, null, -1);
      foreach ($estados as $es) {
        for ($i = 1; $i <= 5; $i++) {
          if ($es['EstadosMascota']['estado_id'] == $i) {
            $this->request->data['EstadosMascota'][$i - 1]['id'] = $es['EstadosMascota']['id'];
            $this->request->data['EstadosMascota'][$i - 1]['estado_id'] = 1;
            $this->request->data['EstadosMascota'][$i - 1]['fecha'] = $es['EstadosMascota']['fecha'];
            $this->request->data['EstadosMascota'][$i - 1]['observacion'] = $es['EstadosMascota']['observacion'];
          }
        }
      }
    }
    $dcr = $this->Raza->find('all', array('recursive' => -1));
    $this->set(compact('dcr', 'razas', 'dcm', 'dcp', 'criaderos', 'departamentos', 'idMascota', 'mensajem'));
  }

  public function guardamascota() {
    //debug($this->request->data);exit;
    if (!empty($this->request->data)) {
      //debug($this->request->data);exit;
      $cadena_nombre = null;
      $this->Mascota->create();
      if ($this->request->data['Mascota']['orden'] == 0) {

        $cadena_nombre = $this->request->data['Mascota']['nombre'];

        if ($this->request->data['Mascota']['prefijo'] != null) {
          $cadena_nombre .= " ";
          $cadena_nombre .= $this->request->data['Mascota']['prefijo'];
        }
        //debug('entro');exit;
        if (!empty($this->request->data['Mascota']['criadero_id'])) {
          $criadero = $this->Criadero->find('first', array(
            'conditions' => array('Criadero.id' => $this->request->data['Mascota']['criadero_id']),
            'recursive' => -1
          ));
          //debug($criadero);

          if (!empty($criadero)) {

            $nombre_criadero = $criadero['Criadero']['nombre'];
            $cadena_nombre .= " " . $nombre_criadero;
          }
        }
      } elseif ($this->request->data['Mascota']['orden'] == 1) {

        if ($this->request->data['Mascota']['criadero_id'] != '') {
          $criadero = $this->Criadero->find('first', array(
            'conditions' => array('Criadero.id' => $this->request->data['Mascota']['criadero_id']),
            'recursive' => -1
          ));
          //debug($criadero);
          if (!empty($criadero)) {
            $nombre_criadero = $criadero['Criadero']['nombre'];
            $cadena_nombre .= $nombre_criadero;
          }
        }
        if ($this->request->data['Mascota']['prefijo'] != null) {
          $cadena_nombre .= " ";
          $cadena_nombre .= $this->request->data['Mascota']['prefijo'];
        }

        $cadena_nombre .= " " . $this->request->data['Mascota']['nombre'];
      }

      $cadena_nombre = strtoupper($cadena_nombre);
      $this->request->data['Mascota']['nombre_completo'] = $cadena_nombre;
      if (empty($this->request->data['Mascota']['kcb'])) {
        $this->request->data['Mascota']['kcb'] = 'nulo';
      }
      //debug($this->request->data);exit;
      if (!empty($this->request->data['Mascota']['criadero_id'])) {
        $this->request->data['Mascota']['propietario_id'] = $this->get_prop_cri($this->request->data['Mascota']['criadero_id']);
        //debug($this->request->data['Mascota']['propietario_id']);exit;
      }
      $valida = $this->validar('Mascota');
      if (empty($valida)) {
        //debug($valida);exit;
        if ($this->Mascota->save($this->request->data['Mascota'])) {
          //exit;
          $idMascota = $this->Mascota->getLastInsertID();
          //debug($idMascota);
          if (empty($idMascota)) {
            $idMascota = $this->request->data['Mascota']['id'];
          }
          //debug($idMascota);
          if (!empty($this->request->data['EstadosMascota'][0]['estado_id'])) {
            $this->EstadosMascota->create();
            $this->request->data['EstadosMascota']['id'] = $this->request->data['EstadosMascota'][0]['id'];
            $this->request->data['EstadosMascota']['mascota_id'] = $idMascota;
            $this->request->data['EstadosMascota']['estado_id'] = 1;
            $this->request->data['EstadosMascota']['fecha'] = $this->request->data['EstadosMascota'][0]['fecha'];
            $this->request->data['EstadosMascota']['observacion'] = $this->request->data['EstadosMascota'][0]['observacion'];
            $this->EstadosMascota->save($this->request->data);
          } else {
            //echo '0';die;
            $this->EstadosMascota->deleteAll(array('EstadosMascota.estado_id' => 1));
          }
          if (!empty($this->request->data['EstadosMascota'][1]['estado_id'])) {
            $this->EstadosMascota->create();
            $this->request->data['EstadosMascota']['id'] = $this->request->data['EstadosMascota'][1]['id'];
            $this->request->data['EstadosMascota']['mascota_id'] = $idMascota;
            $this->request->data['EstadosMascota']['estado_id'] = 2;
            $this->request->data['EstadosMascota']['fecha'] = $this->request->data['EstadosMascota'][1]['fecha'];
            $this->request->data['EstadosMascota']['observacion'] = "";
            $this->EstadosMascota->save($this->request->data);
          } else {
            //echo '1';die;
            $this->EstadosMascota->deleteAll(array('EstadosMascota.estado_id' => 2));
          }
          if (!empty($this->request->data['EstadosMascota'][2]['estado_id'])) {
            $this->EstadosMascota->create();
            $this->request->data['EstadosMascota']['id'] = $this->request->data['EstadosMascota'][2]['id'];
            $this->request->data['EstadosMascota']['mascota_id'] = $idMascota;
            $this->request->data['EstadosMascota']['estado_id'] = 3;
            $this->request->data['EstadosMascota']['fecha'] = $this->request->data['EstadosMascota'][2]['fecha'];
            $this->request->data['EstadosMascota']['observacion'] = "";
            $this->EstadosMascota->save($this->request->data);
          } else {
            //echo '2';die;
            $this->EstadosMascota->deleteAll(array('EstadosMascota.estado_id' => 3));
          }
          if (!empty($this->request->data['EstadosMascota'][3]['estado_id'])) {
            $this->EstadosMascota->create();
            $this->request->data['EstadosMascota']['id'] = $this->request->data['EstadosMascota'][3]['id'];
            $this->request->data['EstadosMascota']['mascota_id'] = $idMascota;
            $this->request->data['EstadosMascota']['estado_id'] = 4;
            $this->request->data['EstadosMascota']['fecha'] = $this->request->data['EstadosMascota'][3]['fecha'];
            $this->request->data['EstadosMascota']['observacion'] = $this->request->data['EstadosMascota'][3]['observacion'];
            $this->EstadosMascota->save($this->request->data);
          } else {
            //echo '3';die;
            $this->EstadosMascota->deleteAll(array('EstadosMascota.estado_id' => 4));
          }
          if (!empty($this->request->data['EstadosMascota'][4]['estado_id'])) {
            $this->EstadosMascota->create();
            $this->request->data['EstadosMascota']['id'] = $this->request->data['EstadosMascota'][4]['id'];
            $this->request->data['EstadosMascota']['mascota_id'] = $idMascota;
            $this->request->data['EstadosMascota']['estado_id'] = 5;
            $this->request->data['EstadosMascota']['fecha'] = $this->request->data['EstadosMascota'][4]['fecha'];
            $this->request->data['EstadosMascota']['observacion'] = $this->request->data['EstadosMascota'][4]['observacion'];
            $this->EstadosMascota->save($this->request->data);
          } else {
            //echo '4';die;
            $this->EstadosMascota->deleteAll(array('EstadosMascota.estado_id' => 5));
          }
          //die;

          $this->request->data['Mascota']['id'] = $idMascota;
          //debug($this->request->data);exit;
          $this->Mascota->save($this->request->data['Mascota']);
          $this->request->data = '';

          $this->propietario_actual($idMascota);
          if ($this->RequestHandler->isAjax()) {

            $this->layout = 'ajax';
            $this->redirect(array('action' => 'ajaxmascota', $idMascota));
          } else {

            $this->Session->setFlash('Se guardo correctamente!!!', 'msgbueno');
            $this->redirect($this->referer());
          }
        } else {
          
        }
      } else {
        //debug($valida);exit;
        if (!empty($this->request->data['Mascota']['id'])) {
          $idMascota = $this->request->data['Mascota']['id'];
        } else {
          $idMascota = 0;
        }
        if ($this->RequestHandler->isAjax()) {
          $this->Session->write('mascota', $this->request->data);
          $this->layout = 'ajax';
          $this->redirect(array('action' => 'ajaxmascota', $idMascota, $valida));
        } else {

          $this->Session->setFlash($valida, 'msgerror');
          $this->redirect($this->referer());
        }
      }
    } else {
      
    }
  }

  public function get_prop_cri($idCriadero) {
    $criadero = $this->Criadero->find('first', array('recursive' => -1, 'conditions' => array('Criadero.id' => $idCriadero)));
    if (!empty($criadero)) {
      return $criadero['Criadero']['propietario_id'];
    } else {
      return null;
    }
  }

  public function examenes($idMascota = null) {
    $this->layout = 'ajax';
    $examenes = $this->Examenesmascota->findAllBymascota_id($idMascota, null, null, 0);
    $this->set(compact('examenes', 'idMascota'));
  }

  public function examen($idMascota = null, $idExamen = null) {
    $this->layout = 'ajax';
    $examenes = $this->Examene->find('list', array('fields' => 'Examene.descripcion'));
    if (!empty($idExamen)) {
      $this->Examenesmascota->id = $idExamen;
      $this->request->data = $this->Examenesmascota->read();
    }
    $this->set(compact('examenes', 'idMascota'));
  }

  public function guardaexamen($idMascota = null) {
    $this->layout = 'ajax';
    //debug($idMascota);exit;
    if (!empty($this->request->data)) {
      $this->Examenesmascota->create();
      $this->request->data['Examenesmascota']['mascota_id'] = $idMascota;
      $this->Examenesmascota->save($this->request->data['Examenesmascota']);
      $this->redirect(array('action' => 'examenes', $idMascota));
    } else {
      $this->redirect(array('action' => 'examenes', $idMascota));
    }
  }

  public function examenelimina($idMascota = null, $idExamen = null) {
    $this->layout = 'ajax';
    $this->Examenesmascota->delete($idExamen);
    $this->redirect(array('action' => 'examenes', $idMascota));
  }

  public function transferencias($idMascota = null) {
    $this->layout = 'ajax';
    $transferencias = $this->Mascotaspropietario->findAllBymascota_id($idMascota, null, null, 0);
    $this->set(compact('transferencias', 'idMascota'));
  }

  public function transferencia($idMascota = null, $idTransferencia = null) {
    $this->layout = 'ajax';
    $propietarios = $this->Propietario->find('list', array('fields' => 'Propietario.nombre'));

    $this->Mascotaspropietario->id = $idTransferencia;
    $this->request->data = $this->Mascotaspropietario->read();
    //$idIngreso = $this->request->data['Mascotaspropietario']['ingreso_id'];

    $pagos = $this->Ingreso->find('list', array('order' => 'Ingreso.id DESC', 'recursive' => 2, 'fields' => 'Tramite.nombre',
      'conditions' => array('Ingreso.user_id' => $this->Session->read('Auth.User.id'), 'Ingreso.tramite_id' => array(11, 14), 'OR' => array('Ingreso.estado' => 1))));
    //debug($pagos);exit;
    $this->set(compact('propietarios', 'idMascota', 'pagos'));
  }

  public function guardatransferencia($idMascota = null) {
    $this->layout = 'ajax';
    //debug($idMascota);exit;
    if (!empty($this->request->data)) {
      if (!empty($this->request->data['Propietario']['nombre_aux'])) {
        $this->Propietario->create();
        $this->request->data['Propietario']['nombre'] = $this->request->data['Propietario']['nombre_aux'];
        $this->request->data['Propietario']['direccion'] = $this->request->data['Propietario']['direccion_aux'];
        $this->request->data['Propietario']['telefono1'] = $this->request->data['Propietario']['telefono1_aux'];
        $this->request->data['Propietario']['estado'] = 0;
        $this->Propietario->save($this->request->data['Propietario']);
        $idPropietario = $this->Propietario->getLastInsertID();
        $this->request->data['Mascotaspropietario']['propietario_id'] = $idPropietario;
        //$this->request->data['Mascota']['propietarioactual_id'] = $idPropietario;
      }
      /* if(!empty($this->request->data['Mascotaspropietario']['propietario_id']))
        {
        $idPropietario = $this->request->data['Mascotaspropietario']['propietario_id'];
        $this->request->data['Mascota']['propietarioactual_id'] = $idPropietario;
        } */
      $this->Mascotaspropietario->create();
      $this->request->data['Mascotaspropietario']['mascota_id'] = $idMascota;
      if ($this->Mascotaspropietario->save($this->request->data['Mascotaspropietario'])) {
        $this->propietario_actual($idMascota);
        /* $this->Mascota->id = $idMascota;

          $this->Mascota->save($this->request->data['Mascota']); */
      }
      $this->redirect(array('action' => 'transferencias', $idMascota));
    } else {
      $this->redirect(array('action' => 'transferencias', $idMascota));
    }
  }

  public function transferenciaelimina($idMascota = null, $idTransferencia = null) {
    $this->layout = 'ajax';
    $this->Mascotaspropietario->delete($idTransferencia);
    $this->propietario_actual($idMascota);
    $this->redirect(array('action' => 'transferencias', $idMascota));
  }

  public function titulos($idMascota = null) {
    $this->layout = 'ajax';
    $titulos = $this->Mascotastitulo->findAllBymascota_id($idMascota, null, null, 0);
    $this->set(compact('titulos', 'idMascota'));
  }

  public function titulo($idMascota = null, $idTitulo = null) {
    $this->layout = 'ajax';
    $titulos = $this->Titulo->find('list', array('fields' => 'Titulo.nombre'));
    if (!empty($idTitulo)) {
      $this->Mascotastitulo->id = $idTitulo;
      $this->request->data = $this->Mascotastitulo->read();
    }
    $this->set(compact('titulos', 'idMascota'));
  }

  public function guardatitulo($idMascota = null) {
    $this->layout = 'ajax';
    //debug($idMascota);exit;
    if (!empty($this->request->data)) {
      $this->Mascotastitulo->create();
      $this->request->data['Mascotastitulo']['mascota_id'] = $idMascota;
      $this->Mascotastitulo->save($this->request->data['Mascotastitulo']);
      $this->redirect(array('action' => 'titulos', $idMascota));
    } else {
      $this->redirect(array('action' => 'titulos', $idMascota));
    }
  }

  public function tituloelimina($idMascota = null, $idTitulo = null) {
    $this->layout = 'ajax';
    $this->Mascotastitulo->delete($idTitulo);
    $this->redirect(array('action' => 'titulos', $idMascota));
  }

  public function elimina($idMascota = null) {
    $this->Mascota->delete($idMascota);
    $this->Session->setFlash('Se elimino correctamente', 'msgbueno');
    $this->redirect($this->referer());
  }

  public function generaciones($idMascota = null) {
    $padre[0] = $this->Mascota->findByid($idMascota, null, null, -1);
    ;
    $j = 0;
    for ($i = 1; $i <= 30; $i++) {

      if (($i % 2) == 0) {
        if (!empty($padre[$j]['Mascota']['reproductora_id'])) {
          $padre[$i] = $this->Mascota->findByid($padre[$j]['Mascota']['reproductora_id'], null, null, -1);
        }
        $j++;
      } else {
        if (!empty($padre[$j]['Mascota']['reproductor_id'])) {
          $padre[$i] = $this->Mascota->findByid($padre[$j]['Mascota']['reproductor_id'], null, null, -1);
        }
      }
    }
    $this->set(compact('padre'));
  }

  public function autoComplete() {
    $this->layout = 'ajax';
    $listado = $this->Mascota->find('all', array(
      'conditions' => array(
        'Mascota.nombre_completo LIKE' => '%' . $this->params['url']['q'] . '%'
      ),
      'limit' => $this->params['url']['limit'],
      'fields' => array('nombre_completo', 'id')
    ));
    //debug($listado);exit;
    $this->set(compact('listado'));
  }

  public function ajaxpadre($idMascota = null, $generacion = null, $tpadre = null, $idPadre = null, $mensajem = null) {
    $this->layout = 'ajax';
    $this->Mascota->id = $generacion;
    $this->request->data = $this->Mascota->read();
    $padres = $this->Mascota->find('list', array('fields' => 'Mascota.nombre_completo', 'order' => 'Mascota.nombre_completo ASC'));
    $this->set(compact('idMascota', 'padres', 'generacion', 'idPadre', 'tpadre', 'mensajem'));
  }

  public function guarda_ajaxmascota($idMascota = null, $generacion = null) {
    //debug($this->request->data);exit;
    if (!empty($this->request->data)) {
      $this->request->data['Mascota']['id'] = $generacion;

      if ($this->Mascota->save($this->request->data)) {
        $this->Session->setFlash('Se registro correctamente', 'msgbueno');
        $this->redirect(array('action' => 'generaciones', $idMascota));
      } else {
        $this->Session->setFlash('No se registro', 'msgerror');
        $this->redirect(array('action' => 'generaciones', $idMascota));
      }
    } else {
      $this->Session->setFlash('No se registro', 'msgerror');
      $this->redirect(array('action' => 'generaciones', $idMascota));
    }
  }

  public function combomascotas1($campoform = null, $div = null) {
    $this->layout = 'ajax';
    //debug($campoform);exit;
    $this->set(compact('campoform', 'div'));
  }

  public function combomascotas2($campoform = null, $div = null) {
    $this->layout = 'ajax';
    //debug($this->request->data);exit;
    if (!empty($this->request->data['Mascota']['nombre_completo'])) {
      $listamascotas = $this->Mascota->find('all', array('recursive' => -1,
        'conditions' =>
        array('Mascota.nombre_completo LIKE' => '%' . $this->request->data['Mascota']['nombre_completo'] . "%"),
        'limit' => 8,
        'order' => 'Mascota.nombre_completo ASC'
      ));
    }
    //debug($listamascotas);exit;
    $this->set(compact('listamascotas', 'div', 'campoform'));
  }

  public function combomascotas3($campoform = null, $div = null, $idMascota = null) {
    $this->layout = 'ajax';
    $smascota = $this->Mascota->findByid($idMascota, null, null, -1);
    $this->set(compact('campoform', 'smascota', 'div'));
  }

  public function ver($idMascota = null) {
    $mascota = $this->Mascota->findByid($idMascota);
    $examenes = $this->Examenesmascota->findAllBymascota_id($idMascota);
    $transferencias = $this->Mascotaspropietario->findAllBymascota_id($idMascota, null, null, null, null, 0);
    $titulos = $this->Mascotastitulo->findAllBymascota_id($idMascota);
    //debug(trim($mascota['Mascota']['nombre_completo']));exit;
    //debug($mascota);exit;
    if (empty($mascota['Mascota']['imagen'])) {
      $imagen = 'perro.jpg';
    } else {
      $imagen = 'fotos/' . $mascota['Mascota']['imagen'];
    }

    $padre[0] = $this->Mascota->findByid($idMascota, null, null, -1);
    ;
    $j = 0;
    for ($i = 1; $i <= 30; $i++) {

      if (($i % 2) == 0) {
        if (!empty($padre[$j]['Mascota']['reproductora_id'])) {
          $padre[$i] = $this->Mascota->findByid($padre[$j]['Mascota']['reproductora_id'], null, null, -1);
        }
        $j++;
      } else {
        if (!empty($padre[$j]['Mascota']['reproductor_id'])) {
          $padre[$i] = $this->Mascota->findByid($padre[$j]['Mascota']['reproductor_id'], null, null, -1);
        }
      }
    }


    $observaciones = $this->EstadosMascota->find('all', array('recursive' => -1, 'conditions' => array('EstadosMascota.mascota_id' => $idMascota)));
    //$prueba = $mascota['Mascota']['nombre_completo'];
    $eventos = $this->EventosMascotasPuntaje->findAllBymascota_id($idMascota, null, array('EventosMascotasPuntaje.id' => 'desc'), null, null, 0);
    //debug($observaciones);exit;
    $this->set(compact('mascota', 'examenes', 'transferencias', 'titulos', 'imagen', 'padre', 'eventos', 'observaciones'));
  }

  public function pendientes() {
    $this->layout = 'ajax';
    $numero = $this->Mascota->find('count', array('conditions' => array('Mascota.solicitud' => 1)));
    //debug($numero);exit;
    $this->set(compact('numero'));
  }

  public function get_mascotas_pendientes() {
    return $this->Mascota->find('count', array('conditions' => array('Mascota.solicitud' => 1)));
  }

  public function busqueda($tipo = null) {
    $this->layout = 'ajax';
    //debug($tipo);
    //debug($this->request->data['Mascota']['campomascota']);exit;
    $campo = $this->request->data['Mascota']['campomascota'];
    $mascotas = $this->Mascota->find('all', array('recursive' => 0, 'limit' => 10, 'order' => 'Mascota.id DESC', 'conditions' =>
      array('Mascota.' . $tipo . ' LIKE' => '%' . $campo . '%')));
    //debug($mascotas);exit;
    $this->set(compact('mascotas', 'campo'));
  }

  public function listapendientes() {

    $mascotas = $this->Mascota->find('all', array('conditions' => array('Mascota.solicitud' => 1)));
    $this->set(compact('mascotas'));
  }

  public function alta($idMascota = null) {
    $this->Mascota->create();
    $this->request->data['Mascota']['id'] = $idMascota;
    $this->request->data['Mascota']['estado'] = 1;
    $this->Mascota->save($this->request->data['Mascota']);
    $this->Session->setFlash('Se cambio el estado correctamente!!!', 'msgbueno');
    $this->redirect($this->referer());
  }

  public function baja($idMascota = null) {
    $this->Mascota->create();
    $this->request->data['Mascota']['id'] = $idMascota;
    $this->request->data['Mascota']['estado'] = 0;
    $this->Mascota->save($this->request->data['Mascota']);
    $this->Session->setFlash('Se cambio el estado correctamente!!!', 'msgbueno');
    $this->redirect($this->referer());
  }

  public function ajaxlistado($todos = null) {
    $this->layout = 'ajax';
    //debug($this->request->data);exit;
    $condiones = null;
    if (!empty($this->request->data['Mascota']['nombre'])) {
      $condiones['Mascota.nombre LIKE'] = '%' . $this->request->data['Mascota']['nombre'] . '%';
    }
    if (!empty($this->request->data['Mascota']['kcb'])) {
      $condiones['Mascota.kcb LIKE'] = '%' . $this->request->data['Mascota']['kcb'] . '%';
    }
    if (!empty($this->request->data['Mascota']['num_tatuaje'])) {
      $condiones['Mascota.num_tatuaje LIKE'] = '%' . $this->request->data['Mascota']['num_tatuaje'] . '%';
    }
    if (!empty($this->request->data['Mascota']['chip'])) {
      $condiones['Mascota.chip LIKE'] = '%' . $this->request->data['Mascota']['chip'] . '%';
    }
    if (!empty($this->request->data['Mascota']['raza_id'])) {
      $condiones['Mascota.raza_id'] = $this->request->data['Mascota']['raza_id'];
    }
    if (!empty($this->request->data['Mascota']['fecha_nacimiento'])) {
      $condiones['Mascota.fecha_nacimiento'] = $this->request->data['Mascota']['fecha_nacimiento'];
    }
    if (!empty($this->request->data['Mascota']['propietario_id'])) {
      $condiones['Mascota.propietarioactual_id'] = $this->request->data['Mascota']['propietario_id'];
    }
    if ($condiones != null) {
      $mascotas = $this->Mascota->find('all', array('conditions' => $condiones));
    } else {
      $mascotas = null;
    }
    if ($todos == 1) {
      $mascotas = $mascotas = $this->Mascota->find('all');
    }
    $this->set(compact('mascotas'));
  }

  public function crea_propietario_actual() {

    $mascotas = $this->Mascota->find('all', array('recursive' => -1, 'conditions' => array('Mascota.id >=' => '7361'), 'fields' => array('Mascota.id', 'Mascota.propietario_id')));
    //debug($mascotas);exit;
    foreach ($mascotas as $ma) {
      $propac = null;
      $mascotas_prop = $this->Mascotaspropietario->find('first', array('recursive' => -1, 'fields' => array('Mascotaspropietario.propietario_id'), 'order' => 'Mascotaspropietario.id DESC', 'conditions' => array('Mascotaspropietario.mascota_id' => $ma['Mascota']['id'])));
      if (!empty($mascotas_prop)) {
        $propac = $mascotas_prop['Mascotaspropietario']['propietario_id'];
      } else {
        $propac = $ma['Mascota']['propietario_id'];
      }
      $this->Mascota->id = $ma['Mascota']['id'];
      $this->request->data['Mascota']['propietarioactual_id'] = $propac;
      $this->Mascota->save($this->request->data['Mascota']);
    }
    debug('Termino todo');
    exit;
  }

  public function propietario_actual($idMascota = null) {
    //debug($idMascota);exit;
    $propac = null;
    $mascota = $this->Mascota->findByid($idMascota, null, null, null, null, -1);
    $mascotas_prop = $this->Mascotaspropietario->find('first', array('recursive' => -1, 'order' => 'Mascotaspropietario.fecha_transfer DESC', 'conditions' => array('Mascotaspropietario.mascota_id' => $idMascota)));
    if (!empty($mascotas_prop)) {
      $propac = $mascotas_prop['Mascotaspropietario']['propietario_id'];
    } else {
      if (empty($mascota['Mascota']['propietarioactual_id'])) {
        $propac = $mascota['Mascota']['propietario_id'];
        //debug($propac);exit;
      } else {
        $propac = $mascota['Mascota']['propietarioactual_id'];
      }
    }

    $this->Mascota->id = $idMascota;
    $this->request->data['Mascota']['propietarioactual_id'] = $propac;
    $this->Mascota->save($this->request->data['Mascota']);
  }

  public function aceptar($idMascota = null) {
    $this->Mascota->id = $idMascota;
    $this->request->data['Mascota']['solicitud'] = 2;
    $this->Mascota->save($this->request->data['Mascota']);
    $this->Session->setFlash('Se acepto a la mascota de id ' . $idMascota, 'msgbueno');
    $this->redirect($this->referer());
  }

  public function certificado($idMascota = null) {
    $this->layout = 'certificado';

    $mascota = $this->Mascota->find('first', array(
      'conditions' => array('Mascota.id' => $idMascota)
      , 'fields' => array('Mascota.nombre_completo', 'Criadero.nombre', 'Criadero.registro_fci', 'Criadero.direccion', 'Criadero.departamento_id', 'Propietario.nombre', 'Raza.nombre', 'Mascota.color', 'Mascota.senas', 'Propietario.direccion', 'Propietario.telefono1', 'Propietario.celular', 'Propietario.telefono2', 'Mascota.kcb', 'Mascota.num_tatuaje', 'Mascota.chip', 'Propietario.email1', 'Propietario.email2', 'Mascota.hermano', 'Mascota.sexo', 'Mascota.fecha_nacimiento', 'Mascota.consanguinidad', 'Mascota.lechigada')
    ));
    //debug($mascota);exit;
    $titulos = $this->Mascotastitulo->find('all', array(
      'conditions' => array('Mascotastitulo.mascota_id' => $idMascota)
      , 'fields' => array('Titulo.nombre')
    ));
    //debug($titulos);exit;
    $vartitulos = '';

    foreach ($titulos as $ti) {
      $vartitulos = $vartitulos . $ti['Titulo']['nombre'] . ' ';
    }
    $padre = $this->get_generaciones($idMascota);
    //debug($padre);exit;
    //debug($vartitulos);exit;
    $this->set(compact('mascota', 'vartitulos', 'padre', 'idMascota'));
  }

  public function certificado2($idMascota = null) {
    $this->layout = 'certificado';
    $a_cria = $this->Examenesmascota->find('first', array('recursive' => -1, 'conditions' => array('Examenesmascota.mascota_id' => $idMascota, 'Examenesmascota.examene_id' => 2)));
    $a_reproduccion = $this->Examenesmascota->find('first', array('recursive' => -1, 'conditions' => array('Examenesmascota.mascota_id' => $idMascota, 'Examenesmascota.examene_id' => 3)));
    $displacias = $this->Examenesmascota->find('all', array('recursive' => -1, 'conditions' => array('Examenesmascota.mascota_id' => $idMascota, 'Examenesmascota.examene_id' => 1)));
    $transferencias = $this->Mascotaspropietario->find('all', array('recursive' => 0, 'conditions' => array('Mascotaspropietario.mascota_id' => $idMascota)));
    //debug($transferencias);exit;
    $this->set(compact('idMascota', 'transferencias', 'displacias', 'a_reproduccion', 'a_cria'));
  }

  public function get_generaciones($idMascota = null) {
    $padre[0] = $this->Mascota->find('first', array(
      'recursive' => -1
      , 'conditions' => array('Mascota.id' => $idMascota)
      , 'fields' => array('Mascota.id', 'Mascota.reproductor_id', 'Mascota.reproductora_id', 'Mascota.nombre_completo')
    ));
    ;
    $j = 0;
    for ($i = 1; $i <= 30; $i++) {

      if (($i % 2) == 0) {
        if (!empty($padre[$j]['Mascota']['reproductora_id'])) {
          $padre[$i] = $this->Mascota->find('first', array(
            'recursive' => -1
            , 'conditions' => array('Mascota.id' => $padre[$j]['Mascota']['reproductora_id'])
            , 'fields' => array('Mascota.id', 'UPPER(Mascota.nombre_completo) as nombre_completo', 'Mascota.reproductor_id', 'Mascota.reproductora_id', 'Mascota.kcb', 'Mascota.num_tatuaje', 'Mascota.chip', 'Mascota.color', 'UPPER(Mascota.codigo) as codigo', 'Mascota.titulos_ex', 'Mascota.senas')
          ));
          $apto_de_reproduccion = $this->Examenesmascota->find('first', array(
            'conditions' => array('Examenesmascota.mascota_id' => $padre[$j]['Mascota']['reproductora_id'], 'Examenesmascota.examene_id' => 3)
            , 'fields' => array('Examene.descripcion', 'Examenesmascota.observacion', 'Examenesmascota.resultado')
          ));
          if (!empty($apto_de_reproduccion)) {
            $padre[$i]['apto_reproduccion'] = $apto_de_reproduccion;
          }
          //Aumentando campo de apto de cria
          $apto_de_cria = $this->Examenesmascota->find('first', array(
            'conditions' => array('Examenesmascota.mascota_id' => $padre[$j]['Mascota']['reproductora_id'], 'Examenesmascota.examene_id' => 2)
            , 'fields' => array('Examene.descripcion', 'Examenesmascota.observacion', 'Examenesmascota.resultado')
          ));
          if (!empty($apto_de_cria)) {
            $padre[$i]['apto_cria'] = $apto_de_cria;
          }
          //----------------------------------
          //Aumentando campo de displacia
          $displacia = $this->Examenesmascota->find('first', array(
            'conditions' => array('Examenesmascota.mascota_id' => $padre[$j]['Mascota']['reproductora_id'], 'Examenesmascota.examene_id' => 1)
            , 'fields' => array('Examenesmascota.dcf')
          ));
          if (!empty($displacia)) {
            $padre[$i]['displacia'] = $displacia;
          }
          //----------------------------------
          $titulos = $this->Mascotastitulo->find('all', array('recursive' => 0, 'conditions' => array('Mascotastitulo.mascota_id' => $padre[$j]['Mascota']['reproductora_id'])
            , 'fields' => array('Titulo.nombre')
          ));
          $var_titulos = '';

          if (!empty($padre[$i]['Mascota']['titulos_ex'])) {
            $var_titulos = strtoupper($padre[$i]['Mascota']['titulos_ex']);
          }
          if (!empty($titulos)) {
            foreach ($titulos as $ti) {
              $var_titulos = $var_titulos . ' ' . strtoupper($ti['Titulo']['nombre']);
            }
          }
          $padre[$i]['titulos'] = $var_titulos;
        }
        $j++;
      } else {
        if (!empty($padre[$j]['Mascota']['reproductor_id'])) {
          //$padre[$i] = $this->Mascota->findByid($padre[$j]['Mascota']['reproductor_id'],null,null,-1);
          $padre[$i] = $this->Mascota->find('first', array(
            'recursive' => -1
            , 'conditions' => array('Mascota.id' => $padre[$j]['Mascota']['reproductor_id'])
            , 'fields' => array('Mascota.id', 'UPPER(Mascota.nombre_completo) as nombre_completo', 'Mascota.reproductor_id', 'Mascota.reproductora_id', 'Mascota.kcb', 'Mascota.num_tatuaje', 'Mascota.chip', 'Mascota.color', 'UPPER(Mascota.codigo) as codigo', 'Mascota.titulos_ex', 'Mascota.senas')
          ));

          $apto_de_reproduccion = $this->Examenesmascota->find('first', array(
            'conditions' => array('Examenesmascota.mascota_id' => $padre[$j]['Mascota']['reproductor_id'], 'Examenesmascota.examene_id' => 3)
            , 'fields' => array('Examene.descripcion', 'Examenesmascota.observacion', 'Examenesmascota.resultado')
          ));
          if (!empty($apto_de_reproduccion)) {
            $padre[$i]['apto_reproduccion'] = $apto_de_reproduccion;
          }

          //Aumentando campo de apto de cria
          $apto_de_cria = $this->Examenesmascota->find('first', array(
            'conditions' => array('Examenesmascota.mascota_id' => $padre[$j]['Mascota']['reproductor_id'], 'Examenesmascota.examene_id' => 2)
            , 'fields' => array('Examene.descripcion', 'Examenesmascota.observacion', 'Examenesmascota.resultado')
          ));
          if (!empty($apto_de_cria)) {
            $padre[$i]['apto_cria'] = $apto_de_cria;
          }
          //----------------------------------
          //Aumentando campo de displacia
          $displacia = $this->Examenesmascota->find('first', array(
            'conditions' => array('Examenesmascota.mascota_id' => $padre[$j]['Mascota']['reproductor_id'], 'Examenesmascota.examene_id' => 1)
            , 'fields' => array('Examenesmascota.dcf')
          ));
          if (!empty($displacia)) {
            $padre[$i]['displacia'] = $displacia;
          }
          //----------------------------------
          $titulos = $this->Mascotastitulo->find('all', array('recursive' => 0, 'conditions' => array('Mascotastitulo.mascota_id' => $padre[$j]['Mascota']['reproductor_id'])
            , 'fields' => array('Titulo.nombre')
          ));
          $var_titulos = '';
          if (!empty($padre[$i]['Mascota']['titulos_ex'])) {
            $var_titulos = strtoupper($padre[$i]['Mascota']['titulos_ex']);
          }
          if (!empty($titulos)) {
            foreach ($titulos as $ti) {
              $var_titulos = $var_titulos . ' ' . strtoupper($ti['Titulo']['nombre']);
            }
          }
          $padre[$i]['titulos'] = $var_titulos;
        }
      }
    }
    return $padre;
  }

  public function get_departamento($idDepartamento = null) {
    $departamento = '';
    $arraydep = $this->Departamento->findByid($idDepartamento);
    $departamento = $arraydep['Departamento']['nombre'];
    return $departamento;
  }

  public function ajaxextranjero($idMascota = null) {
    $this->layout = 'ajax';
    $razas = $this->Raza->find('list', array('fields' => 'Raza.nombre_completo', 'order' => 'Raza.nombre ASC'));
    $this->set(compact('razas', 'idMascota'));
  }

  public function guardaextranjero() {

    if ($this->request->data['Mascota']) {
      $valida = $this->validar('Mascota');
      if (empty($valida)) {
        $this->Mascota->create();
        $this->request->data['Mascota']['nombre_completo'] = $this->request->data['Mascota']['nombre'];
        $this->Mascota->save($this->request->data['Mascota']);
        $mensajeb = 'Registrado';
      } else {
        $mensajem = $valida;
      }
    } else {
      $mensajem = 'No registrado';
    }
    $this->set(compact('mensajeb', 'mensajem'));
  }

  public function get_mascotas_act() {
    return $this->Mascota->find('count', array('conditions' => array('Mascota.kcb !=' => array('null', 'nulo'), 'Mascota.solicitud !=' => 1)));
  }

  public function SpanishDate() {
    $ano = date('Y');
    $mes = date('n');
    $dia = date('d');
    $mesesN = array(1 => "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
      "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    //debug("$dia/" . $mesesN[$mes] . "/$ano");exit;
    return "$dia/" . $mesesN[$mes] . "/$ano";
  }

  public function camada() {
    $razas = $this->Raza->find('list', array('fields' => 'Raza.nombre_completo', 'order' => 'Raza.nombre ASC'));
    $departamentos = $this->Departamento->find('list', array('fields' => array('Departamento.id', 'Departamento.nombre'), 'order' => 'Departamento.nombre ASC'));
    if ($this->Session->check('camada')) {
      $this->request->data = $this->Session->read('camada');
    }
    $this->set(compact('razas', 'departamentos'));
  }

  public function registrar_camada() {
    if (!empty($this->request->data['Ejemplar'])) {
      $this->Session->write('camada', $this->request->data);
      $aux_hermanos = array();
      foreach ($this->request->data['Ejemplar']['mascotas'] as $key => $ma) {
        $aux_hermanos[$key]['nombre'] = $ma['nombre'];
        $this->request->data['Mascota']['kcb'] = $ma['kcb'];
        $this->request->data['Mascota']['nombre'] = $ma['nombre'];
        $this->request->data['Mascota']['nombre_completo'] = $this->genera_nombre($ma['nombre']);
        $this->request->data['Mascota']['num_tatuaje'] = $ma['num_tatuaje'];
        $this->request->data['Mascota']['chip'] = $ma['chip'];
        $this->request->data['Mascota']['color'] = $ma['color'];
        $this->request->data['Mascota']['senas'] = $ma['senas'];
        $this->request->data['Mascota']['sexo'] = $ma['sexo'];
        $validar = $this->validar('Mascota');
        if (!empty($validar)) {
          $this->Session->setFlash($key . ' ' . $validar);
          $this->redirect(array('action' => 'camada'));
        }
      }
      if (!empty($this->request->data['Mascota']['propietarioactual_id'])) {
        $this->request->data['Mascota']['propietario_id'] = $this->request->data['Mascota']['propietarioactual_id'];
      }
      foreach ($this->request->data['Ejemplar']['mascotas'] as $key => $ma) {
        $this->Mascota->create();
        $this->request->data['Mascota']['kcb'] = $ma['kcb'];
        $this->request->data['Mascota']['nombre'] = $ma['nombre'];
        $this->request->data['Mascota']['nombre_completo'] = $this->genera_nombre($ma['nombre']);
        $this->request->data['Mascota']['num_tatuaje'] = $ma['num_tatuaje'];
        $this->request->data['Mascota']['chip'] = $ma['chip'];
        $this->request->data['Mascota']['color'] = $ma['color'];
        $this->request->data['Mascota']['senas'] = $ma['senas'];
        $this->request->data['Mascota']['sexo'] = $ma['sexo'];
        $this->request->data['Mascota']['hermano'] = $this->genera_hermanos($aux_hermanos, $key);
        $this->Mascota->save($this->request->data['Mascota']);
      }
      $this->Session->delete('camada');
      $this->Session->setFlash('Se registro correctamente!!!', 'msgbueno');
      $this->redirect(array('action' => 'index'));
    }
  }

  public function genera_hermanos($v_hermanos = NULL, $key_no = NULL) {
    $hermano = "";
    $i = 0;
    foreach ($v_hermanos as $key => $her) {
      if ($key != $key_no) {
        if ($i == 0) {
          $hermano = $hermano . "" . $her['nombre'];
        } else {
          $hermano = $hermano . ", " . $her['nombre'];
        }
        $i++;
      }
    }
    return $hermano;
  }

  public function genera_nombre($nombre = NULL) {
    if ($this->request->data['Mascota']['orden'] == 0) {
      $cadena_nombre = $nombre;
      if ($this->request->data['Mascota']['prefijo'] != null) {
        $cadena_nombre .= " ";
        $cadena_nombre .= $this->request->data['Mascota']['prefijo'];
      }
      //debug('entro');exit;
      if (!empty($this->request->data['Mascota']['criadero_id'])) {
        $criadero = $this->Criadero->find('first', array(
          'conditions' => array('Criadero.id' => $this->request->data['Mascota']['criadero_id']),
          'recursive' => -1
        ));
        if (!empty($criadero)) {

          $nombre_criadero = $criadero['Criadero']['nombre'];
          $cadena_nombre .= " " . $nombre_criadero;
        }
      }
    } elseif ($this->request->data['Mascota']['orden'] == 1) {

      if ($this->request->data['Mascota']['criadero_id'] != '') {
        $criadero = $this->Criadero->find('first', array(
          'conditions' => array('Criadero.id' => $this->request->data['Mascota']['criadero_id']),
          'recursive' => -1
        ));
        //debug($criadero);
        if (!empty($criadero)) {
          $nombre_criadero = $criadero['Criadero']['nombre'];
          $cadena_nombre .= $nombre_criadero;
        }
      }
      if ($this->request->data['Mascota']['prefijo'] != null) {
        $cadena_nombre .= " ";
        $cadena_nombre .= $this->request->data['Mascota']['prefijo'];
      }
      $cadena_nombre .= " " . $nombre;
    }
    $cadena_nombre = strtoupper($cadena_nombre);
    return $cadena_nombre;
  }

}

?>
