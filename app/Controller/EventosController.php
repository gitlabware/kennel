<?php

class EventosController extends AppController {

    public $uses = array(
        'Evento',
        'EventosMascota',
        'Criadero',
        'Propietario',
        'Calificacione',
        'Mascota',
        'Raza',
        'Pista',
        'Mascotastitulo',
        'EventosPista',
        'EventosMascota',
        'Denuncianacimiento',
        'EventosMascotasPuntaje',
        'Categoriaspista',
        'Ingreso',
        'Grupo',
        'Tarifa',
        'GruposRaza',
        'Temporalmascota',
        'Sucursale',
        'EventosMascotasPuntaje');
    public $layout = 'kennel';
    public $components = array(
        'Session');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('meses', 'catalogo_inicial');
    }

    public function index() {
        $eventos = $this->Evento->find('all', array(
            'recursive' => 0,
            'order' => 'Evento.id DESC',
            'limit' => 15));
        //debug($mascotas);exit;
        $this->Evento->find('all');
        $this->set(compact('eventos'));
    }

    public function insertar() {

        if (!empty($this->data)) {

            if ($this->Evento->save($this->request->data)) {
                $idEvento = $this->Evento->getLastInsertID();
                $this->Session->setFlash("Evento guardado Correctamente", 'msgbueno');
                $this->redirect(array('controller' => 'Eventos', 'action' => 'exposicion', $idEvento));
            } else {
                $this->Session->setFlash("No se pudo guardar", 'msgerror');
                $this->redirect(array('controller' => 'Eventos', 'action' => 'index'));
            }
        }
    }

    public function delete($id = null) {
        $this->Evento->id = $id;
        $this->request->data = $this->Evento->read();
        if (!$id) {
            $this->Session->setFlash('No existe el Evento a eliminar');
            $this->redirect(array('action' => 'index'));
        } else {
            if ($this->Evento->delete($id)) {
                $this->Session->setFlash('Se elimino el Evento ' . $this->data['Evento']['nombre'], 'msgbueno');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error al eliminar');
            }
        }
    }

    public function exposicion($idEvento = null) {
        //debug($idEvento);exit;
        $evento = $this->Evento->find('first', array('recursive' => 2, 'conditions' => array('Evento.id' => $idEvento)));
        $cate = $this->Categoriaspista->find('all');
        //$inscritos = $this->EventosMascota->find('all');
        //debug($inscritos);exit;
        $pistas = $this->EventosPista->find('all', array('conditions' => array('EventosPista.evento_id' => $idEvento)));
        //debug($pistas);exit;
        $mejoresespeciales = $this->EventosMascota->find('all', array('order' => 'EventosMascota.puesto ASC', 'recursive' => 2, 'conditions' => array('EventosMascota.evento_id' => $idEvento, 'EventosMascota.categoriaspista_id' => 1)));
        $mejoresabsolutos = $this->EventosMascota->find('all', array('recursive' => 2, 'order' => 'EventosMascota.puesto ASC', 'conditions' => array('EventosMascota.evento_id' => $idEvento, 'EventosMascota.categoriaspista_id' => 2)));
        $selecpistas = $this->Pista->find('list', array('fields' => 'Pista.nombre'));
        //$eventopis = $this->EventosPista->find('all',array('conditions' => array('EventosPista.evento_id' => $idEvento)));
        //$listcalificaciones = $this->Calificacione->find('list',array('fields' => 'Calificacione.nombre'));
        //debug($listcalificaciones);exit;
        $razas = $this->Raza->find('list', array('fields' => 'Raza.nombre'));
        $dcr = $this->Raza->find('list', array('recursive' => -1, 'fields' => array('nombre')));
        $criaderos = $this->Criadero->find('list', array('fields' => array('Criadero.id', 'Criadero.nombre')));
        $this->set(compact('criaderos', 'dcr', 'evento', 'idEvento', 'cate', 'pistas', 'selecpistas', 'listcalificaciones', 'razas'));
    }

    public function ajaxlistado($idEvento = null) {
        //debug('eynaer');exit;

        $this->layout = 'ajax';

        if (!empty($this->request->data['Mascota']['nombre_completo']) and empty($this->request->data['Mascota']['kcb']) and empty($this->request->data['Mascota']['num_tatuaje'])) {
            $mascotas = $this->Mascota->find('all', array('conditions' => array('Mascota.nombre_completo LIKE' => '%' . $this->request->data['Mascota']['nombre_completo'] . '%')));
        }
        if (!empty($this->request->data['Mascota']['kcb'])and empty($this->request->data['Mascota']['nombre_completo']) and empty($this->request->data['Mascota']['num_tatuaje'])) {
            $mascotas = $this->Mascota->find('all', array('conditions' => array('Mascota.kcb LIKE' => '%' . $this->request->data['Mascota']['kcb'] . '%')));
        }
        if (!empty($this->request->data['Mascota']['num_tatuaje'])and empty($this->request->data['Mascota']['nombre_completo']) and empty($this->request->data['Mascota']['kcb'])) {
            $mascotas = $this->Mascota->find('all', array('conditions' => array('Mascota.num_tatuaje LIKE' => '%' . $this->request->data['Mascota']['num_tatuaje'] . '%')));
        }
        if (!empty($this->request->data['Mascota']['num_tatuaje'])and ! empty($this->request->data['Mascota']['nombre_completo']) and empty($this->request->data['Mascota']['kcb'])) {
            $mascotas = $this->Mascota->find('all', array('conditions' => array('Mascota.num_tatuaje LIKE' => '%' . $this->request->data['Mascota']['num_tatuaje'] . '%',
                    'Mascota.nombre_completo LIKE' => '%' . $this->request->data['Mascota']['nombre_completo'] . '%')));
        }
        if (!empty($this->request->data['Mascota']['num_tatuaje'])and empty($this->request->data['Mascota']['nombre_completo']) and ! empty($this->request->data['Mascota']['kcb'])) {
            $mascotas = $this->Mascota->find('all', array('conditions' => array('Mascota.num_tatuaje LIKE' => '%' . $this->request->data['Mascota']['num_tatuaje'] . '%',
                    'Mascota.kcb LIKE' => '%' . $this->request->data['Mascota']['kcb'] . '%')));
        }
        if (empty($this->request->data['Mascota']['num_tatuaje'])and ! empty($this->request->data['Mascota']['nombre_completo']) and ! empty($this->request->data['Mascota']['kcb'])) {
            $mascotas = $this->Mascota->find('all', array('conditions' => array('Mascota.kcb LIKE' => '%' . $this->request->data['Mascota']['kcb'] . '%',
                    'Mascota.nombre_completo LIKE' => '%' . $this->request->data['Mascota']['nombre_completo'] . '%')));
        }
        if (!empty($this->request->data['Mascota']['num_tatuaje'])and ! empty($this->request->data['Mascota']['nombre_completo']) and ! empty($this->request->data['Mascota']['kcb'])) {
            $mascotas = $this->Mascota->find('all', array('conditions' => array('Mascota.kcb LIKE' => '%' . $this->request->data['Mascota']['kcb'] . '%',
                    'Mascota.nombre_completo LIKE' => '%' . $this->request->data['Mascota']['nombre_completo'] . '%',
                    'Mascota.num_tatuaje LIKE' => '%' . $this->request->data['Mascota']['num_tatuaje'] . '%')));
        }

        $catepistas = $this->Categoriaspista->find('list', array('fields' => 'Categoriaspista.nombre'));
        //debug($this->request->data);exit;
        //debug($mascotas);exit;
        $this->set(compact('mascotas', 'catepistas', 'idEvento'));
    }

    public function ajaxformulario($id = null, $idEvento = null) {
        $this->layout = 'ajax';
        //debug($id);exit;
        $evento = $this->Evento->find('first', array('conditions' => array('Evento.id' => $idEvento)));
        $fecha1 = $evento['Evento']['fecha_inicio'];
        $mas = $this->Mascota->find('first', array('conditions' => array('Mascota.id' => $id)));
        $catepistas = $this->Categoriaspista->find('list', array('fields' => 'Categoriaspista.nombre'));
        //debug($mas);exit;
        $titulos = $this->Mascotastitulo->find('all', array('conditions' => array('Mascotastitulo.mascota_id' => $id)));

        $this->set(compact('mas', 'catepistas', 'idEvento', 'fecha1', 'titulos'));
    }

    public function actualiza() {
        //debug($this->request->data);exit;
        if (!empty($this->data)) {
            $this->EventosPista->create();
            $idEvento = $this->request->data['EventosPista']['evento_id'];
            if ($this->EventosPista->save($this->data)) {

                $this->Session->setFlash("Se guardo correctamente!!", 'msgbueno');
                $this->redirect(array('controller' => 'Eventos', 'action' => 'exposicion', $idEvento));
            } else {
                $this->Session->setFlash("No se pudo guardar!!!", 'msgerror');
                $this->redirect(array('controller' => 'Eventos', 'action' => 'exposicion', $idEvento));
            }
        }
    }

    public function ajaxpistas($idEvento = null, $pista = null) {
        $this->layout = 'ajax';
        //debug($this->request->data);
        //debug($idEvento);
        //debug($pista);exit;
        $p = $this->EventosPista->find('first', array('conditions' => array('EventosPista.id' => $pista)));


        if ($this->request->data['Raza']['raza'] == 'todos') {
            $cachoespe = $this->EventosMascotasPuntaje->find('all', array('recursive' => 0,
                'conditions' => array(
                    'EventosMascotasPuntaje.evento_id' => $idEvento,
                    'EventosMascotasPuntaje.eventospista_id' => $pista,
                    '')
            ));
            $sw = 1;
            $nomraza = 'TODAS';
        } else {
            $raza = $this->Raza->find('first', array('conditions' => array('Raza.id' => $this->request->data['Raza']['raza'])));
            $cachoespe = $this->EventosMascotasPuntaje->find('all', array('recursive' => 0,
                'conditions' => array(
                    'EventosMascotasPuntaje.evento_id' => $idEvento,
                    'EventosMascotasPuntaje.eventospista_id' => $pista,
                    'EventosMascotasPuntaje.raza_id' => $this->request->data['Raza']['raza'])
            ));
            $sw = 0;
            $nomraza = $raza['Raza']['nombre'];
        }


        $listcalificaciones = $this->Calificacione->find('list', array('fields' => 'Calificacione.nombre'));
        //debug($listcalificaciones);exit;
        $this->set(compact('pista', 'idEvento', 'cachoespe', 'p', 'listcalificaciones', 'sw', 'nomraza'));
    }

    public function ajaxinscritos($idEvento = null) {
        $this->layout = 'ajax';
        $evento = $this->Evento->find('first', array('conditions' => array('Evento.id' => $idEvento)));
        $fecha1 = $evento['Evento']['fecha_inicio'];
        //debug($idEvento);
        //debug($this->request->data);exit;
        if (!empty($this->request->data['EventosMascota']['categoriaspista_id']) && !empty($this->request->data['Ingreso']['comprobante'])) {
            $categoria = $this->request->data['EventosMascota']['categoriaspista_id'];
            $this->EventosMascota->create();
            $this->request->data['EventosMascota']['evento_id'] = $idEvento;
            $idmascota = $this->request->data['EventosMascota']['mascota_id'];
            $mascota = $this->Mascota->find('first', array('conditions' => array('Mascota.id' => $idmascota)));
            //debug($mascota);exit;
            $existe = $this->EventosMascota->find('first', array('conditions' => array('EventosMascota.mascota_id' => $idmascota, 'EventosMascota.evento_id' => $idEvento)));
            if (!empty($existe)) {
                $mensajem = $mascota['Mascota']['nombre_completo'] . ' ya esta inscrito!!!';
            } else {
                $fecha2 = $mascota['Mascota']['fecha_nacimiento'];
                $edad = $this->meses($fecha2, $fecha1);
                //debug($edad);exit;
                $pista = $this->Categoriaspista->find('first', array('conditions' => array('Categoriaspista.id' => $this->request->data['EventosMascota']['categoriaspista_id'])));
                if ($pista['Categoriaspista']['id'] != 9 and $pista['Categoriaspista']['id'] != 10) {
                    if ($edad >= $pista['Categoriaspista']['desde'] and $edad <= $pista['Categoriaspista']['hasta']) {
                        $this->request->data['Ingreso']['tramite_id'] = 20;
                        $this->request->data['Ingreso']['estado'] = 1;
                        $this->request->data['Ingreso']['sucursale_id'] = $this->Session->read('Auth.User.sucursale_id');
                        $this->request->data['Ingreso']['propietario_id'] = $mascota['Mascota']['propietarioactual_id'];
                        $this->generapago();

                        if (!empty($this->request->data['Aux']['ingreso_id'])) {
                            $idIngreso = $this->request->data['Aux']['ingreso_id'];
                            $this->request->data['EventosMascota']['ingreso_id'] = $idIngreso;
                            $catalogo = $this->genera_catalago($idEvento, $categoria);
                            $this->request->data['EventosMascota']['codigo'] = $catalogo;
                            if ($categoria == 1) {
                                $catalogo = $catalogo . 'e';
                            }
                            if ($categoria == 2) {
                                $catalogo = $catalogo . 'a';
                            }
                            $this->request->data['EventosMascota']['catalogo'] = $catalogo;
                            if ($this->EventosMascota->save($this->data)) {
                                $mensajeb = 'SE ENVIO CORRECTAMENTE LA MASCOTA';
                            } else {
                                $mensajem = 'ERROR NO SE PUDO INSCRIBIR!!!';
                            }
                        } else {
                            $mensajem = 'ERROR LA GENERAR EL PAGO';
                        }
                    } else {
                        $mensajem = 'NO SE PUEDE SU EDAD ES ' . $edad . ' MESES';
                    }
                } else {
                    $masti = $this->Mascotastitulo->find('first', array('conditions' => array('Mascotastitulo.mascota_id' => $idmascota, 'Mascotastitulo.titulo_id' => 2)));
                    if (!empty($masti)) {
                        $this->request->data['Ingreso']['tramite_id'] = 20;
                        $this->request->data['Ingreso']['estado'] = 1;
                        $this->request->data['Ingreso']['sucursale_id'] = $this->Session->read('Auth.User.sucursale_id');
                        $this->request->data['Ingreso']['propietario_id'] = $mascota['Mascota']['propietarioactual_id'];
                        $this->generapago();

                        if (!empty($this->request->data['Aux']['ingreso_id'])) {
                            $idIngreso = $this->request->data['Aux']['ingreso_id'];
                            $this->request->data['EventosMascota']['ingreso_id'] = $idIngreso;
                            $catalogo = $this->genera_catalago($idEvento, $categoria);
                            $this->request->data['EventosMascota']['codigo'] = $catalogo;
                            if ($categoria == 1) {
                                $catalogo = $catalogo . 'e';
                            }
                            if ($categoria == 2) {
                                $catalogo = $catalogo . 'a';
                            }
                            $this->request->data['EventosMascota']['catalogo'] = $catalogo;
                            if ($this->EventosMascota->save($this->data)) {
                                $mensajeb = 'SE ENVIO CORRECTAMENTE LA MASCOTA';
                            } else {
                                $mensajem = 'ERROR NO SE PUDO INSCRIBIR!!!';
                            }
                        } else {
                            $mensajem = 'ERROR LA GENERAR EL PAGO';
                        }
                    } else {
                        $mensajem = 'NO PUEDE NO TIENE TITULO!!!';
                    }
                }
            }
        } else {
            $mensajem = 'NO PUEDE, ES NECESARIO LACATEGORIA Y EL COMPROBANTE!!!!';
        }
        $cate = $this->Categoriaspista->find('all');
        $this->set(compact('mensajeb', 'mensajem', 'cate', 'idEvento'));
    }

    public function ajaxinscribe_inicial($idEvento = null) {
        if (!empty($this->request->data['EventosMascota']['categoriaspista_id']) && !empty($this->request->data['Ingreso']['sucursale_id'])) {
            $idmascota = $this->request->data['EventosMascota']['mascota_id'];
            $mascota = $this->Mascota->find('first', array('conditions' => array('Mascota.id' => $idmascota)));
            $this->request->data['Temporalmascota']['kcb'] = $mascota['Mascota']['kcb'];
            $this->request->data['Temporalmascota']['raza_id'] = $mascota['Mascota']['raza_id'];
            $this->request->data['Temporalmascota']['nombre'] = $mascota['Mascota']['nombre_completo'];
            $this->request->data['Temporalmascota']['color'] = $mascota['Mascota']['color'];
            $this->request->data['Temporalmascota']['fecha_nacimiento'] = $mascota['Mascota']['fecha_nacimiento'];
            $this->request->data['Temporalmascota']['sexo'] = $mascota['Mascota']['sexo'];
            $this->request->data['Temporalmascota']['codigo'] = $mascota['Mascota']['codigo'];
            $this->request->data['Temporalmascota']['num_tatuaje'] = $mascota['Mascota']['num_tatuaje'];
            $this->request->data['Temporalmascota']['chip'] = $mascota['Mascota']['chip'];
            if (!empty($mascota['Reproductor'])) {
                $this->request->data['Temporalmascota']['kcb_padre'] = $mascota['Reproductor']['kcb'];
                $this->request->data['Temporalmascota']['nombre_padre'] = $mascota['Reproductor']['nombre_completo'];
            }
            if (!empty($mascota['Reproductora'])) {
                $this->request->data['Temporalmascota']['kcb_madre'] = $mascota['Reproductora']['kcb'];
                $this->request->data['Temporalmascota']['nombre_madre'] = $mascota['Reproductora']['nombre_completo'];
            }
            $this->request->data['Temporalmascota']['categoriaspista_id'] = $this->request->data['EventosMascota']['categoriaspista_id'];
            if (!empty($mascota['Propietario'])) {
                $this->request->data['Temporalmascota']['criador'] = $mascota['Propietario']['nombre'];
            }
            if (!empty($mascota['Propietarioactual'])) {
                $this->request->data['Temporalmascota']['propietario'] = $mascota['Propietarioactual']['nombre'];
                $this->request->data['Temporalmascota']['ciudad_pais'] = $mascota['Propietarioactual']['ciudad_pais'];
                $this->request->data['Temporalmascota']['telefono'] = $mascota['Propietarioactual']['telefono1'];
                $this->request->data['Temporalmascota']['email'] = $mascota['Propietarioactual']['email1'];
            }

            $this->request->data['Temporalmascota']['mascota_id'] = $mascota['Mascota']['id'];
            $this->request->data['Temporalmascota']['evento_id'] = $idEvento;
            //debug($this->request->data);exit;
            if (!empty($this->request->data['Temporalmascota']['fecha_nacimiento']) && !empty($this->request->data['Temporalmascota']['categoriaspista_id'])) {
                $categoria = $this->Categoriaspista->find('first', array('conditions' => array('Categoriaspista.id' => $this->request->data['Temporalmascota']['categoriaspista_id'])));
                $meses = $this->requestAction(array('controller' => 'Eventos', 'action' => 'meses', $this->request->data['Temporalmascota']['fecha_nacimiento'], date('Y-m-d')));
                if ($meses <= $categoria['Categoriaspista']['hasta'] && $meses >= $categoria['Categoriaspista']['desde']) {
                    $this->Temporalmascota->create();
                    $this->Temporalmascota->save($this->request->data['Temporalmascota']);
                    $this->Session->setFlash('Su solicitud fue enviada correctamente!!!', 'msgbueno');
                } else {
                    $this->Session->setFlash('El ejemplar tiene ' . $meses . ' meses, no puede estar en categoria ' . $categoria['Categoriaspista']['nombre'], 'msgerror');
                    //$this->render('inscripcion');
                }
            } else {
                $this->Session->setFlash('Es necesario llenar los datos!!!', 'msgerror');
            }
        } else {
            $this->Session->setFlash('No se pudo enviar la solicitud!!!', 'msgerror');
        }
        $this->redirect(array('controller' => 'Usuarios', 'action' => 'listaeventos'));
    }

    public function ajaxinscribe_usuario($idEvento = null) {
        //$this->layout = 'ajax';
        $evento = $this->Evento->find('first', array('conditions' => array('Evento.id' => $idEvento)));
        $fecha1 = $evento['Evento']['fecha_inicio'];
        //debug($idEvento);
        //debug($this->request->data);exit;
        if (!empty($this->request->data['EventosMascota']['categoriaspista_id']) && !empty($this->request->data['Ingreso']['sucursale_id'])) {
            $categoria = $this->request->data['EventosMascota']['categoriaspista_id'];

            $sucursal = $this->Sucursale->find('first', array('recursive' => -1, 'conditions' => array('Sucursale.id' => $this->request->data['Ingreso']['sucursale_id'])));
            $this->EventosMascota->create();
            $this->request->data['EventosMascota']['evento_id'] = $idEvento;
            $idmascota = $this->request->data['EventosMascota']['mascota_id'];
            $mascota = $this->Mascota->find('first', array('conditions' => array('Mascota.id' => $idmascota)));
            //debug($mascota);exit;
            $existe = $this->EventosMascota->find('first', array('conditions' => array('EventosMascota.mascota_id' => $idmascota, 'EventosMascota.evento_id' => $idEvento)));
            if (!empty($existe)) {
                $mensajem = $mascota['Mascota']['nombre_completo'] . ' YA FUE REGISTRADO!!!';
            } else {
                $fecha2 = $mascota['Mascota']['fecha_nacimiento'];
                $edad = $this->meses($fecha2, $fecha1);
                /* debug($fecha1);
                  debug($fecha2);
                  debug($edad);exit; */
                if (empty($edad)) {
                    $this->Session->setFlash('Fechas Incorrectas', 'msgerror');
                    $this->redirect(array('controller' => 'Usuarios', 'action' => 'listaeventos'));
                }

                $pista = $this->Categoriaspista->find('first', array('conditions' => array('Categoriaspista.id' => $this->request->data['EventosMascota']['categoriaspista_id'])));
                if ($pista['Categoriaspista']['id'] != 9 and $pista['Categoriaspista']['id'] != 10) {
                    if ($edad >= $pista['Categoriaspista']['desde'] and $edad <= $pista['Categoriaspista']['hasta']) {
                        $this->request->data['Ingreso']['tramite_id'] = 20;
                        $this->generapago();

                        if (!empty($this->request->data['Aux']['ingreso_id'])) {
                            $idIngreso = $this->request->data['Aux']['ingreso_id'];
                            $montototal = $this->request->data['Ingreso']['monto_total'];
                            $this->request->data['EventosMascota']['ingreso_id'] = $idIngreso;
                            $catalogo = $this->genera_catalago($idEvento, $categoria);
                            $this->request->data['EventosMascota']['codigo'] = $catalogo;
                            if ($categoria == 1) {
                                $catalogo = $catalogo . 'e';
                            }
                            if ($categoria == 2) {
                                $catalogo = $catalogo . 'a';
                            }
                            $this->request->data['EventosMascota']['catalogo'] = $catalogo;
                            if ($this->EventosMascota->save($this->data)) {
                                $mensajeb = 'SE ENVIO CORRECTAMENTE LA SOLICITUD USTED DEBE CANCELAR ' . $montototal . ' Bs. ' . ' EN LA CUENTA ' . $sucursal['Sucursale']['cuenta'] . ' ,PARA LUEGO PASAR POR LA SUCURSAL CON SU COMPROBANTE DE PAGO Y EL CODIGO: ' . $idIngreso;
                            } else {
                                $mensajem = 'ERROR NO SE PUDO INSCRIBIR!!!';
                            }
                        } else {
                            $mensajem = 'NO SE ENCUENTRA UNA CONFIGURACION';
                        }
                    } else {
                        $mensajem = 'NO SE PUEDE SU EDAD ES ' . $edad . ' MESES';
                    }
                } else {
                    $masti = $this->Mascotastitulo->find('first', array('conditions' => array('Mascotastitulo.mascota_id' => $idmascota, 'Mascotastitulo.titulo_id' => 2)));
                    if (!empty($masti)) {
                        $this->request->data['Ingreso']['tramite_id'] = 20;
                        $this->generapago();

                        if (!empty($this->request->data['Aux']['ingreso_id'])) {
                            $idIngreso = $this->request->data['Aux']['ingreso_id'];
                            $montototal = $this->request->data['Ingreso']['monto_total'];
                            $this->request->data['EventosMascota']['ingreso_id'] = $idIngreso;
                            $catalogo = $this->genera_catalago($idEvento, $categoria);
                            $this->request->data['EventosMascota']['codigo'] = $catalogo;
                            if ($categoria == 1) {
                                $catalogo = $catalogo . 'e';
                            }
                            if ($categoria == 2) {
                                $catalogo = $catalogo . 'a';
                            }
                            $this->request->data['EventosMascota']['catalogo'] = $catalogo;
                            if ($this->EventosMascota->save($this->data)) {
                                $mensajeb = 'SE ENVIO CORRECTAMENTE LA SOLICITUD USTED DEBE CANCELAR ' . $montototal . ' Bs. ' . ' EN LA CUENTA ' . $sucursal['Sucursale']['cuenta'] . ' ,PARA LUEGO PASAR POR LA SUCURSAL CON SU COMPROBANTE DE PAGO Y EL CODIGO: ' . $idIngreso;
                            } else {
                                $mensajem = 'ERROR NO SE PUDO INSCRIBIR!!!';
                            }
                        } else {
                            $mensajem = 'ERROR NO SE PUDO INSCRIBIR NO HAY UNA CONFIGURACION!!!';
                        }
                    } else {
                        $mensajem = 'NO PUEDE NO TIENE TITULO!!!';
                    }
                }
            }
        } else {
            $mensajem = 'Es necesario elegir una categoria y sucursal!!';
        }
        if (!empty($mensajem)) {
            $this->Session->setFlash($mensajem, 'msgerror');
        }
        if (!empty($mensajeb)) {
            $this->Session->setFlash($mensajeb, 'notabuena');
        }
        $this->redirect(array('controller' => 'Usuarios', 'action' => 'listaeventos'));
    }

    public function genera_catalago($idEvento = null, $categoria = null) {

        $condiciones['EventosMascota.evento_id'] = $idEvento;
        if ($categoria == 1) {
            $condiciones['EventosMascota.categoriaspista_id'] = 1;
        }
        if ($categoria == 2) {
            $condiciones['EventosMascota.categoriaspista_id'] = 2;
        }
        if ($categoria == 3 || $categoria == 4) {
            $condiciones['EventosMascota.categoriaspista_id'] = array(3, 4);
        }
        if ($categoria == 5 || $categoria == 6 || $categoria == 7 || $categoria == 8 || $categoria == 9 || $categoria == 10) {
            $condiciones['EventosMascota.categoriaspista_id'] = array(5, 6, 7, 8, 9, 10);
        }
        $numero = 0;
        $ultimo = $this->EventosMascota->find('first', array('recursive' => -1, 'order' => 'EventosMascota.id DESC', 'conditions' => $condiciones));
        if (!empty($ultimo['EventosMascota']['codigo'])) {
            $numero = $ultimo['EventosMascota']['codigo'];
        }
        $numero++;
        return $numero;
    }

    function meses($fech_ini, $fech_fin) {
        $fIni_yr = substr($fech_ini, 0, 4);
        $fIni_mon = substr($fech_ini, 5, 2);
        $fIni_day = substr($fech_ini, 8, 2);
        //SEPARO LOS VALORES DEL ANIO, MES Y DIA PARA LA FECHA FINAL EN DIFERENTES
        //VARIABLES PARASU MEJOR MANEJO
        $fFin_yr = substr($fech_fin, 0, 4);
        $fFin_mon = substr($fech_fin, 5, 2);
        $fFin_day = substr($fech_fin, 8, 2);
        $yr_dif = $fFin_yr - $fIni_yr;
        //echo "la diferencia de a�os es -> ".$yr_dif."<br>";
        //LA FUNCION strtotime NOS PERMITE COMPARAR CORRECTAMENTE LAS FECHAS
        //TAMBIEN ES UTIL CON LA FUNCION date
        if (strtotime($fech_ini) > strtotime($fech_fin)) {
            /* echo 'ERROR -> la fecha inicial es mayor a la fecha final <br>';
              exit(); */
        } else {
            if ($yr_dif == 1) {
                $fIni_mon = 12 - $fIni_mon;
                $meses = $fFin_mon + $fIni_mon;
                return $meses;
                //LA FUNCION utf8_encode NOS SIRVE PARA PODER MOSTRAR ACENTOS Y
                //CARACTERES RAROS
                //echo utf8_encode("la diferencia de meses con un a�o de diferencia es -> ".$meses."<br>");
            } else {
                if ($yr_dif == 0) {
                    $meses = $fFin_mon - $fIni_mon;
                    return $meses;
                    //echo utf8_encode("la diferencia de meses con cero a�os de diferencia es -> ".$meses.", donde el mes inicial es ".$fIni_mon.", el mes final es ".$fFin_mon."<br>");
                } else {
                    if ($yr_dif > 1) {
                        $fIni_mon = 12 - $fIni_mon;
                        $meses = $fFin_mon + $fIni_mon + (($yr_dif - 1) * 12);
                        return $meses;
                        //echo utf8_encode("la diferencia de meses con mas de un a�o de diferencia es -> ".$meses."<br>");
                    }
                    /* else
                      echo "ERROR -> la fecha inicial es mayor a la fecha final <br>";
                      exit(); */
                }
            }
        }
    }

    public function actualizapistas($idEvento = null) {
        $evenpis = $this->EventosPista->find('all', array('conditions' => array('EventosPista.evento_id' => $idEvento)));
        $inscritos = $this->EventosMascota->find('all', array('conditions' => array('EventosMascota.evento_id' => $idEvento)));
        foreach ($inscritos as $in) {
            foreach ($evenpis as $ev) {

                $this->EventosMascotasPuntaje->create();
                $this->request->data['EventosMascotasPuntaje']['mascota_id'] = $in['EventosMascota']['mascota_id'];
                $this->request->data['EventosMascotasPuntaje']['raza_id'] = $in['Mascota']['raza_id'];
                $this->request->data['EventosMascotasPuntaje']['categoriaspista_id'] = $in['EventosMascota']['categoriaspista_id'];
                $this->request->data['EventosMascotasPuntaje']['evento_id'] = $idEvento;
                $this->request->data['EventosMascotasPuntaje']['eventosmascota_id'] = $in['EventosMascota']['id'];
                $this->request->data['EventosMascotasPuntaje']['eventospista_id'] = $ev['EventosPista']['id'];

                $evenmaspun = $this->EventosMascotasPuntaje->find('first', array('conditions' => array(
                        'EventosMascotasPuntaje.mascota_id' => $in['EventosMascota']['mascota_id'],
                        'EventosMascotasPuntaje.evento_id' => $idEvento,
                        'EventosMascotasPuntaje.eventosmascota_id' => $in['EventosMascota']['id'],
                        'EventosMascotasPuntaje.eventospista_id' => $ev['EventosPista']['id']
                    )
                ));
                if (!empty($in['Ingreso'])) {
                    if (empty($evenmaspun) && $in['Ingreso']['estado'] == 1) {
                        $this->EventosMascotasPuntaje->save($this->request->data);
                    }
                }
            }
        }
        $this->redirect(array('controller' => 'Eventos', 'action' => 'exposicion', $idEvento));
    }

    public function ajaxespegrupo($idEvento = null, $cant = null, $pista = null) {
        $this->layout = 'ajax';
        //debug($cant);
        //debug($idEvento);
        //debug($pista);
        //debug($this->request->data);exit;
        for ($i = 1; $i <= $cant; $i++) {
            if (!empty($this->request->data['Numero'])) {
                $this->EventosPista->id = $pista;
                $this->request->data['EventosPista']['numero_especiales'] = $this->request->data['Numero']['numero_especiales'];
                $this->request->data['EventosPista']['numero_absolutos'] = $this->request->data['Numero']['numero_absolutos'];
                $this->request->data['EventosPista']['numero_jovenes'] = $this->request->data['Numero']['numero_jovenes'];
                $this->request->data['EventosPista']['numero_adultos'] = $this->request->data['Numero']['numero_adultos'] + $this->request->data['Numero']['numero_jovenes'];
                $this->EventosPista->save($this->request->data['EventosPista']);
            }
            if (!empty($this->request->data['EventosMascotasPuntaje'][$i])) {
                $idemp = $this->request->data['EventosMascotasPuntaje'][$i]['id'];
                //$evenmaspun = $this->EventosMascotasPuntaje->find('first',array('conditions' => array('EventosMascotasPuntaje.id' => $idemp)));
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['mejor_cachorro'])) {
                    $mc = $this->request->data['EventosMascotasPuntaje'][$i]['mejor_cachorro'];
                } else {
                    $mc = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['mejor_cachorro_opuesto'])) {
                    $mco = $this->request->data['EventosMascotasPuntaje'][$i]['mejor_cachorro_opuesto'];
                } else {
                    $mco = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['puntaje_cac'])) {
                    $pcac = $this->request->data['EventosMascotasPuntaje'][$i]['puntaje_cac'];
                } else {
                    $pcac = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['cacib'])) {
                    $cacib = $this->request->data['EventosMascotasPuntaje'][$i]['cacib'];
                } else {
                    $cacib = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['caclab'])) {
                    $caclab = $this->request->data['EventosMascotasPuntaje'][$i]['caclab'];
                } else {
                    $caclab = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['cgc'])) {
                    $cgc = $this->request->data['EventosMascotasPuntaje'][$i]['cgc'];
                } else {
                    $cgc = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['cac'])) {
                    $cac = $this->request->data['EventosMascotasPuntaje'][$i]['cac'];
                } else {
                    $cac = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['cjc'])) {
                    $cjc = $this->request->data['EventosMascotasPuntaje'][$i]['cjc'];
                } else {
                    $cjc = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['puesto_exposicion_adultos'])) {
                    $puestoa = $this->request->data['EventosMascotasPuntaje'][$i]['puesto_exposicion_adultos'];
                } else {
                    $puestoa = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['puesto_exposicion'])) {
                    $puesto = $this->request->data['EventosMascotasPuntaje'][$i]['puesto_exposicion'];
                } else {
                    $puesto = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['reserva_grupo_adultos'])) {
                    $rgrua = $this->request->data['EventosMascotasPuntaje'][$i]['reserva_grupo_adultos'];
                } else {
                    $rgrua = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['mejor_grupo_adultos'])) {
                    $mgrua = $this->request->data['EventosMascotasPuntaje'][$i]['mejor_grupo_adultos'];
                } else {
                    $mgrua = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['reserva_grupo'])) {
                    $rgru = $this->request->data['EventosMascotasPuntaje'][$i]['reserva_grupo'];
                } else {
                    $rgru = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['mejor_grupo'])) {
                    $mgru = $this->request->data['EventosMascotasPuntaje'][$i]['mejor_grupo'];
                } else {
                    $mgru = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['calificacione_id'])) {
                    $cali = $this->request->data['EventosMascotasPuntaje'][$i]['calificacione_id'];
                } else {
                    $cali = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['mejor_raza_adulto_sexo_opuesto'])) {
                    $mao = $this->request->data['EventosMascotasPuntaje'][$i]['mejor_raza_adulto_sexo_opuesto'];
                } else {
                    $mao = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['mejor_raza_adulto'])) {
                    $ma = $this->request->data['EventosMascotasPuntaje'][$i]['mejor_raza_adulto'];
                } else {
                    $ma = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['mejor_raza_joven_sexo_opuesto'])) {
                    $mjo = $this->request->data['EventosMascotasPuntaje'][$i]['mejor_raza_joven_sexo_opuesto'];
                } else {
                    $mjo = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['mejor_raza_joven'])) {
                    $mj = $this->request->data['EventosMascotasPuntaje'][$i]['mejor_raza_joven'];
                } else {
                    $mj = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['puntaje_cgc'])) {
                    $pcgc = $this->request->data['EventosMascotasPuntaje'][$i]['puntaje_cgc'];
                } else {
                    $pcgc = null;
                }
                if (!empty($this->request->data['EventosMascotasPuntaje'][$i]['categoriaspista_id'])) {
                    $catepista = $this->request->data['EventosMascotasPuntaje'][$i]['categoriaspista_id'];
                } else {
                    $catepista = null;
                }


                $nespeciales = $this->request->data['Numero']['numero_especiales'];
                $nabsolutos = $this->request->data['Numero']['numero_absolutos'];
                $njovenes = $this->request->data['Numero']['numero_jovenes'];
                $nadultos = $this->request->data['Numero']['numero_adultos'] + $this->request->data['Numero']['numero_jovenes'];
                $puntos = 0;
                $puntos2 = 0;

                $this->EventosMascotasPuntaje->id = $idemp;



                if ($catepista == 1) {
                    $numerototal = $nespeciales;
                }
                if ($catepista == 2) {
                    $numerototal = $nabsolutos;
                }
                if ($catepista == 3 || $catepista == 4) {
                    $numerototal = $njovenes;
                    $numerototal2 = $nadultos;
                }
                if ($catepista == 5 || $catepista == 6 || $catepista == 7 || $catepista == 8 || $catepista == 9 || $catepista == 10) {
                    $numerototal2 = $nadultos;
                }

                $this->request->data['EventosMascotasPuntaje']['mejor_cachorro'] = $mc;
                $this->request->data['EventosMascotasPuntaje']['mejor_cachorro_opuesto'] = $mco;
                $this->request->data['EventosMascotasPuntaje']['mejor_raza_joven'] = $mj;
                $this->request->data['EventosMascotasPuntaje']['mejor_raza_joven_sexo_opuesto'] = $mjo;
                $this->request->data['EventosMascotasPuntaje']['mejor_raza_adulto'] = $ma;
                $this->request->data['EventosMascotasPuntaje']['mejor_raza_adulto_sexo_opuesto'] = $mao;
                $this->request->data['EventosMascotasPuntaje']['calificacione_id'] = $cali;
                $this->request->data['EventosMascotasPuntaje']['mejor_grupo'] = $mgru;
                $this->request->data['EventosMascotasPuntaje']['reserva_grupo'] = $rgru;
                $this->request->data['EventosMascotasPuntaje']['mejor_grupo_adultos'] = $mgrua;
                $this->request->data['EventosMascotasPuntaje']['reserva_grupo_adultos'] = $rgrua;
                $this->request->data['EventosMascotasPuntaje']['puesto_exposicion'] = $puesto;
                $this->request->data['EventosMascotasPuntaje']['puesto_exposicion_adultos'] = $puestoa;
                $this->request->data['EventosMascotasPuntaje']['cjc'] = $cjc;
                $this->request->data['EventosMascotasPuntaje']['cac'] = $cac;
                $this->request->data['EventosMascotasPuntaje']['cgc'] = $cgc;
                $this->request->data['EventosMascotasPuntaje']['caclab'] = $caclab;
                $this->request->data['EventosMascotasPuntaje']['cacib'] = $cacib;
                $this->request->data['EventosMascotasPuntaje']['puntaje_cac'] = $pcac;
                $this->request->data['EventosMascotasPuntaje']['puntaje_cgc'] = $pcgc;


                if (!empty($numerototal)) {
                    if ($puesto == 1) {
                        $puntos = $numerototal;
                    }
                    if ($puesto == 2) {
                        $puntos = ($numerototal * 80) / 100;
                    }
                    if ($puesto == 3) {
                        $puntos = ($numerototal * 60) / 100;
                    }
                    if ($puesto == 4) {
                        $puntos = ($numerototal * 40) / 100;
                    }
                    if ($puesto == 5) {
                        $puntos = ($numerototal * 20) / 100;
                    }
                }
                if (!empty($numerototal2)) {
                    if ($puestoa == 1) {
                        $puntos2 = $numerototal2;
                    }
                    if ($puestoa == 2) {
                        $puntos2 = ($numerototal2 * 80) / 100;
                    }
                    if ($puestoa == 3) {
                        $puntos2 = ($numerototal2 * 60) / 100;
                    }
                    if ($puestoa == 4) {
                        $puntos2 = ($numerototal2 * 40) / 100;
                    }
                    if ($puestoa == 5) {
                        $puntos2 = ($numerototal2 * 20) / 100;
                    }
                }

                $this->request->data['EventosMascotasPuntaje']['puntosex'] = $puntos;
                $this->request->data['EventosMascotasPuntaje']['puntosex_adultos'] = $puntos2;

                if ($this->EventosMascotasPuntaje->save($this->request->data['EventosMascotasPuntaje'])) {
                    $mensajeb = 'SE GUARDO CORRECTAMENTE!!!';
                } else {
                    $mensajem = 'NO SE PUDO GUARDAR!!!';
                }
            }
        }

        $this->set(compact('cachomejoresespeciales', 'pista', 'idEvento', 'mensajeb', 'mensajem'));
        //debug($cachomejoresespeciales);exit;
    }

    public function exporeporte($idEvento = null, $sw = null) {
        //debug($idEvento);exit;
        $evento = $this->Evento->find('first', array('recursive' => 2, 'conditions' => array('Evento.id' => $idEvento)));
        //$cate = $this->Categoriaspista->find('all');
        $puntos = 0.00;
        if ($sw == 1) {
            $mascotas = $this->EventosMascotasPuntaje->find('all', array('conditions' => array('EventosMascotasPuntaje.evento_id' => $idEvento)));
            foreach ($mascotas as $m) {
                $puntos = 0.00;
                $puntosadultos = 0.00;
                $id = $m['EventosMascotasPuntaje']['id'];
                //$puntos = $m['EventosMascotasPuntaje']['puntos'];
                $cate = $m['EventosMascotasPuntaje']['categoriaspista_id'];
                if ($cate == 1 || $cate == 2) {
                    $s1 = $s2 = $s3 = $s4 = 0.00;

                    $s5 = $m['EventosMascotasPuntaje']['puntosex'];
                    $puntos = $s1 + $s2 + $s3 + $s4 + $s5;
                }
                if ($cate == 3 || $cate == 4) {
                    $s1 = $s2 = $s3 = $s4 = 0.00;
                    if ($m['EventosMascotasPuntaje']['mejor_raza_joven'] == 1) {
                        $s1 = 10;
                    }
                    if ($m['EventosMascotasPuntaje']['mejor_raza_joven_sexo_opuesto'] == 1) {
                        $s2 = 5;
                    }
                    if ($m['EventosMascotasPuntaje']['mejor_grupo'] == 1) {
                        $s3 = 20;
                    }
                    if ($m['EventosMascotasPuntaje']['reserva_grupo'] == 1) {
                        $s4 = 10;
                    }
                    $s5 = $m['EventosMascotasPuntaje']['puntosex'];
                    $puntos = $s1 + $s2 + $s3 + $s4 + $s5;
                }
                if ($cate == 3 || $cate == 4 || $cate == 5 || $cate == 6 || $cate == 7 || $cate == 8 || $cate == 9 || $cate == 10) {
                    $s5 = 0.00;
                    $s1 = $s2 = $s3 = $s4 = 0.00;
                    if ($m['EventosMascotasPuntaje']['mejor_raza_adulto'] == 1) {
                        $s1 = 10;
                    }
                    if ($m['EventosMascotasPuntaje']['mejor_raza_adulto_sexo_opuesto'] == 1) {
                        $s2 = 5;
                    }
                    if ($m['EventosMascotasPuntaje']['mejor_grupo_adultos'] == 1) {
                        $s3 = 20;
                    }
                    if ($m['EventosMascotasPuntaje']['reserva_grupo_adultos'] == 1) {
                        $s4 = 10;
                    }
                    $s5 = $m['EventosMascotasPuntaje']['puntosex_adultos'];
                    $puntosadultos = $s1 + $s2 + $s3 + $s4 + $s5;
                }
                $this->EventosMascotasPuntaje->id = $id;
                $this->request->data['EventosMascotasPuntaje']['puntos'] = $puntos;
                $this->request->data['EventosMascotasPuntaje']['puntos_adultos'] = $puntosadultos;
                $this->EventosMascotasPuntaje->save($this->data);
            }
        } else {
            
        }
        //$inscritos = $this->EventosMascota->find('all');
        //debug($inscritos);exit;
        $pistas = $this->EventosPista->find('all', array('conditions' => array('EventosPista.evento_id' => $idEvento)));
        //debug($pistas);exit;
        $mejoresespeciales = $this->EventosMascota->find('all', array('order' => 'EventosMascota.puesto ASC', 'recursive' => 2, 'conditions' => array('EventosMascota.evento_id' => $idEvento, 'EventosMascota.categoriaspista_id' => 1)));
        $mejoresabsolutos = $this->EventosMascota->find('all', array('recursive' => 2, 'order' => 'EventosMascota.puesto ASC', 'conditions' => array('EventosMascota.evento_id' => $idEvento, 'EventosMascota.categoriaspista_id' => 2)));


        $razas = $this->Raza->find('list', array('fields' => 'Raza.nombre'));
        $this->set(compact('evento', 'idEvento', 'cate', 'pistas', 'razas'));
    }

    public function ajaxpistasfinal($idEvento = null, $pista = null) {
        $this->layout = 'ajax';
        //debug($this->request->data);
        //debug($idEvento);
        //debug($pista);exit;
        $p = $this->EventosPista->find('first', array('conditions' => array('EventosPista.id' => $pista)));


        if ($this->request->data['Raza']['raza'] == 'todos') {
            $cachoespe = $this->EventosMascotasPuntaje->find('all', array('recursive' => 0,
                'conditions' => array(
                    'EventosMascotasPuntaje.evento_id' => $idEvento,
                    'EventosMascotasPuntaje.eventospista_id' => $pista,
                    '')
            ));
            $sw = 1;
            $nomraza = 'TODAS';
        } else {
            $raza = $this->Raza->find('first', array('conditions' => array('Raza.id' => $this->request->data['Raza']['raza'])));
            $cachoespe = $this->EventosMascotasPuntaje->find('all', array('recursive' => 0,
                'conditions' => array(
                    'EventosMascotasPuntaje.evento_id' => $idEvento,
                    'EventosMascotasPuntaje.eventospista_id' => $pista,
                    'EventosMascotasPuntaje.raza_id' => $this->request->data['Raza']['raza'])
            ));
            $sw = 0;
            $nomraza = $raza['Raza']['nombre'];
        }


        $listcalificaciones = $this->Calificacione->find('list', array('fields' => 'Calificacione.nombre'));
        //debug($listcalificaciones);exit;
        $this->set(compact('pista', 'idEvento', 'cachoespe', 'p', 'listcalificaciones', 'sw', 'nomraza'));
    }

    public function quitainscripcion($idEvenMas = null) {
        if ($this->EventosMascota->delete($idEvenMas)) {
            $this->Session->setFlash('Se retiro correctamente del Evento', 'msgbueno');
            $this->EventosMascotasPuntaje->deleteAll(array('EventosMascotasPuntaje.eventosmascota_id' => $idEvenMas));
        } else {
            $this->Session->setFlash('No se pudo retirar del evento intente nuevamente', 'msgerror');
        }
        $this->redirect($this->referer());
    }

    public function edita($idEvento = null) {
        $this->layout = 'ajax';
        //debug($idEvento);exit;
        $this->Evento->id = $idEvento;
        $this->request->data = $this->Evento->read();
        //debug($this->request->data);exit;
    }

    public function guardaevento() {
        if (!empty($this->request->data)) {
            $this->Evento->create();
            $this->Evento->save($this->request->data);
            $this->Session->setFlash('Se guardo correctamente!!!', 'msgbueno');
        } else {
            $this->Session->setFlash('No se guardo intente de nuevo!!!!', 'msgerror');
        }
        $this->redirect($this->referer());
    }

    public function reportegeneral($idEvento = null) {
        //$this->layout = '';

        $mascotas = $this->EventosMascota->find('all', array('recursive' => 2, 'conditions' => array('EventosMascota.evento_id' => $idEvento)));
        //debug($mascotas);exit;
        $pistas = $this->EventosPista->find('all', array('recursive' => 0, 'conditions' => array('EventosPista.evento_id' => $idEvento)));
        //debug($pistas);exit;
        $evento = $this->Evento->find('first', array('conditions' => array('Evento.id' => $idEvento)));
        //debug($evento);exit;
        $this->set(compact('mascotas', 'pistas', 'evento', 'idEvento'));
    }

    public function ranking_especiales($idEvento = null, $ano = null) {
        if (!empty($ano)) {
            //$evento = $this->Evento->findByid($idEvento,null,null,null,null,-1);
            $ranking = $this->EventosMascotasPuntaje->find('all', array('recursive' => 2
                , 'conditions' => array('Year(Evento.fecha_inicio)' => $ano, 'EventosMascotasPuntaje.categoriaspista_id' => 1)
                ,'group' => array('EventosMascotasPuntaje.mascota_id')
                ,'fields' => array('Mascota.nombre_completo','SUM(EventosMascotasPuntaje.puntos) puntos','Mascota.propietarioactual_id')
                , 'order' => 'SUM(EventosMascotasPuntaje.puntos) DESC'
                ));
        } else {
            $evento = $this->Evento->findByid($idEvento, null, null, null, null, -1);
            $ranking = $this->EventosMascotasPuntaje->find('all', array('recursive' => 2
                , 'conditions' => array('EventosMascotasPuntaje.evento_id' => $idEvento, 'EventosMascotasPuntaje.categoriaspista_id' => 1)
                ,'group' => array('EventosMascotasPuntaje.mascota_id')
                ,'fields' => array('Mascota.nombre_completo','SUM(EventosMascotasPuntaje.puntos) puntos','Mascota.propietarioactual_id')
                , 'order' => 'SUM(EventosMascotasPuntaje.puntos) DESC'
                ));
        }
        //debug($ranking);exit;
        $this->set(compact('ranking', 'evento', 'idEvento', 'ano'));
    }

    public function ranking_razas_especiales($idEvento = null, $ano = null) {
        $evento = $this->Evento->findByid($idEvento, null, null, null, null, -1);

        $razas = $this->Raza->find('all', array('order' => 'Raza.nombre ASC'));
        $this->set(compact('ranking', 'evento', 'idEvento', 'razas', 'ano'));
    }

    public function ranking_absolutos($idEvento = null, $ano = null) {
        if (!empty($ano)) {
            //$evento = $this->Evento->findByid($idEvento,null,null,null,null,-1);
            $ranking = $this->EventosMascotasPuntaje->find('all', array('recursive' => 2
                , 'conditions' => array('Year(Evento.fecha_inicio)' => $ano, 'EventosMascotasPuntaje.categoriaspista_id' => 2)
                ,'group' => array('EventosMascotasPuntaje.mascota_id')
                ,'fields' => array('Mascota.nombre_completo','SUM(EventosMascotasPuntaje.puntos) puntos','Mascota.propietarioactual_id')
                , 'order' => 'SUM(EventosMascotasPuntaje.puntos) DESC'
                ));
        } else {
            $evento = $this->Evento->findByid($idEvento, null, null, null, null, -1);
            $ranking = $this->EventosMascotasPuntaje->find('all', array('recursive' => 2
                , 'conditions' => array('EventosMascotasPuntaje.evento_id' => $idEvento, 'EventosMascotasPuntaje.categoriaspista_id' => 2)
                ,'group' => array('EventosMascotasPuntaje.mascota_id')
                ,'fields' => array('Mascota.nombre_completo','SUM(EventosMascotasPuntaje.puntos) puntos','Mascota.propietarioactual_id')
                , 'order' => 'SUM(EventosMascotasPuntaje.puntos) DESC'
                ));
        }
        //debug($ranking);exit;
        $this->set(compact('ranking', 'evento', 'idEvento', 'ano'));
    }

    public function ranking_razas_absolutos($idEvento = null, $ano = null) {
        $evento = $this->Evento->findByid($idEvento, null, null, null, null, -1);

        $razas = $this->Raza->find('all', array('order' => 'Raza.nombre ASC'));
        $this->set(compact('ranking', 'evento', 'idEvento', 'razas', 'ano'));
    }

    public function ranking_jovenes($idEvento = null, $ano = null) {
        if (!empty($ano)) {
            $ranking = $this->EventosMascotasPuntaje->find('all', array('recursive' => 2
                
                , 'conditions' => array('Year(Evento.fecha_inicio)' => $ano, 'EventosMascotasPuntaje.categoriaspista_id' => array(3, 4))
                ,'group' => array('EventosMascotasPuntaje.mascota_id')
                ,'fields' => array('Mascota.nombre_completo','SUM(EventosMascotasPuntaje.puntos) puntos','Mascota.propietarioactual_id')
                , 'order' => 'SUM(EventosMascotasPuntaje.puntos) DESC'
                ));
        } else {
            $evento = $this->Evento->findByid($idEvento, null, null, null, null, -1);
            $ranking = $this->EventosMascotasPuntaje->find('all', array('recursive' => 2, 
                'conditions' => array('EventosMascotasPuntaje.evento_id' => $idEvento, 'EventosMascotasPuntaje.categoriaspista_id' => array(3, 4))
                ,'group' => array('EventosMascotasPuntaje.mascota_id')
                ,'fields' => array('Mascota.nombre_completo','SUM(EventosMascotasPuntaje.puntos) puntos','Mascota.propietarioactual_id')
                , 'order' => 'SUM(EventosMascotasPuntaje.puntos) DESC'
                ));
        }
        //debug($ranking);exit;
        $this->set(compact('ranking', 'evento', 'idEvento', 'ano'));
    }
    public function get_propietario($idPropietario = null)
    {
        $nombre = $this->Propietario->find('first',array('conditions' => array('Propietario.id' => $idPropietario),'fields' => 'nombre'));
        return $nombre['Propietario']['nombre'];
    }

    public function ranking_razas_jovenes($idEvento = null, $ano = null) {
        $evento = $this->Evento->findByid($idEvento, null, null, null, null, -1);

        $razas = $this->Raza->find('all', array('order' => 'Raza.nombre ASC'));
        $this->set(compact('ranking', 'evento', 'idEvento', 'razas', 'ano'));
    }

    public function ranking_adultos($idEvento = null, $ano = null) {
        if (!empty($ano)) {
            $ranking = $this->EventosMascotasPuntaje->find('all', array('recursive' => 2
                , 'conditions' => array('Year(Evento.fecha_inicio)' => $ano, 'EventosMascotasPuntaje.categoriaspista_id' => array(5, 6, 7, 8, 9, 10))
                ,'group' => array('EventosMascotasPuntaje.mascota_id')
                ,'fields' => array('Mascota.nombre_completo','SUM(EventosMascotasPuntaje.puntos) puntos','Mascota.propietarioactual_id')
                , 'order' => 'SUM(EventosMascotasPuntaje.puntos) DESC'
                ));
        } else {
            $evento = $this->Evento->findByid($idEvento, null, null, null, null, -1);
            $ranking = $this->EventosMascotasPuntaje->find('all', array('recursive' => 2
                , 'conditions' => array('EventosMascotasPuntaje.evento_id' => $idEvento, 'EventosMascotasPuntaje.categoriaspista_id' => array(5, 6, 7, 8, 9, 10))
                ,'group' => array('EventosMascotasPuntaje.mascota_id')
                ,'fields' => array('Mascota.nombre_completo','SUM(EventosMascotasPuntaje.puntos) puntos','Mascota.propietarioactual_id')
                , 'order' => 'SUM(EventosMascotasPuntaje.puntos) DESC'
                ));
        }
        //debug($ranking);exit;
        $this->set(compact('ranking', 'evento', 'idEvento', 'ano'));
    }

    public function ranking_razas_adultos($idEvento = null, $ano = null) {
        $evento = $this->Evento->findByid($idEvento, null, null, null, null, -1);

        $razas = $this->Raza->find('all', array('order' => 'Raza.nombre ASC'));
        $this->set(compact('ranking', 'evento', 'idEvento', 'razas', 'ano'));
    }

    public function reporte($idEvento = null) {
        $this->layout = 'ajax';
        $this->set(compact('idEvento'));
    }

    public function reportesanuales() {
        $this->layout = 'ajax';
        $eventos = $this->Evento->find('all', array('group' => 'YEAR(Evento.fecha_inicio)', 'fields' => 'YEAR(Evento.fecha_inicio) year'));
        $anos = array();
        $i = 0;
        foreach ($eventos as $eve) {
            $anos[$i] = $eve[0]['year'];
            $i++;
        }
        $this->set(compact('anos'));
    }

    public function cargareportes($ano = null) {
        $this->layout = 'ajax';
        $this->set(compact('ano'));
    }

    public function generapago() {
        //debug('entro aqui');
        //debug($this->request->data);exit;
        if (!empty($this->request->data)) {
            $this->Ingreso->create();
            $this->request->data['Ingreso']['user_id'] = $this->Session->read('Auth.User.id');
            $tramite = $this->request->data['Ingreso']['tramite_id'];
            $idSucursal = $this->request->data['Ingreso']['sucursale_id'];

            if (empty($this->request->data['Ingreso']['propietario_id'])) {
                $idPropietario = $this->Session->read('Auth.User.propietario_id');
                $this->request->data['Ingreso']['propietario_id'] = $idPropietario;
            } else {
                $idPropietario = $this->request->data['Ingreso']['propietario_id'];
            }

            $propietario = $this->Propietario->findByid($idPropietario, null, null, null, null, -1);

            if (!empty($propietario['Propietario']['tipo_id'])) {
                $tarifa = $this->Tarifa->find('first', array('recursive' => -1, 'conditions' => array('Tarifa.tipo_id' => $propietario['Propietario']['tipo_id'], 'Tarifa.sucursale_id' => $idSucursal, 'Tarifa.tramite_id' => $tramite)));
            }

            if (!empty($tarifa)) {
                if (!empty($this->request->data['Ingreso']['monto_total']) && $this->request->data['Ingreso']['monto_total'] != $tarifa['Tarifa']['monto_total']) {
                    $montototal = $this->request->data['Ingreso']['monto_total'];
                    $pornacional = ($tarifa['Tarifa']['nacional'] / $tarifa['Tarifa']['monto_total']);
                    $porregional = ($tarifa['Tarifa']['regional'] / $tarifa['Tarifa']['monto_total']);
                    $this->request->data['Ingreso']['nacional'] = $pornacional * $montototal;
                    $this->request->data['Ingreso']['monto'] = $porregional * $montototal;
                } else {
                    $this->request->data['Ingreso']['nacional'] = $tarifa['Tarifa']['nacional'];
                    $this->request->data['Ingreso']['monto'] = $tarifa['Tarifa']['regional'];
                    $this->request->data['Ingreso']['monto_total'] = $tarifa['Tarifa']['monto_total'];
                }
                if ($this->Ingreso->save($this->request->data['Ingreso'])) {
                    $idIngreso = $this->Ingreso->getLastInsertID();
                    $this->request->data['Aux']['ingreso_id'] = $idIngreso;
                } else {
                    
                }
            } else {
                
            }
        }
    }

    public function cambia_estado($idEvento = null) {
        if (!empty($idEvento)) {
            $evento = $this->Evento->findByid($idEvento, 0, 0, 0, 0, -1);
            if ($evento['Evento']['estado'] == 1) {
                $estado = 0;
                $this->Session->setFlash('Se deshabilito las inscripciones para el evento ' . $evento['Evento']['nombre'], 'msginfo');
            } else {
                $estado = 1;
                $this->Session->setFlash('Se habilito las inscripciones para el evento ' . $evento['Evento']['nombre'], 'msginfo');
            }
            $this->Evento->id = $idEvento;
            $this->request->data['Evento']['estado'] = $estado;
            $this->Evento->save($this->Evento->save($this->request->data['Evento']));
        }
        $this->redirect(array('action' => 'index'));
    }

    public function catalogo($idEvento = null) {

        $evento = $this->Evento->find('first', array('recursive' => -1, 'conditions' => array('Evento.id' => $idEvento)));
        $grupos = $this->Grupo->find('all');
        $this->set(compact('grupos', 'evento', 'idEvento'));
    }

    public function catalogo_inicial($idEvento = null) {
        $evento = $this->Evento->find('first', array('recursive' => -1, 'conditions' => array('Evento.id' => $idEvento)));
        $grupos = $this->Grupo->find('all');
        $this->set(compact('grupos', 'evento', 'idEvento'));
    }

    public function ajaxeditapista($idPista = null) {
        $this->layout = 'ajax';
        $this->EventosPista->id = $idPista;
        $this->request->data = $this->EventosPista->read();
        $idEvento = $this->request->data['EventosPista']['evento_id'];
        $selecpistas = $this->Pista->find('list', array('fields' => 'Pista.nombre'));
        $this->set(compact('idEvento', 'selecpistas'));
    }

    public function eliminapista($idPista = null) {
        if (!empty($idPista)) {
            $this->EventosMascotasPuntaje->deleteAll(array('EventosMascotasPuntaje.eventospista_id' => $idPista));
            $this->EventosPista->delete($idPista);
            $this->Session->setFlash('Se elimino correctamente!!!', 'msgerror');
        }
        $this->redirect($this->referer());
    }

}

?>