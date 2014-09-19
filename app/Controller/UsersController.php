<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController
{
       public function admin_index() {
        $this->titleForLayout = 'Profissionais';

        $data = $this->User->find('all');

        $this->set(compact('data'));
    }
    
    
    public function admin_login()
    {
        $this->titleForLayout = 'Sistema Controle de Pacientes';
        $this->layout = null;
        
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->setFlash('Dados incorretos', 'warning');
            }
        }
    }
    public function admin_logout() {
        $this->redirect($this->Auth->logout());
    }

    public function admin_change_password() {
       $this->titleForLayout = 'Alterar Senha';

        if (!empty($this->data)) {  
            $this->User->id = $this->Auth->user('id');
            if ($this->User->save($this->data)) {
                $this->setFlash('Senha alterada com sucesso!', 'success');
                $this->redirect(array('action' => 'admin_change_password'));
            } else {
                $this->setFlash('Não foi possível alterar a senha, verifique o formulário.!', 'danger');
            }
        }
    }

    public function admin_add() {
        $this->titleForLayout = 'Adicionar Profissional';

        if (!empty($this->data)) {
            if ($this->User->save($this->data)) {
                $this->setFlash('Usuário adicionado com sucesso!', 'success');
                $this->redirect(array('action' => 'edit', $this->User->id));
            } else {
                $this->setFlash('Não foi possível adicionar o usuário, verifique o formulário.!', 'warning');
            }
        }

        $this->render('admin_edit');
    }

    public function admin_edit($id) {
       $this->titleForLayout = 'Editar Profissional';

        if (!empty($this->data)) {
            if ($this->User->save($this->data)) {
                $this->setFlash('Usuário editado com sucesso!', 'success');
                $this->redirect(array('action' => 'edit', $this->User->id));
            } else {
                $this->setFlash('Não foi possível editar o usuário, verifique o formulário.!', 'warning');
            }
        } else {
            $this->data = $this->User->find('first', array(
                'conditions' => array(
                    'User.id' => $id
                )
            ));
        }

        $this->set(compact('id'));
    }
    
    public function admin_delete($id) {
        Configure::write('debug', 2);

        $this->User->delete((int) $id);
        $this->redirect(array('action' => 'index'));
    }
    public function admin_status($id,$active) {
        $data = $this->User->read(null, $id);

        $this->User->set('status', $active);
        $this->User->save();

        if (!empty($_SERVER['HTTP_REFERER'])) {
            $this->redirect($_SERVER['HTTP_REFERER']);
        }

        $this->redirect(array('action' => 'admin_index'));
    }

    /* public function admin_login() {
      $this->layout = 'login';

      if ($this->request->is('post')) {
      if ($this->Auth->login()) {
      $this->Session->write($this->Auth->sessionKey, $this->Auth->user());
      return $this->redirect($this->Auth->redirect());
      } else {

      $this->Session->setFlash('Dados incorretos', 'admin/alerts/inline', array('class' => 'error'), 'auth');
      }
      }

      $this->titleForLayout = 'Painel de Controle | B3net';
      }

      public function admin_logout() {
      $this->Session->delete($this->Auth->sessionKey);

      $this->redirect($this->Auth->logout());
      } */
}
