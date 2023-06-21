<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public $model;
    public $name;

    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = false;
    public $search = '';

    protected $listeners = [ "deleteItem" => "delete_item" ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function get_pagination_data ()
    {
        switch ($this->name) {
            case 'employee':
                $employees = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.employee',
                    "employees" => $employees,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.employees.create'),
                            'create_new_text' => 'Registrar empleado',
                            'export' => 'employees/exportar',
                            'export_text' => 'Exportar'
                        ]
                    ])
                ];
                break;
                
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.users.create'),
                            'create_new_text' => 'Crear usuario',
                            'export' => '/users/exportar',
                            'export_text' => 'Exportar'
                        ]
                    ])
                ];
                break;
            case 'post':
                $posts = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.post',
                    "posts" => $posts,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.posts.store', '#create'),
                            'create_new_text' => 'Crear producto',
                            'export' => '/posts/exportar',
                            'export_text' => 'Exportar'
                        ]
                    ])
                ];
                break;
            case 'role':
                $roles = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                return [
                    "view" => 'livewire.table.role',
                    "roles" => $roles,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.roles.create'),
                            'create_new_text' => 'Crear rol',
                            'export' => '/roles/exportar',
                            'export_text' => 'Exportar'
                        ]
                    ])
                ];
                break;

            case 'permission':
                $permissions = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.permission',
                    "permissions" => $permissions,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => '#',
                            'create_new_text' => '',
                            'export' => '/permissions/exportar',
                            'export_text' => 'Exportar'
                        ]
                    ])
                ];
                break;

            case 'trademark':
                $trademarks = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.trademark',
                    "trademarks" => $trademarks,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.trademarks.create'),
                            'create_new_text' => 'Crear marca comercial',
                            'export' => 'trademarks/exportar',
                            'export_text' => 'Exportar'
                        ]
                    ])
                ];
                    break;

            case 'category':
                $categories = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.category',
                    "categories" => $categories,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.categories.create'),
                            'create_new_text' => 'Crear categoría',
                            'export' => 'categories/exportar',
                            'export_text' => 'Exportar'
                        ]
                    ])
                ];
                break;

            case 'tag':
                $tags = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.tag',
                    "tags" => $tags,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.tag.create'),
                            'create_new_text' => 'Crear etiqueta',
                            'export' => 'tag/exportar',
                            'export_text' => 'Exportar'
                        ]
                    ])
                ];
                break;

            default:

                ##
                break;
        }
    }
    

    public function delete_item ($id)
    {
        $data = $this->model::find($id);

        if (!$data) {
            $this->emit("deleteResult", [
                "status" => false,
                "message" => "No se pudieron borrar los datos " . $this->name
            ]);
            return;
        }

        $data->delete();
        $this->emit("deleteResult", [
            "status" => true,
            "message" => "¡Eliminado correctamente!"
        ]);
    }

    public function render()
    {
        $data = $this->get_pagination_data();

        return view($data['view'], $data);
    }
}
