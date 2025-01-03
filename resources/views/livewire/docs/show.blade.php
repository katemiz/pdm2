<?php

use Livewire\Volt\Component;

use App\Models\User;
use App\Models\Document;
use App\Models\Company;

use Illuminate\Support\Collection;




new class extends Component {

  public $title;
  public $notes;
  public $company_id;
  public $doc_type;
  public $language;

  public $docTypes;
  public $languages;






  public function mount() {

    // $this->docTypes = config('conf_documents.docTypes');
    // $this->languages = config('conf_documents.languages');

  }


  public function with(): array
  {

      //$this->form->setDocument();


      return [
          'document' => Document::find(request('id'))
      ];
  }

}

?>




<div class="container mx-auto p-4">

{{$document->title}}

</div>
