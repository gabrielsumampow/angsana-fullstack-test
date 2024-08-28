<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        $model = new User();
        $data['users'] = $model->paginate(4);
        $data['pager'] = $model->pager;
        
        return view('user/index', $data);
    }

    public function create()
    {
        return view('user/create');
    }

    public function store()
    {
        $model = new User();

        $validationRules = $model->getValidationRules();

        if (!$this->validate($validationRules)) {
            return view('user/create', [
                'validation' => $this->validator
            ]);
        }

        $postData = $this->request->getPost(['users_name', 'users_email']);

        if ($model->save($postData)) {
            return redirect()->to('/')->with('success', 'User added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add user.');
        }
    }

    public function edit($id)
    {
        $model = new User();
        $data['user'] = $model->find($id);

        return view('user/edit', $data);
    }

    public function update($id)
    {
        $model = new User();

        if (!$this->validate($model->getValidationRules())) {
            return view('user/edit', [
                'validation' => $this->validator,
                'user' => $model->find($id)
            ]);
        }

        $model->update($id, $this->request->getPost());
        return redirect()->to('/')->with('success', 'User updated successfully.');
    }

    public function delete($id)
    {
        $model = new User();
        $model->delete($id);

        return redirect()->to('/')->with('success', 'User deleted successfully.');
    }

    public function search()
    {
        $model = new User();
        $search = $this->request->getVar('search');
        $data['users'] = $model->like('users_name', $search)->orLike('users_id', $search)->paginate(5);
        $data['pager'] = $model->pager;

        return view('user/index', $data);
    }
}
