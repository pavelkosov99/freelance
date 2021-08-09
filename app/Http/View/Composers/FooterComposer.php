<?php
namespace App\Http\View\Composers;

use App\Models\Contact;
use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view): void
    {
        $contact = Contact::query()->firstOrFail();

        $view->with(compact('contact'));
    }
}
