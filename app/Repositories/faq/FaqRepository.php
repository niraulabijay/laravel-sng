<?php

namespace App\Repositories\faq;

use App\Model\FaqCategory;

class FaqRepository implements FaqInterface{

    public function activeFaqQuery(){
        return FaqCategory::where('status',1);
    }
    public function faqWithQues(){
        return $this->activeFaqQuery()->with('faqs')->get();
    }

}
