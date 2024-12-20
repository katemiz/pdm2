<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;

use App\Livewire\FileList;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\Attachment;
use App\Models\Counter;
use App\Models\Company;
use App\Models\Document;
use App\Models\User;

use Mail;
use App\Mail\AppMail;


class Documents extends Component
{
    use WithPagination;

    public $conf;

    public $show_latest = true; /// Show only latest revisions

    public $uid = false;
    // public $pid = false;

    public $query = false;
    public $sortField = 'created_at';
    public $sortDirection = 'DESC';

    public $logged_user;

    public $all_revs = [];

    public $document_no;
    public $revision;
    public $toc = [];    /// Table of Contents
    public $is_latest;

    public $company;
    public $companies = [];

    #[Validate('required', message: 'Please select company')]
    public $company_id;

    #[Validate('required', message: 'Document title is missing')]
    public $title;

    public $created_by;
    public $updated_by;
    public $created_at;
    public $updated_at;

    public $remarks;
    public $status;

    #[Validate('required', message: 'Please select document type')]
    public $doc_type = 'GR';

    #[Validate('required', message: 'Please select document language')]
    public $language = 'TR';


    public function mount()
    {
        $this->conf = config('conf_documents');
        $this->setCompanyProps();
    }


    public function render()
    {
        $this->setProps();

        // $records = $this->getDocumentsList();

        return view('livewire.docs.index',[
            'records' => $this->getDocumentsList()
        ]);

        // return view('documents.index',compact('records'));
    }


    #[On('startQuerySearch')]
    public function querySearch($query)
    {
        $this->query = $query;
    }


    public function setCompanyProps()
    {
        foreach (Company::all() as $c) {
            $this->companies[$c->id] = $c->name;
        }

        $this->company_id =  Auth::user()->company_id;
        $this->company =  Company::find($this->company_id);
    }


    public function checkSessionVariables() {

        return true;
    }


    public function getDocumentsList()  {

        switch ($this->sortField) {
            case 'DocNo':
                $this->sortField = 'document_no';
                break;

            case 'Author':
                $this->sortField = 'user_id';
                break;
        }

        if ($this->query) {

            return Document::when($this->show_latest, function ($query) {
                $query->where('is_latest', true);
            })
            ->whereAny([
                'title',
                'remarks',
                'document_no',
            ], 'LIKE', "%".$this->query."%")
            ->orderBy($this->sortField,$this->sortDirection)
            ->paginate(env('RESULTS_PER_PAGE'));

        } else {

            if ($this->show_latest) {

                return Document::where('is_latest', true)
                ->orderBy($this->sortField,$this->sortDirection)
                ->paginate(env('RESULTS_PER_PAGE'));

            } else {

                return Document::orderBy($this->sortField,$this->sortDirection)
                ->paginate(env('RESULTS_PER_PAGE'));
            }
        }

        switch ($this->sortField) {
            case 'document_no':
                $this->sortField = 'DocNo';
                break;

            case 'user_id':
                $this->sortField = 'Author';
                break;
        }
    }


    public function checkCurrentProduct() {

        /*
        session('current_project_id');
        session('current_project_name');

        session('current_eproduct_id');
        session('current_eproduct_name');
        */

        if (!session('current_project_id') && !session('current_product_id')) {
            return redirect('/product-selector/rl');
        }
    }


    public function getCompaniesList()  {

        if ($this->is_user_admin) {
            $this->companies = Company::all();
        } else {
            $this->companies = Company::where('id',$this->logged_user->company_id)->get();
            $this->company_id = $this->logged_user->company_id;
        }
    }


    public function resetFilter() {
        $this->query = '';
    }


    public function setProps() {

        if ($this->uid ) {

            $c = Document::find($this->uid);

            $this->document_no = $c->document_no;
            $this->revision = $c->revision;
            $this->doc_type = $c->doc_type;
            $this->language = $c->language;
            $this->company_id = $c->company_id;
            $this->title = $c->title;
            $this->is_latest = $c->is_latest;
            $this->remarks = $c->remarks;
            $this->status = $c->status;
            $this->created_at = $c->created_at;
            $this->updated_at = $c->updated_at;
            $this->created_by = User::find($c->user_id)->email;
            $this->updated_by = User::find($c->updated_uid)->email;


            // Revisions
            foreach (Document::where('document_no',$this->document_no)->get() as $doc) {
                $this->all_revs[$doc->revision] = $doc->id;
            }
        }
    }


    public function sort($columnName) {

        if ($columnName == $this->sortField) {
            $this->sortDirection = $this->sortDirection == 'ASC' ?  'DESC' :'ASC';
        } else {
            $this->sortField = $columnName;
        }
    }

}
