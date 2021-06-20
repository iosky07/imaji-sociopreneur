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
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.user.create'),
                            'create_new_text' => 'Buat User Baru',
                            'export' => '',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'budget':
                $budgets = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.budget',
                    "budgets" => $budgets,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.budget.create'),
                            'create_new_text' => 'Buat data keuangan',
                            'export' => '',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'rab':
                $rabs = $this->model::searchRab($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.finance',
                    "finances" => $rabs,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.rab.create'),
                            'create_new_text' => 'Buat data rab',
                            'export' => '',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'spj':
                $spjs = $this->model::searchSpj($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.finance',
                    "finances" => $spjs,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.spj.create'),
                            'create_new_text' => 'Buat data spj',
                            'export' => '',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'report':
                $reports = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.report',
                    "reports" => $reports,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.report.create'),
                            'create_new_text' => 'Buat data report',
                            'export' => '',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'content':
                $contents = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.content',
                    "contents" => $contents,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.content.create'),
                            'create_new_text' => 'Buat data content',
                            'export' => '',
                            'export_text' => 'Export'
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
                            'create_new_text' => 'Buat data tag',
                            'export' => '',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'campaign':
                $campaigns = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.campaign',
                    "campaigns" => $campaigns,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.campaign.create'),
                            'create_new_text' => 'Buat data campaign',
                            'export' => '',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'gallery':
                $gallerys = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.gallery',
                    "gallerys" => $gallerys,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.gallery.create'),
                            'create_new_text' => 'Buat data gallery',
                            'export' => '',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'faq':
                $faqs = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.faq',
                    "faqs" => $faqs,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.faq.create'),
                            'create_new_text' => 'Buat data faq',
                            'export' => '',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'team':
                $teams = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.team',
                    "teams" => $teams,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.team.create'),
                            'create_new_text' => 'Buat data team',
                            'export' => '',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'testimonial':
                $testimonials = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.testimonial',
                    "testimonials" => $testimonials,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.testimonial.create'),
                            'create_new_text' => 'Buat data testimonial',
                            'export' => '',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'partner':
                $partners = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.partner',
                    "partners" => $partners,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.partner.create'),
                            'create_new_text' => 'Buat data partner',
                            'export' => '',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'sosmed':
                $sosmeds = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.sosmed',
                    "sosmeds" => $sosmeds,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.sosmed.create'),
                            'create_new_text' => 'Buat data sosmed',
                            'export' => '',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;




            default:
                # code...
                break;
        }
    }

    public function delete_item ($id)
    {
        $data = $this->model::find($id);

        if (!$data) {
            $this->emit("deleteResult", [
                "status" => false,
                "message" => "Gagal menghapus data " . $this->name
            ]);
            return;
        }

        $data->delete();
        $this->emit("deleteResult", [
            "status" => true,
            "message" => "Data " . $this->name . " berhasil dihapus!"
        ]);
    }

    public function render()
    {
        $data = $this->get_pagination_data();

        return view($data['view'], $data);
    }
}
